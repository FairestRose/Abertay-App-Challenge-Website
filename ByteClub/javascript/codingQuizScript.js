// JavaScript file for Abertay Challenge Website by EH11 - Byte Club
// Handles the logic for the coding quiz, including question display, scoring, user interaction, and AJAX score submission

// Quiz questions and answers are stored in this array of objects
const quizData = [
  {
    question: 'What does HTML stand for?',
    options: ['HyperText Markup Language', 'Home Tool Markup Language', 'Hyperlinks and Text Markup Language', 'None of the above'],
    answer: 'HyperText Markup Language',
  },
  {
    question: 'Which HTML element is used to specify a footer for a document?',
    options: ['<footer>', '<bottom>', '<section>', '<div>'],
    answer: '<footer>',
  },
  {
    question: 'Which of the following is NOT a valid JavaScript data type?',
    options: ['String', 'Number', 'Boolean', 'Character'],
    answer: 'Character',
  },
  {
    question: 'What does CSS stand for?',
    options: ['Cascading Style Sheets', 'Cascading Simple Sheets', 'Colorful Style Sheets', 'Computer Style Sheets'],
    answer: 'Cascading Style Sheets',
  },
  {
    question: 'Which company developed JavaScript?',
    options: ['Microsoft', 'Netscape', 'Google', 'Apple'],
    answer: 'Netscape',
  },
  {
    question: 'What is the correct syntax to add a comment in JavaScript?',
    options: ['// This is a comment', '# This is a comment', '/* This is a comment */', '/* This is a comment'],
    answer: '// This is a comment',
  },
  {
    question: 'Which of the following is used to call a function in JavaScript?',
    options: ['functionName()', 'call functionName()', 'invoke functionName()', 'functionName[]'],
    answer: 'functionName()',
  },
  {
    question: 'Which of these is a JavaScript framework?',
    options: ['React', 'Django', 'Ruby on Rails', 'Laravel'],
    answer: 'React',
  },
  {
    question: 'What is the default value of the `position` property in CSS?',
    options: ['relative', 'absolute', 'fixed', 'static'],
    answer: 'static',
  },
  {
    question: 'Which HTML tag is used to define an internal style sheet?',
    options: ['<style>', '<script>', '<css>', '<link>'],
    answer: '<style>',
  },
];

// DOM references for key elements
const quizContainer = document.getElementById('quiz');
const resultContainer = document.getElementById('result');
const submitButton = document.getElementById('submit');
const retryButton = document.getElementById('retry');
const showAnswerButton = document.getElementById('showAnswer');

// Quiz state variables
let currentQuestion = 0;
let score = 0;
let incorrectAnswers = [];

// Function to shuffle options randomly
function shuffleArray(array) {
for (let i = array.length - 1; i > 0; i--) {
  const j = Math.floor(Math.random() * (i + 1));
  [array[i], array[j]] = [array[j], array[i]];
}
}

// Displays the current quiz question and its options
function displayQuestion() {
console.log('Displaying question', currentQuestion);
const questionData = quizData[currentQuestion];

const questionElement = document.createElement('div');
questionElement.className = 'question';
questionElement.innerHTML = questionData.question;

const optionsElement = document.createElement('div');
optionsElement.className = 'options';

const shuffledOptions = [...questionData.options];
shuffleArray(shuffledOptions); // Randomize the order of options

for (let i = 0; i < shuffledOptions.length; i++) {
  const option = document.createElement('label');
  option.className = 'option';

  const radio = document.createElement('input');
  radio.type = 'radio';
  radio.name = 'quiz';
  radio.value = shuffledOptions[i];

  const optionText = document.createTextNode(shuffledOptions[i]);

  option.appendChild(radio);
  option.appendChild(optionText);
  optionsElement.appendChild(option);
}

quizContainer.innerHTML = ''; // Clear previous content
quizContainer.appendChild(questionElement);
quizContainer.appendChild(optionsElement);
}

// Handles answer selection and moves to the next question or ends the quiz
function checkAnswer() {
const selectedOption = document.querySelector('input[name="quiz"]:checked');
if (selectedOption) {
  const answer = selectedOption.value;
  if (answer === quizData[currentQuestion].answer) {
    score++;
  } else {
    incorrectAnswers.push({
      question: quizData[currentQuestion].question,
      incorrectAnswer: answer,
      correctAnswer: quizData[currentQuestion].answer,
    });
  }
  currentQuestion++;
  selectedOption.checked = false;

  // Continue or finish the quiz
  if (currentQuestion < quizData.length) {
    displayQuestion();
  } else {
    displayResult();
  }
}
}

// Submits the user's score to the server using AJAX and their email from sessionStorage
function submitScore(score) {
const email = sessionStorage.getItem("email");

console.log("Email:", email);
console.log("Score:", score);

if (email) {
  $.ajax({
    url: "processingScoresCoding.php",
    type: "POST",
    data: {
      score: score,
      email: email,
    },
    success: function(response) {
      console.log("Score saved:", response);
    },
    error: function(xhr, status, error) {
      console.error("Error saving score:", error);
    }
  });
} else {
  console.error("Email is missing in sessionStorage.");
}
}

// Displays final quiz score, hides quiz interface, and shows control buttons
function displayResult() {
quizContainer.style.display = 'none';
submitButton.style.display = 'none';
retryButton.style.display = 'inline-block';
showAnswerButton.style.display = 'inline-block';
resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;

// Send the score to the server
$.ajax({
  url: "processingScoresCoding.php",
  type: "POST",
  data: { score: score },
  success: function (response) {
    console.log("Score saved:", response);
  },
  error: function (xhr, status, error) {
    console.error("Error saving score:", error);
  }
});
}

// Resets quiz state and starts over
function retryQuiz() {
currentQuestion = 0;
score = 0;
incorrectAnswers = [];
quizContainer.style.display = 'block';
submitButton.style.display = 'inline-block';
retryButton.style.display = 'none';
showAnswerButton.style.display = 'none';
resultContainer.innerHTML = '';
displayQuestion();
}

// Shows the correct answers to the questions the user got wrong
function showAnswer() {
quizContainer.style.display = 'none';
submitButton.style.display = 'none';
retryButton.style.display = 'inline-block';
showAnswerButton.style.display = 'none';

let incorrectAnswersHtml = '';
for (let i = 0; i < incorrectAnswers.length; i++) {
  incorrectAnswersHtml += `
    <p>
      <strong>Question:</strong> ${incorrectAnswers[i].question}<br>
      <strong>Your Answer:</strong> ${incorrectAnswers[i].incorrectAnswer}<br>
      <strong>Correct Answer:</strong> ${incorrectAnswers[i].correctAnswer}
    </p>
  `;
}

resultContainer.innerHTML = `
  <p>You scored ${score} out of ${quizData.length}!</p>
  <p>Incorrect Answers:</p>
  ${incorrectAnswersHtml}
`;
}

// Set up event listeners for the buttons
submitButton.addEventListener('click', checkAnswer);
retryButton.addEventListener('click', retryQuiz);
showAnswerButton.addEventListener('click', showAnswer);

// Start the quiz by displaying the first question
displayQuestion();
