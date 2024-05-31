const quizData = [
    {
        question: 'What is the capital of France',
        a: 'Paris',
        b: 'London',
        c: 'Berlin',
        d: 'Madrid',
        correct: 'a'
    },
    {
        question: 'What is the largest planet in our solar system',
        a: 'Earth',
        b: 'Jupiter',
        c: 'Mars',
        d: 'Venus',
        correct: 'b'
    },
    {
        question: 'What is the smallest planet in our solar system',
        a: 'Mercury',
        b: 'Mars',
        c: 'Venus',
        d: 'Earth',
        correct: 'a'
    },
]

const quizContainer = document.querySelector('.quiz-container')
const questionEl = document.getElementById('question')
const answerEls = document.querySelectorAll('.answer')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')
const timerEl = document.getElementById('timer')

// variables
let currentQuiz = 0
let score = 0
let timerLeft = 60
let timer

loadQuiz()
startTimer() 

function loadQuiz() {
    deselectAnswers() 

    const currentQuizData = quizData[currentQuiz]

    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}

function deselectAnswers () {
    answerEls.forEach((answerEl) => {
        answerEl.checked = false
    })
}

function getSelected() {
    let answer 
    answerEls.forEach((answerEl) => {
        if (answerEl.checked) {
            answer = answerEl.id
        }
    })

    return answer
}

submitBtn.addEventListener('click', () => {
    const answer = getSelected()

    if (answer) {
        if (answer === quizData[currentQuiz].correct) {
            score ++
        }

        currentQuiz++

        if (currentQuiz < quizData.length) {
            loadQuiz()
        } else {
            quizContainer.innerHTML = `
            <h2>You answered ${score}/${quizData.length} questions correctly.</h2>
            <button onclick="location.reload()">Reload</button>`

            clearInterval(timer)
        }
    }
})

function startTimer() {
    timer = setInterval(() => {
        timerLeft-- 
        timerEl.textContent = timerLeft

        if (timerLeft === 0) {
            clearInterval(timer)
            quizContainer.innerHTML = `
            <h2>Time's Up!</h2>
            <h2>You answered ${score}/${quizData.length} questions correctly.</h2>
            <button onclick="location.reload()">Reload</button>`
        }
    }, 1000) 
}