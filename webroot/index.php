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
      <section id="myself"class="nopad">
        <h3>About myself</h3>
        <p >
          My full name is Renato Jesus Ugaz Huaringa and I am a Computer Science student at Queen Mary University of London.<br>
          I was born and raised in Lima, Peru in the suburbs of La molina district.<br>
          My family moved to London when I was 15 and have been living there since.<br><br>
          Since an early age I have been interested in Computers and their potential,
          ranging from loving IT at school to actively trying to achiveve further things
          at home with a computers CS is one of my main passions in life.<br>
          I starting programming with Python and have good control over the language, moreover I have basic knowledge in VisualBasic and MySQL.<br><br>
          Java is my main current programming language which I feel more confident programming on.<br>
          I love playing table tennis, it is one of those activies that I cannot get tired of.<br>
          Currently, I am looking forward to working in backend development project.<br>
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
