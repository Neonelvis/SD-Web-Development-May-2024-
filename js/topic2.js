// Topic 2: Basics of JavaScript 

// 2.1 Variables and Data Types 

// Variables are used to store data in JavaScript. 
// Variables are declared using the:
// -> var 
// -> let 
// -> const 

// The let and const keywords were introduced in ECMAScript 6 (ES6) and provide a block-level scoping and constant declaration, respectively. 

// JavaScript has several built-in data types, including: 
// 1. Primitive Data Types  
// -> number (both integers and floating-point numbers)
// -> string (sequence of characters)
// -> boolean (true or false)
// -> undefined (value assigned to uninitialized variables)
// -> null (non-existent or invalid value)
// -> symbol (unique and immutable identifier, introduced in ES6)
// -> bigint (arbitrary-precision integers, inrtroduced in ES2020)

// 2. Non-Primitive Data Types 
// -> object (collection of key-value pairs)
// -> function (reusable blocks of code)

// JavaScript is a dynamically-typed language, meaning that variables can hold values of different types, and their types can change during runtime. 

// Declaring Variables 
let age = 25; // Number 
const name = "Elvis Kamau"; //string
var isStudent = true; //boolean

// Data Types 
const person = {
    name: 'Elvis',
    age: 20
}

// Function 
const greetUser = function () {
    console.log("Hello JavaScript!");
}

// null
let value = null;

// undefined 
let undefinedValue; 

// symbol 
const sym = Symbol('unique'); 

// BigInt
const bigNum = 9007100254740991n;

// Output/display the values to the console 
console.log(bigNum);

console.log(sym)


// 2.2 Operators 
// JavaScript provides various operators for performing operations on values and variables. 
// These include: 

// a. Arithmetic Operators 
// Addition +,
// Subtraction -, 
// Multiplication *, 
// Division /,
// Modulus(remainder of an equation) %, 
// ** (exponentiation, introduced in ES6)

// b. Assignment Operators
// Assignment = 
// +=
// -=
// *=
// /=
// **=

// c. Comparison Operators 
// Equal to ==
// Identical to === 
// Not Equal to !=
// Not Identical to !==
// Greater than >
// Less than < 
// Greater than or Equal to >=
// Less than or Equal to <=

// d. Logical Operators 
// And && 
// Or || 
// Not !

// e. Conditional (ternary) Operator
// condition ? valueIfTrue : valueIfValue

// f. Comma Operator
// expression1, expression2, ..., expressionN

// g. Unary Operators
// Increment ++
// decrement --
// typeof
// void
// delete 

// Operators precedence and associativity determine the order in which operations are performed when multiple operators are present in an expression. 

// Operators Examples

// create two variables 
let x = 5;
let y = 3;

// Arithmetic Operators 
console.log(x + y); // Output = 8
console.log(x - y); // Output = 2 
console.log(x * y); // Output = 15
console.log(x / y); // Output = 1.6666666667
console.log(x % y); // Output = 2 
console.log(x ** y); // Output = 125 

// Assignment Operators
x += y; // same as x = x + y; the new value of x is 8 
console.log(x)

y -= 2; // same as y = y - 2; the new value of y is 1 
console.log(y)

// Comparison Operators 
console.log(x > y); // true 
console.log(x === y); // false (strict equality)
console.log(x !== y); // true (strict non-equality)

// Logical Operators
let z = 10;

// And (returns true if both operands evaluate as true)
console.log((x > y) && (y < z)); //true 

// Or (returns true if either of the operands return true)
console.log((x > y) || (y > z)); //true 

// Not (negates an expression)
console.log(!(x === y)); //true

// 2.3 Control Flow
// Control flow statements allow you to controls the order of execution of your code based on certain conditions or loops. 

// 1. Conditional Statements 
// -> if...else statement: Ececutes a block of code if a condition is true (or false for the else block)
// -> if...else if...else 
// -> switch statement: Evaluates an expression and executes the associated block of code based on matching cases.
// Examples 
let userAge = 18; 

// single if statement
if (userAge >= 18) {
    console.log("You are an Adult!")
}

// if/else statement
let myNum = 10; 

