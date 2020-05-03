<?php
  session_start();
  if (!isset($_SESSION["username"])){
    header("Location: index.php");
  }
  $statusbox = "<h4>Welcome <br> <b>".$_SESSION["username"].'</b>!</h4><br><br>

      <a href="logout.php" class="button">Log Out</a><br><br>
  ';
  $_SESSION["statusbox"] = $statusbox;
  if($_SERVER['REQUEST_METHOD'] =="POST"){
    $servername = getenv("MYSQL_SERVICE_HOST");
    $dbuser = getenv("DATABASE_USER");
    $dbpassword = getenv("DATABASE_PASSWORD");
    $dbname = getenv("DATABASE_NAME");
    $conn = new mysqli($servername, $dbuser,$dbpassword,$dbname);

    if ($conn->connect_error){

      echo '<script>
        if(!alert("Connection error, please try again later")){
          location.replace("addPost.php");
        }
      </script>';
    }
    else {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $sql = "INSERT INTO entries (title,content,date) VALUES ('$title','$content', current_timestamp())";
        $conn -> query($sql);
        $conn->close();
        header("Location: viewBlog.php");
    }

  }
   ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Renato Ugaz Huaringa - Add blog entry</title>
    <link type="text/css" href="reset.css" rel="stylesheet">
    <link type="text/css" href="styles.css" rel="stylesheet">
    <!--this is for the clock icon-->
    <script src="https://kit.fontawesome.com/c1e01d36a3.js" crossorigin="anonymous"></script>
</head>
<div class="container">


<body>
  <header>
      <h1 >Renato Ugaz Huaringa</h1>
      <h2>Student</h2>
  </header>

  <nav id="navbar">
    <ul id="navul">
      <li><a href="index.php">About myself</a></li>
      <li><a href="skills.php">Skills and Achivements</a></li>
      <li><a href="education.php">Education and Qualifications</a></li>
      <li><a href="experience.php">Experience</a></li>
      <li><a href="portfolio.php">Portfolio</a></li>
      <li ><a href="viewBlog.php">Blog</a></li>
    </ul>
  </nav>

  <br>


  <article class="main">
    <section class="nopad" >
      <div id="middle" class="middle">
        <div id="preview" class="hidden">
          <div id="time" class="time"></div>
          <h3 id="titlepreview" class="title">title preview</h3>
          <p id="bodypreview" class="entry">the entry itself </p>
          <hr>
          <input id="edit" type="button" value="Go back" class = "button"onclick="edit()">
          <script>
            function edit() {
              document.getElementById("preview").classList.add("hidden");
              document.getElementById("blogform").classList.remove("hidden");
              document.getElementById('middle').classList.add("middle");
            }
          </script>

        </div>

        <form action="addPost.php" method="post" onsubmit="prevent(event)" id="blogform">
        <h3 id="add">Add blog entry</h3>


        <input type="text" name="title" placeholder="Title" id="blogtitle"><br><br>
        <textarea rows="8" cols="80" name="content" placeholder="Enter yout text here" id="blogbody"></textarea><br>
        <div class="postmiddle">


        <input type="submit" id="post" value="Post" class = "button" >
        </form>
        <script>
        function prevent(event){
            if(document.getElementById('blogbody').value == '' || document.getElementById('blogtitle').value == ''){
              event.preventDefault();
              if(document.getElementById('blogbody').value == ''){

                document.getElementById('blogbody').placeholder = "Please enter some text";
                document.getElementById('blogbody').classList.add("highlight");
              }
              if(document.getElementById('blogtitle').value == ''){
                document.getElementById('blogtitle').placeholder = "Please enter a title";
                document.getElementById('blogtitle').classList.add("highlight");
              }
            }
          }
        </script>
        <input type="button" value="Preview" class="button" onclick="preview()">

        <script>

        function preview() {
          if(document.getElementById('blogbody').value == '' || document.getElementById('blogtitle').value == ''){
            alert("Please enter a complete entry before previewing");
          }
          else{
            document.getElementById("titlepreview").innerHTML = document.getElementById("blogtitle").value;
            document.getElementById("bodypreview").innerHTML = document.getElementById("blogbody").value;
            document.getElementById('preview').classList.remove("hidden");
            document.getElementById('blogform').classList.add("hidden");
            var currentTime = new Date();
            document.getElementById("time").innerHTML = '<i class="far fa-clock"></i>'+currentTime.getFullYear()+'-'+(currentTime.getMonth()+1)+'-'+currentTime.getDate()+' '+currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
            document.getElementById('middle').classList.remove("middle");
          }
        }

        </script>
        <input type="button" name="edit" value="Clear" class="button"  onclick="clearEntry()">

        <script>
        function clearEntry(){
          if(!(document.getElementById('blogbody').value == '' && document.getElementById('blogtitle').value == '')){
            if(confirm("Do you want to delete your current draft?")){
              document.getElementById('blogbody').value = '';
              document.getElementById('blogtitle').value = '';
            }
          }
        }
        </script>


        </div>

      </div>
    </section>
  </article>
  <aside id="login">
    <?php
    echo $statusbox;
    ?>
  </aside>


</div>
  <footer>
    <br>

    <div class="footer">
    <h3>Contact Information</h3>
      <p>Phone number: +44 07911 123456</p>
      <p>Email: renatougaz@hotmail.com</p>
      <p>Instagram: @renatougaz</p>
      <p style="text-align:center;">&copy;Copyright 2020 Renato Ugaz Huaringa</p>
    </div>
  </footer>

</body>
</html>
