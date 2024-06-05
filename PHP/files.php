<?php 

// Working with files in PHP 

// 1. Reading Files 
// file_get_contents(): This function reads the entire content of a file into a string 
$file_contents = file_get_contents("file.txt");

echo $file_contents . "<br>"; 

echo "fclose() output <br>";

// fopen(), fread(), fclose(): These function sare used to read a file line by line or in chunks 

$file = fopen("file.txt", 'r');

if ($file) {
    while (!feof($file)) {
        $line = fgets($file);
        echo $line . "<br>";
    }

    fclose($file);
}

// 2. Writing to files 
// file_put_content(): This function writes data to a file 
$data = "Hello, Everyone!";

file_put_contents('file.txt', $data); 

// fopen(), fwrite(), fclose(): These functions are used for writing data to a file into chunks 

$file = fopen('file.txt', 'w');
if ($file) {
    fwrite($file, "Hello, PHP!"); 
    fclose($file);
}

// rename() renames a file 
// rename('old_file', 'new_file');

// copy() copies a file 
// copy('source.txt', 'destination.txt');

// unlink() deletes a file 
// unlink('file.txt'); 

// mkdir() creates a new folder 
// mkdir('new_folder');

// rmdir() removes an empty folder 
// rmdir('folder);
