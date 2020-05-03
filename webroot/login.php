<?php

  $servername = getenv("MYSQL_SERVICE_HOST");
  $dbuser = getenv("DATABASE_USER");
  $dbpassword = getenv("DATABASE_PASSWORD");
  $dbname = getenv("DATABASE_NAME");
  $conn = new mysqli($servername, $dbuser,$dbpassword,$dbname);

  if ($conn->connect_error){

    echo '<script>
      if(!alert("Connection error, please try again later")){
        location.replace("index.php");
      }
    </script>';

  }
  else{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT pass FROM logins WHERE name = '$username' AND pass = '$password'";
    $result = $conn -> query($sql);
    if ($result->num_rows > 0){
      session_start();
      $_SESSION["username"] = $username;
      header("Location: addPost.php");

    }
    else{
      echo '<script>
        if(!alert("Wrong login credentials please try again")){
          location.replace("index.php");
        }
      </script>';

    }
    $conn->close();
  }


 ?>
