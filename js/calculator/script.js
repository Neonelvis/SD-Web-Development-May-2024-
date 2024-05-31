const display = document.querySelector('.result')
const history = document.querySelector('.history')
const buttons = document.querySelectorAll('.btn')

// variables 
let currentValue = "" 
let previousValue = "" 
let operator = ""
let result = "" 

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        const value = button.textContent

        if (button.classList.contains('btn-number')) {
            handleNumber(value)
        } else if (button.classList.contains('btn-operator')) {
            handleOperator(value) 
        } else if (button.classList.contains('btn-equals')) {
            calculate()
        } else if (button.classList.contains('btn-clear')) {
            clear()
        }

        updateDisplay()
    })
})

function handleNumber(value) {
    if (result !== "") {
        clear()
    } 
    currentValue += value
}

function handleOperator(value) {
    if (operator !== "") {
        calculate()
    } 
    operator = value 
    previousValue = currentValue 
    currentValue = ""
}

function calculate() {
    let computation 

    const prev = parseFloat(previousValue)
    const current = parseFloat(currentValue)

    if (isNaN(prev) || isNaN(current)) {
        return
    } 

    switch (operator) {
        case "+":
            computation = prev + current
            break 
        case "−":
            computation = prev - current
            break 
        case "×":
            computation = prev * current
            break 
        case "÷":
            computation = prev / current
            break
        case "%":
            computation = prev % current
            break
        default:
            return
    }
    
    result = computation.toString()
    previousValue = ""
    currentValue = result
    operator = ""
}

function clear() {
    previousValue = ""
    currentValue = ""
    operator = ""
    result = ""
}

function updateDisplay() {
    display.textContent = currentValue || 0
    history.textContent = `${previousValue} ${operator}`
}