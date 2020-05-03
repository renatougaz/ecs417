<?php
session_start();
if(isset($_SESSION["statusbox"]) and (isset($_SESSION["username"]))){
    $statusbox = $_SESSION["statusbox"];
}
else{
  $statusbox = '<h4>Blog login</h4><br>
  <section>
    <form class="login" action="login.php" method="post">
      <label for="username">Username:</label><br>
      <input type="email" name="username" required><br>
      <label for="password">Password:</label><br>
      <input type="password" name="password" required maxlength="15"><br>
      <input type="submit" name="login" value="Log in"class="button">
    </form>
    </section>';
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Renato Ugaz Huaringa - Curriculum Vitae</title>
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

      <section id="experience" class="nopad">
        <h3>Experience</h3><br>
         <p>
           Since primary schools I have achieved outstanding grades in school and have taken part on various extracurricular activities.<br><br>
           I have participated in various MUN (Model United nations),STEM clubs and tutortings schemes.<br>
           In regard with Computer Science, I have been able to assemble my own PC and troubleshoot many of my friends' issues due to my constant online research on the area.<br>
           On top of this, I have multiple programming hours using different languages on my belt.<br>
         </p>


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
      <p style="text-align:center;">&copy;Copyright 2020 Renato Ugaz Huaringa</p>
    </div>
  </footer>




</body>
</html>
