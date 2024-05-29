// Topic 3: DOM(Document Object Model)

// 3.1 Introduction to the DOM 
// It is a programming interface for web documents. 
// It represents the structure of a web page as a tree-like hierarchy of nodes, where each node represents an HTML element, attribute, text node, or comment 

// The DOM provides a way for JavaScript to interact with and manipulate the content, structure, and style of a web page dynamically. 
// It allows developers to access and modify the document's elements, attributes and content through a structured and standardized API(Application Programming Interface). 


// 3.2 Selecting and Manipulating Elements 
// JavaScript provides several methods to select and manipulate elements in the DOM: 

// i. getElementById(id): Selects an element by its unique id attribute 
// ii. getElementByTagName(tagName): Selects elements by their tag name e.g. div, p, a. Returns an HTML collection 
// iii. getElementByClass(className): Selects an element by its class. Returns an HTML collection
// iv. querySelector(selector): Selects the first element that matches the specified css selector 
// v. querySelectorAll(selector): Selects all elements that match the specified css selector. Returns a NodeList

// Once you have selected an element, you can manipulate its properties, styles and content using various methods and properties provided by the DOM API.


// 3.3 Working with Events
// Events are actions or occurrences that happen in the browser, such as user interaction (clicks, keyboard, etc), networks events, or timer events. 
// JavaScript allows you to respond to these events by attaching event handlers. 

// a. Event Types and Event Handlers
// - User events: click, mousedown, mouseup, keydown, keyup, keypress 
// - Window events: load, resize, scroll, hashchange 
// - Form events: submit, change, input, invalid
// - Media events: play, pause, ended, seeked

// b. Adding and Removing Event Listeners
element.addEventListener(eventType, eventHandler) 
element.removeEventListener(eventType, eventHandler)


// 3.4 DOM Traversal 
// The DOM provides methods for traversing and accessing different nodes in the document tree. 

// a. Parent, Child and Siblings Node 
// - parentNode: The parent node of the current node 
// - childNodes: A collection of child nodes of the current node 
// - firstChild and lastChild: The first and last Child nodes, respectively 
// - nextSibling and previousSibling: The next and previous sibling nodes repsectively 

// b. Navigating and Accessing Node Relationships 
// - parentElement: The parent node of the current node 
// - children: A collection of child nodes of the current node 
// - firstElementchild and lastElementChild: The first and last child element nodes, respectively 
// - nextElementSibling and previousElementSibling: The next and previous sibling element nodes respectively 

// c. Nodelists and HTMLCollections 
// - NodeList: An array-like collection of nodes returned by methods like querySelectorAll()
// - HTMLCollection: An array-like collection of HTML elements returned by methods like getElementbyTagName