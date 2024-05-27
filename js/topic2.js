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
// -> switch statement: Evaluates an expression and executes the associated the associated block of code based on matching cases.

// 2. Loops 
// -> for loop: Executes a block of code a specific number of times based on a counter variable
// -> while loop: Executes a block of code as long as a specified condition is true 
// -> do...while loop: Similar to while loop, but the code block is executed at least once before checking the condition

// 3. Break and Continue Statements 
// -> break statement: Exits the current loop or switch statement 
// -> continue statement: Skips the current iteration of a loop and moves to the next iteration. 

// The control flow statements allow you to create complex logic and algorithms in your JavaScript code. 

// Examples
