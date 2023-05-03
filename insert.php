<?php

include 'connection.php';

$name = $_POST['name1'];
$email = $_POST['email1'];
$mobile =$_POST['mobile1'];

$city = $_POST['city1'];
      $sql = "INSERT INTO register(name, email, phone,city) VALUES ('$name','$email','$mobile','$city')";
      if ($conn->query($sql)) 
      {
        echo "Data Inserted Successfully";
      } 
      else{echo "data not inserted";
    }
      


?>