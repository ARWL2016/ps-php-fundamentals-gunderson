<?php

$connection = new mysqli('localhost', 'root', '', 'phpfundamentals');
print_r($connection); 
if($connection->connect_errno)
{
   die("Database Connection Failed. Reason: ".$connection->connect_error); 
}

$tempFirstName = 'William';

$query = "SELECT first_name, last_name, pen_name FROM Authors WHERE first_name = ?"; //? is a placeholder
$statementObj = $connection->prepare($query); //prepare method tells PHP that values will come later

$statementObj->bind_param("s", $tempFirstName); //s - string (with two params we could use "si" first string, second integer)
$statementObj->execute(); // inserts params into query string 

$statementObj->bind_result($firstName, $lastName,$penName); // assign query results to these variables 
$statementObj->store_result(); // bind results to variable names

if ($statementObj->num_rows > 0)
{
    while ($statementObj->fetch())
    {
        echo $firstName." ".$lastName." (".$penName.")".PHP.EOL; 
    }
}

$statementObj->close(); 
$connection->close(); 





