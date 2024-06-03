
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro to PHP</title>
</head>
<body>
    
    <?php
        // PHP code goes here
        echo "Hello, World!";


        // variables 
        $name = "Elvis";

        // integer 
        $age = 20;
        
        // float
        $price = 9.99;

        // String
        $string = "Sarah Smith";

        // Boolean
        $isStudent = true; 

        // Array 
        $colors = array("red", "green", "blue");

        // Object
        $person = new stdClass();
        $person->name = "Dennis";
        $person->age = 20;

        echo $name . "<br>";
        echo $age . "<br>";
        echo $price . "<br>";
        echo $person->name . "<br>";

        // Operators
        $x = 10; 
        $y = 3;

        // Arithmetic -> +, -, *, /, % (modulus)
        echo $x + $y . "<br>"; // 13
        echo $x - $y . "<br>"; // 7 
        echo $x * $y . "<br>"; // 30
        echo $x / $y . "<br>"; // 3.33333333
        echo $x % $y . "<br>"; // 1

        // Assignment -> =, +=, -=, *=, /=, .=(string concatenation)
        $sentence = "This is a ";
        $x += 2; // same as $x = $x + 2;
        $x -= 2; // same as $x = $x - 2;
        $x *= 2; // same as $x = $x * 2;
        $x /= 2; // same as $x = $x / 2;
        $sentence .= "sentence <br>";
        echo $sentence;

        // Comparison -> ==, ===, !=, !==, >, <, >=, <= 
        echo $x == $y . "<br>";
        echo $x === $y . "<br>";
        echo $x != $y . "<br>";
        echo $x !== $y . "<br>";
        echo $x > $y . "<br>";
        echo $x < $y . "<br>";
        echo $x >= $y . "<br>";
        echo $x <= $y . "<br>";

        // Logical -> && (and), || (or), ! (not)
        $isAdult = ($age >= 18 && $isStudent == false);
        echo $isAdult . "<br>";

        // Create a PHP program that calculates the perimeter and area of a circle whose diameter is 14.

        $diameter = 14;
        $perimeter = 22/7 * $diameter;
        echo "The perimeter is $perimeter" . "<br>"; 

        $area = 22/7 * (($diameter / 2) ** 2);
        echo "The area is $area <br>";

        // Control Structures
        // if... else statement
        $totalPrice = 150; 

        if ($totalPrice > 100) {
            echo "You get a discount of 10%. <br>";
        } else {
            echo "No discount on price below 100!";
        }

        $temperature = 12;

        if ($temperature > 32) {
            echo "Cover your tomatoes. <br>";
        } else if ($temperature < 32) {
            echo "Uncover your tomatoes. <br>";
        } else 
            echo "Enjoy your tomatoes. <br>";

        
        // switch statement
        $score = 75;
        switch ($score){
            case ($score >= 90):
                echo "A <br>";
                break;
            case ($score >= 80):
                echo "B <br>";
                break;
            case ($score >= 70);
                echo "C <br>";
                break;
            default:
                echo "F <br>";
        }

        // Ternary operator: conditon ? value1 : value2;
        $grade = ($score >= 60) ? "Pass" : "Fail"; 
        echo "$grade <br>";

        // Loops: for, foreach, while, do...while
        // For loop
        for ($x = 1; $x <= 10; $x++) {
            echo "x = $x <br>"; 
        }
        
        for ($y = 0; $y <= 100; $y += 2) {
            echo "$y, " . "<br>";
        }
        
        $fruits = array("apple", "bananas", "cherries", "berries");

        // foreach loop
        foreach ($fruits as $fruit) {
            echo $fruit;
        }
        
        $person = array(
            "name" => "Elvis",
            "age" => 20, 
            "email" => "elvis@gmail.com"
        );

        print_r($person) . "<br>";
        var_dump($person) . "<br>";

        foreach ($person as $k => $v) {
            echo "$k: $v <br>";
        }

        // While loop
        $i = 1;
        while ($i <= 10) {
            echo "$i <br>";
            $i++;
        }

        // use a while loop to print your name 20 times 
        $name_value = 1;
        while ($name_value <= 20) {
            echo "Elvis <br>";
            $name_value++;
        }

        // do while
        // do {
        //     $a = 1;
        //     echo $a . "<br>";
        //     $a++;
        // } while ($a <= 10); 

        // Arrays 
        $students = array("Joan", "Khalid", "Juliet", "Cynthia", "Maryam", "Eric", "Ricky", "Bradley", "Elvis", "Imani", "Prince", "Ryan", "Ben", "Dwayne", "Elton", "Grace", "Jabir", "Kirima", "Mouhsin");

        echo $students[0] ; //Joan
        echo $student[6]; //Eric


        // Associative Array 
        $switch = array(
            "model" => "2600XM",
            "serial_no" => "123456789",
            "ios" => "12.4"
        );

        echo $switch["model"] . "<br>"; //2600XM
        echo $switch["ios"] . "<br>"; //12.4



        // Functions
        // user-defined functions with keyword function
        // parameters are passed by value 
        // Return values with return statement

        // function definition 
        function greet() {
            echo "Hello Everyone! <br>"; 
        }

        // call the function here 
        greet();

        // a function with a parameter 
        function greet_user($name) {
            echo "Hello $name! . <br>";
        }

        greet_user("Elvis"); 

        // create a function that takes 3 integer parameters and return the product of the first 2 parameters to the power of the third 
        function math_function($x, $y, $z) {
            $value = (($x * $y) ** $z);
            return $value;
        }

        echo math_function(1, 2, 3);
?>

</body>
</html>