if (myNum >= 20) {
    console.log(myNum + " is greater than 20.")
} else {
    console.log(myNum + " is less than 20.")
}

// if/elseif/else
let MyOtherNumber = 5; 

if (MyOtherNumber > 5) {
    console.log("5 is greater than 5")
} else if (MyOtherNumber == 5) {
    console.log("5 is equal than 5")
} else if (MyOtherNumber < 5) {
    console.log("5 is less than 5")
} else {

}

// switch statement 
let favColor = "Red"; 

switch (favColor) {
    case "Blue":
        console.log("Your Favorite color is Blue");
        break;
    case "Green":
        console.log("Your favourite color is Green");
        break;
    case "Red":
        console.log("Your favorite color is Red");
        break;
    default:
        console.log("We dont know your favorite color!");
}


// Exercise 
// write a JavaScript program that that converts temperature to Celcius. If the temperature is below 0, prints "Freezing", if it is between 0 and 30, print "Cold", if it is between 30 and 60, print "warm" and if it is above 60, print "hot"

let temperature = 30

let temperature_in_degrees = (temperature - 32) * 5 / 9
console.log(temperature_in_degrees)

if (temperature_in_degrees < 0) {
    console.log("Freezing")
} else if (temperature_in_degrees >= 0 && temperature_in_degrees < 30 ) {
    console.log("Cold")
} else if (temperature_in_degrees >=30 && temperature_in_degrees < 60) {
    console.log("Warm")
} else {
    console.log("Hot")
}

// A program that prints the day of the week using switch statement. The switch variable should be integer 1 to 7.
let Day = 7

switch (Day) {
    case 1:
        console.log("Sunday")
        break 
    case 2:
        console.log("Monday")
        break 
    case 3:
        console.log("Tuesday")
        break
    case 4: 
        console.log("Wednesday") 
        break 
    case 5:
        console.log("Thursday") 
        break 
    case 6:
        console.log("Friday")
        break 
    case 7: 
        console.log("Saturday")
        break
    default:
        console.log("Invalid Number")
}


// 2. Loops 
// -> for loop: Executes a block of code a specific number of times based on a counter variable
for (let i = 1; i <= 10; i++) {
    console.log(i) // 1 2 3 4 5 6 7 8 9 `0
}

// Output: 10 9 8 7 6 5 4 3 2 1


for (let num = 10; num > 0; num = num - 1) {
    console.log(num)
}


// for (let num = 10; num > 0; num--) {
//     console.log(num)
// }


// -> while loop: Executes a block of code as long as a specified condition is true
let k = 1
while (k <= 10) {
    console.log(k)
    k++
}

// -30 -15 0 15 30
let number = -30
while (number <= 30){
    console.log(number)
    number += 15
}

// -> do...while loop: Similar to while loop, but the code block is executed at least once before checking the 
let c = 1 
do {
    console.log(c)
    c++
} while (c <= 10)

// 3. Break and Continue Statements 
// -> break statement: Exits the current loop or switch statement 
// -> continue statement: Skips the current iteration of a loop and moves to the next iteration. 
for (let a = 1; a <= 10; a++) {
    if (a === 6 ) {
        break
    }
    console.log(a)
}

// 5 x 1 = 5
// 5 x 2 = 10
// 5 x 12 = 60

for (let value = 1; value <= 20; value++) {
    let result = value * 5
    console.log("5 x " + value + " = " + result )
}

// The control flow statements allow you to create complex logic and algorithms in your JavaScript code. 


// 2.4 Functions
// Functions are reusable blocks of code that perform a specific task. They can take input parameters, perform operations, and optionally return a value. 

// Function Declaration 
// function functionName(param1, param2, ...) {
//     // function body 
//     return value;
// }

function greetings() {
    console.log("Hello Everyone!")
}

greetings()  

function addNumbers() {
    let n1 = 3
    let n2 = 7
    let sum = n1 + n2 
    console.log("The sum is: " + sum)
}

addNumbers()

function addTwoNumbers(x, y) {
    let sum = x + y 
    console.log("The sum is: " + sum)
}

addTwoNumbers(10, 20)
addTwoNumbers(122, 78)

function displayUserName(userName) {
    return userName 
}

console.log(displayUserName("Elvis"))

