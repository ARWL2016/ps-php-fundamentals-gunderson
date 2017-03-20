<?php

$connection = new mysqli('localhost', 'root', '', 'phpfundamentals');

//print_r($connection); 

if($connection->connect_errno)
{
   exit("Database Connection Failed. Reason: ".$connection->connect_error); 
}

