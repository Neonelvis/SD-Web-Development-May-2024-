const taskInput = document.getElementById("task-input")
const addTaskButton = document.getElementById("add-task")
const taskList = document.getElementById('task-list')

// Add an eventListener to add-task button 
addTaskButton.addEventListener('click', addTask)
addTaskButton.addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        addTask()
    }
})


// a function to add a new task 
function addTask() {
    const taskText = taskInput.value.trim()
    if (taskText !== "") {
        const taskItem = createTaskItem(taskText) 
        taskList.appendChild(taskItem) 
        taskInput.value = ""
    } else {
        alert('Please enter a task!')
    }
}

// A function to create a task item 
function createTaskItem(text) {
    const li = document.createElement('li')  // <li></li>
    const span = document.createElement('span')  // <span></span>
    span.textContent = text // <span>text</span>
    li.appendChild(span) // <li><span>text</span></li>

    const deleteButton = document.createElement('button') // <button></button>
    deleteButton.textContent = "Delete" // <button>Delete</button>

    deleteButton.addEventListener('click', function () {
        taskList.removeChild(li)
    })

    li.appendChild(deleteButton)

    const editButton = document.createElement('button')
    editButton.textContent = "Edit"

    editButton.addEventListener('click', function () {
        const newTaskText = prompt("Enter the new task text", text) 

        if (newTaskText !== null && newTaskText.trim() !== "") {
            span.textContent = newTaskText.trim() 
        } else if (newTaskText === null) {
            // User cancelled the prompt
        } else {
            alert("Please provide a valid task!") 
        }
    })

    li.appendChild(editButton) 

    return li
}