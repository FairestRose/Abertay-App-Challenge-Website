// Cybersecurity Quiz JavaScript for Abertay Challenge Website (EH11 - Byte Club)

// === Quiz Questions Data ===
// Each object in the array represents one question, including the text, options, and correct answer.
const quizData = [
  {
    question: 'What does the term "phishing" refer to in cybersecurity?',
    options: ['A method of data encryption', 'A type of virus', 'A fraudulent attempt to steal sensitive information', 'A type of firewall'],
    answer: 'A fraudulent attempt to steal sensitive information',
  },
  {
    question: 'Which of the following is a common way to secure a website?',
    options: ['SSL/TLS encryption', 'Running a virus scan', 'Using a firewall', 'Disabling JavaScript'],
    answer: 'SSL/TLS encryption',
  },
  {
    question: 'What is the purpose of a VPN (Virtual Private Network)?',
    options: ['To track user activity online', 'To protect sensitive data by encrypting internet traffic', 'To store encrypted data', 'To protect against malware'],
    answer: 'To protect sensitive data by encrypting internet traffic',
  },
  {
    question: 'What is malware?',
    options: ['A programming language', 'A type of computer virus', 'A type of anti-virus software', 'A security protocol'],
    answer: 'A type of computer virus',
  },
  {
    question: 'Which of the following is an example of social engineering?',
    options: ['Using a VPN to hide your IP address', 'Installing anti-virus software', 'Tricking someone into revealing their password through email', 'Encrypting data using AES'],
    answer: 'Tricking someone into revealing their password through email',
  },
  {
    question: 'What is the purpose of two-factor authentication?',
    options: ['To make passwords longer', 'To improve encryption strength', 'To add an extra layer of security by requiring a second form of verification', 'To protect against social engineering attacks'],
    answer: 'To add an extra layer of security by requiring a second form of verification',
  },
  {
    question: 'Which of the following is a strong password?',
    options: ['123456', 'password', 'qwerty', 'W3c0me!2P@ss'],
    answer: 'W3c0me!2P@ss',
  },
  {
    question: 'What does "ransomware" do?',
    options: ['Encrypts files and demands payment for decryption', 'Steals personal information', 'Scans your computer for viruses', 'Creates fake accounts on social media'],
    answer: 'Encrypts files and demands payment for decryption',
  },
  {
    question: 'Which of these attacks involves overwhelming a system with traffic to make it unavailable?',
    options: ['Phishing', 'SQL Injection', 'Denial of Service (DoS)', 'Man-in-the-middle'],
    answer: 'Denial of Service (DoS)',
  },
  {
    question: 'What is the main purpose of a firewall?',
    options: ['To prevent malware from running', 'To detect phishing emails', 'To block unauthorized access to or from a private network', 'To create backups of data'],
    answer: 'To block unauthorized access to or from a private network',
  },
];

// === DOM Elements ===
const quizContainer = document.getElementById('quiz');
const resultContainer = document.getElementById('result');
const submitButton = document.getElementById('submit');
const retryButton = document.getElementById('retry');
const showAnswerButton = document.getElementById('showAnswer');

// === Quiz State ===
let currentQuestion = 0;            // Index of current question
let score = 0;                      // Score counter
let incorrectAnswers = [];          // Array to store incorrectly answered questions

// === Utility: Shuffle array elements (used to randomize answer options) ===
function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

// === Display the current question and its answer options ===
function displayQuestion() {
  console.log('Displaying question', currentQuestion);

  const questionData = quizData[currentQuestion];

  const questionElement = document.createElement('div');
  questionElement.className = 'question';
  questionElement.innerHTML = questionData.question;

  const optionsElement = document.createElement('div');
  optionsElement.className = 'options';

  // Clone and shuffle the options before displaying
  const shuffledOptions = [...questionData.options];
  shuffleArray(shuffledOptions);

  // Create radio buttons for each option
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

  // Clear previous content and append new question
  quizContainer.innerHTML = '';
  quizContainer.appendChild(questionElement);
  quizContainer.appendChild(optionsElement);
}

// === Handle answer selection and score tracking ===
function checkAnswer() {
  const selectedOption = document.querySelector('input[name="quiz"]:checked');
  if (selectedOption) {
    const answer = selectedOption.value;
    if (answer === quizData[currentQuestion].answer) {
      score++; // Correct
    } else {
      // Store incorrect answers for review
      incorrectAnswers.push({
        question: quizData[currentQuestion].question,
        incorrectAnswer: answer,
        correctAnswer: quizData[currentQuestion].answer,
      });
    }

    currentQuestion++;
    selectedOption.checked = false;

    // Show next question or result
    if (currentQuestion < quizData.length) {
      displayQuestion();
    } else {
      displayResult();
    }
  }
}

// === Submit the score to the server with email from sessionStorage ===
function submitScore(score) {
  const email = sessionStorage.getItem("email");

  console.log("Email:", email);
  console.log("Score:", score);

  if (email) {
    $.ajax({
      url: "processingScoresCyber.php", // Server-side endpoint for cyber quiz
      type: "POST",
      data: { score: score, email: email },
      success: function (response) {
        console.log("Score saved:", response);
      },
      error: function (xhr, status, error) {
        console.error("Error saving score:", error);
      }
    });
  } else {
    console.error("Email is missing in sessionStorage.");
  }
}

// === Display final score and save via AJAX ===
function displayResult() {
  quizContainer.style.display = 'none';
  submitButton.style.display = 'none';
  retryButton.style.display = 'inline-block';
  showAnswerButton.style.display = 'inline-block';
  resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;

  // Save score to server (redundant but also ensures score is saved)
  $.ajax({
    url: "processingScoresCyber.php",
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

// === Reset quiz state and restart ===
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

// === Show incorrect answers with correct ones for review ===
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

// === Event Listeners for Buttons ===
submitButton.addEventListener('click', checkAnswer);
retryButton.addEventListener('click', retryQuiz);
showAnswerButton.addEventListener('click', showAnswer);

// === Initialize the first question ===
displayQuestion();
