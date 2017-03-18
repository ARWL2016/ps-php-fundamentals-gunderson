<?php

//$connection = mysqli_connect('localhost', 'root', '', 'phpfundamentals');

$connection = new mysqli('localhost', 'root', '', 'phpfundamentals');

print_r($connection); 

if($connection->connect_errno)
{
   exit("Database Connection Failed. Reason: ".$connection->connect_error); 
}

//$query = "DELETE FROM Authors WHERE id = 4"; 
//$query = "UPDATE Authors SET pen_name =  'Babbage' WHERE id = 2"; 
//$query = "INSERT INTO Authors VALUES (4, 'Arthur', 'Doyle', null)";

// if we don't list the colomn names after insert, we must insert ALL values, including the key
//$query = "INSERT INTO Authors VALUES (8, 'JRR', 'Tolkien', null)";

$query = "SELECT first_name, last_name FROM Authors ORDER BY first_name"; 
$resultObj = $connection->query($query); 

if($resultObj->num_rows > 0) 
{
    //loops through results until null
    while($singleRowFromQuery = $resultObj->fetch_assoc()) // returns single row as assoc array
    {
//        print_r($singleRowFromQuery); 
        echo "Author: ".$singleRowFromQuery['first_name'].PHP_EOL;
    }
}


// insert_id stores the last inserted id
echo "New id: ".$connection->insert_id; 

$resultObj->close(); // closes the result (aka free())
$connection->close(); 