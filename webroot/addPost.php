<?php 
  session_start();
  $statusbox = $_SESSION["statusbox"];
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Renato Ugaz Huaringa - Add blog entry</title>
    <link type="text/css" href="reset.css" rel="stylesheet">
    <link type="text/css" href="styles.css" rel="stylesheet">
</head>
<body>
  <header>
      <h1 >Renato Ugaz Huaringa</h1>
      <h2>Student</h2>
  </header>

  <nav id="navbar">
    <ul id="navul">
      <li><a href="index.php#myself">About myself</a></li>
      <li><a href="index.php#skills">Skills and Achivements</a></li>
      <li><a href="index.php#education">Education and Qualifications</a></li>
      <li><a href="index.php#experience">Experience</a></li>
      <li><a href="index.php#portfolio">Portfolio</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
  </nav>

  <br>
  
  <article class="main">
    <section class="nopad" >
      <h3 id="add" class="middle" >Add blog entry</h3>

      <form action="addPost.php" method="post">
        <input type="text" name="title" placeholder="Title"><br>
        <input type="text" name="entry" placeholder="Enter yout text here"  rows="4" cols="50"><br>
        <input type="submit" name="addentry" value="Post">
        <input type="button" name="clear" value="Clear">
      </form>
    </section>    
  </article>
  
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
    </div>
  </footer>

</body>
</html>
    