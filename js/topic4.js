// Topic 4: Content and CSS with JavaScript 

// 4.1 Manipulation Text Content 
// You can access and modify the text content of an element using the textContent and innerText properties
// -> textContent: Represents the text content of the node and its descendants. It returns a string with all the text combined 
// -> innerText: Similar to textContent, but it takes into account CSS stylesheets and may render the text differently 

// select an element by its id from the DOM 
const element = document.getElementById('myeElement')

// getting the text content of the element 
element.textContent
element.innerHTML

// setting the text content 
element.textContent = 'New Text Content' 


// 4.2 Manipulating HTML Content 
// The innerHTML property allows you to access and modify the HTML content of an element, including all child elements it may have 

element.innerHTML = '<p>This is a new paragraph</p>'


// 4.3 Working CSS Styles 
// JavaScript provides several ways to interact with and manipulate the CSS of an element. 

// 1. Inline styles with the 'style' property 
element.style.property = value
// This method allows you to set individual CSS properties directly on the element's style object 

// 2. Accessing and Modifying CSS Properties
const elementStyle = window.getComputedStyle(element) 

const colon = elementStyle.getPropertyValue('color') 

element.style.setProperty('color', 'red') 

// You can use the getComputedStyle method to retrieve the computed styles for an element, and then modify specific properties using the style. setProperty method

// 3. Working with Computed Styles 
const fontSize = elementStyle.fontSize 

// The getComputedStyle method returns a live CSSStyleDeclaration object representing the computed styles for the element, taking in to account all active stylesheets and inline styles 


// 4.4 CSS Classes and 'classList'
// The classList property provides a convenient way to manipulate an element's class list, allowing you to add, remove or toggle CSS classes 

const element = document.getElementById('myElement') 

// adding a class
element.classList.add('new-class') 

// removing a class 
element.classList.remove('old-class') 

// toggle a class 
element.classList.toggle('active') 

// checking if an element has a class
element.classList.contains('active')


// 4.5 Modifying Attributes 
// You can access and modify the attributes of an HTML element using the getAttribute and setAttribute methods
const element = document.getElementById('myElement') 

// Getting an attribute value 
const src = element.getAttribute('src') 

// Setting an attribute value 
element.setAttribute('src', 'new-image.jpg')  

// Additionally, you can directly access and modify certain attributes as properties of the element object, such as id, className, href, and others
element.id = 'newId' 
element.class = 'new-class'


// 4.6 Event-Driven Content Updates 
// JavaScript allows you to update the content of an element based on user interactions or other events. This is commonly done by attaching event handlers to elements and modifying their content or styles withing the event handler functions. 

const button = document.getElementById('myButton') 
const content = document.getElementById('myContent')

button.addEventListener('click', () => {
    content.textContent = 'New Content Added' 
    content.style.color = 'red'
})

// In this example, when the button is clicked, the text content and color of the #myContent element are updated dynamically using JavaScript. 

// Event-driven content updates are fundamental to creating interactive and responsive user interfaces in web applications 

// Tommorrow Topic 5 - Creating and Removing Elements 

// 5.1 Creating New Elements 
// You can create new HTML elements dynamically using the createElement method and append them to the DOM tree.

const newElement = document.createElement('div')

// You can also create text nodes using the createTextNode method and append them as child nodes to an element 

const textNode = document.createTextNode('This is a text node')
newElement.appendChild(textNode)

// 5.2 Appending and Inserting Elements 
// Once you have created a new element, you can append it into the DOM using various methods
// a. appendChild(node): Adds a new  child node at he end of the nodes list 
const parentElement = document.getElementById("parent")
parentElement.appendChild(newElement)

// b. insertBefore(newNode, referenceNode): inserts a new node before a specified reference node 
const referenceNode = document.getElementById('reference') 
parentElement.insertBefore(newElement, referenceNode) 

// c. insertAdjacentElement(position, element): inserts an element relative to the current element based on the specified position ('beforebegin', 'afterbegin', 'beforehand', 'afterhand')
parentElement.insertAdjacentElement('beforeend', newElement)

// 5.3 Removing Elements
// You can remove an element from the DOM using the removeChild method on its parent node. 
const parentNode = document.getElementById('parent') 
const childToRemove = document.getElementById('child')
parentElement.removeChild(childToRemove) 

// Alternatively, you can use the remove method direclty on the element you want to remove(not supported in older browsers)
childToRemove.remove()

// 5.4 Cloning Elements 
// The cloneNode method creates a copy (clone) of an existing node in the DOM tree. It accepts a boolean parameter to indicate whether to perform a deep clone (including all descendant nodes) 
const originalElement = document.getElementById('original') 
const clonedElement = originalElement.cloneNode(true) 

// Cloning elements can be useful in scenarios where you need to create multiple copies of an element with the same structure and content. 

// 5.5 Replacing Elements 
// You can replace an existing in the DOM with a new element using the replaceChild method on the parent node 
const parentElemnt = documment.getElementById('parent')
const oldElement = document.getElementById('old')
const newElemnt = document.getElementById('div')

parentElemnt.replaceChild(newElemnt, oldElement)

// This method removes the old element from the DOM and inserts the new element in its place, preserving the position within the parent's node child nodes list 

// Next JavaScript project -> To-Do List 