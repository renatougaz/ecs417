
<?php
session_start();
if (!isset($_SESSION["username"])){
    echo '<script>
    if(!alert("Plase login first")){
      location.replace("index.php");
    }
  </script>';
}
 $statusbox = $_SESSION["statusbox"];

 $servername = "localhost";
 $dbuser = "root";
 $dbpassword = "password";
 $dbname = "mini";
 $conn = new mysqli($servername, $dbuser,$dbpassword,$dbname);

 if ($conn->connect_error){
   echo '<script>
    alert("Connection error, please try again later")
   </script>';
 }
 if($_SERVER['REQUEST_METHOD']=="POST"){
   $month = $_POST["month"];
   $year = $_POST["year"];
   $sql = "SELECT * FROM `entries` WHERE MONTH(date) = $month AND YEAR(date) = $year";
   $entries = printRows($sql,$conn);
   if ($entries == ""){
     $entries = "<h1 id ='NOENTRY'>No entries available, <br> please try other dates</h1>";
   }

 }

  else {
    $sql = "SELECT * FROM `entries`";
    $entries = printRows($sql,$conn);
    if ($entries == ""){
      echo '<script>
      if(!alert("There are no entries available, please log in to make one first")){
        location.replace("index.php");
      }
    </script>';
    }
  }
  function printRows($sql,$conn){
    $result = $conn -> query($sql);
    $rows = array();
    while($row = $result -> fetch_array(MYSQLI_ASSOC)){
      $rows[] = $row["content"];
      $rows[] = $row["title"];
      $rows[] = $row["date"];
    }
    $Rrows = array_reverse($rows);
    $counter = 1;
    $entries ="";
   foreach($Rrows as $print){
     if ($counter == 1){
         $entries = $entries.'<div class="time"><i class="far fa-clock"></i>'.$print.'</div>';
         $counter = 2;
     }
     else if($counter == 2){
         $entries = $entries.'<h4 id="titlepreview" class="title">'.$print ;
         $counter = 3;
     }

     else{
         $entries = $entries.'</h4><p id="bodypreview">'.$print.'</p><hr>';
           $counter = 1;
     }

   }
   return $entries;
  }
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Renato Ugaz Huaringa - Blog</title>
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
  <article class="main">
    <a href="addPost.php" class="button" id="newentry">New entry </a>

    <div class="date">
    <form action="viewBlog.php" method="post" >
      <label >Select a specific month:   </label>
      <select name="month">
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <select name="year" >
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
      </select>
      <input type="submit" class ="button" style="	padding:1.25em" value="Go">
    </form>
    </div>

    <section style="margin-bottom:0" >
      <?php
      echo $entries;
       ?>
    </section>
  </article>







  <br>
  <aside id="login">
    <?php
    echo $statusbox;
    ?>
  </aside>

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
