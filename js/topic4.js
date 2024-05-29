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