let userName = displayUserName("Elvis")
console.log(userName)

// create a function that takes a year as an argument and returns true if the year is a leap year and false if otherwise. A leap year is divisble by 4, but not divisible by 100, unless it is also divisible by 400 

function leapYear(year) {
    if ((year % 4) === 0) {
        return true
    } else {
        return false
    }
}

console.log(leapYear(2001))

function Leap_year(year) {
    if (((year % 4) === 0 && (year % 100) !== 0) || (year % 400) === 0 ) {
        return true 
    } else {
        return false
    }
}

console.log(Leap_year(2004))


// Arrays 
// Arrays in JavaScript are used to store unordered collection of values. 
// Arrays can contain values of different data types, including objects and other arrays(multi-dimensional arrays)

// 1. Creating and initializing Arrays 
// const arr = [value1, value2, ...addNumbers, valueN]

// const emptyArr = []
const fruits = ['apple', 'banana', 'orange']

const numbers = [1, 2, 3, 4, 5]

const mixed = ['hello', 42, true, null]

// 2. Array Methods 
// push() and pop(): Add and remove elements from the end of an array 
// shift() and unshift(): Add and remove elements from the beginning of an array 
// slice(): Returns shallow copy of a portion of an array 
// splice(): Changes the contents of an array by removing or replacing existing elements and/or adding new elements 
// concat(): Merges two or more arrays and returns a new arrays 
// indexOf() and lastIndexOf(): Returns the index of the first or last occurrence of a specified element in the array. 
// includes(): Determines whether an array includes a certain value 
// reverse(): Reverses the order of elements in the array 
// sort(): Sorts the array elements in place 
// map(), filter() and reduce(): High-order functions for transforming and manipulating arrays

// push()
fruits.push('grape') // adds a new fruit at the end 
console.log(fruits)

// pop()
fruits.pop() // removes a fruit at the end
console.log(fruits)

// unshift()
fruits.unshift('kiwi') // adds a new fruit at the beginning
console.log(fruits)

// shift()
fruits.shift() // removes a fruit at the beginning
console.log(fruits)

// slice()
let slicedArray = fruits.slice(1, 3)
console.log(slicedArray)

// splice()
fruits.splice(2, 1)
console.log(fruits)

// concat()
let newArray = ['mango', 'pineapple']
let combinedArray = fruits.concat(newArray)
console.log(combinedArray)


// 3. Array Iteration 
// forEach(): Executes a provided function once for each array element
// map(): Creates a new array with the results of calling a provided function on every element of the original array 
// filter(): Creates a new array with all elements that pass the test implemented by the provided function 
// reduce(): Applies a function against an accumulator and each element of the array to it to a single value

// forEach()
fruits.forEach(fruit => {
    console.log(fruit)
})

// map()
const doubledNumbers = numbers.map(num => num * 2)
console.log(doubledNumbers)

// filter()
const evenNumbers = numbers.filter(num => num % 2 === 0) 
console.log(evenNumbers)

// reduce()
const sum = numbers.reduce((acc, num) => acc + num, 0) 
console.log(sum)

// Objects
// Objects in Javaxript are unordered collection of key-value pairs.
// They are used to store complex data structures and represent real-world entities

// 1. Object Literal 
// const obj = {
//     key1: value1, 
//     key2: value2,
//     ...,
//     keyN: valueN
// }

const person1 = {
    name: 'Elvis Kamau', 
    age: 20, 
    greet: function() {
        console.log(`Hello, my name is ${this.name}`);
    }
}



// 2. Accessing and Modifying Object Properties 
// obj.key1 // Dot notation 
// obj['key2'] // Bracket Notation 

// Adding a new property 
// obj.newKey = newValue 

// removing a property 
// delete obj.key2 

console.log(person1.name)

person1.age = 50
console.log(person1) 

person1.occupation = 'Software Developer'

console.log(person1)

// 3. Object Methods
// const obj = {
//     method1: function() {
//         // method body 
//     }, 
//     method2() {
//         // Method body (shorthand style)
//     }
// }

person1.greet()

// 4. The 'this' keyword 
// The 'this' keyword refers to the current object context. Its value depends on how the function is called.
