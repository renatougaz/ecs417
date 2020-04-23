<?php
session_start();
if(isset($_SESSION["username"])){
  $statusbox = "<h3>Welcome <br>".$_SESSION["username"].'</h3>
  <section>
      <input type="button" name="logout" onclick="logout()" value="Log Out""><br>
    </section>';
    $_SESSION["statusbox"] = $statusbox;
}
else{
  $statusbox = '<h3>Blog login</h3>
  <section>
    <form class="login" action="login.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" name="username" required maxlength="15"><br>
      <label for="password">Password:</label><br>
      <input type="password" name="password" required maxlength="15"><br>
      <input class="work"type="submit" name="login" value="Log in">
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
        <li><a href="#myself">About myself</a></li>
        <li><a href="#skills">Skills and Achivements</a></li>
        <li><a href="#education">Education and Qualifications</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li ><a href="">Blog</a></li>
      </ul>
    </nav>

    <br>

    <article class="main">
      <section id="myself"class="nopad">
        <h3>About myself</h3>
        <p >
          My full name is Renato Jesus Ugaz Huaringa and I am a Computer Science student at Queen Mary University of London.<br>
          I was born in Lima, Peru and raised there. <br>
          I moved to London at age 15 and have been living there since. <br>
          My favourites hobbies are playing videogames and tabble tennis. <br>
          Back-end development is one of my main points of interest.
        </p>
      </section>

      <section id ="skills">
        <h3>Skills and Achivements</h3>
        <ul class="square">
          <li>Java and python Programming</li>
          <li>Spanish and English proficiency</li>
          <li>Problem solving</li>
          <li>Critical thinking</li>
          <li>Project management</li>
        </ul>
      </section>

      <section id="education" >
        <h3>Education and Qualifications</h3>
        <p><b>2013-2016 </b>Colegio Ateneo de La Molina</p>
        <p><b>2016-2018 </b>Ashrcroft Technology Academy</p>
        <p><b>2018-2019 </b>University of Essex international college</p>
      </section>

    <section id="experience">
      <h3>Experience</h3>
      <p>
        Since primary schools I have achieved high grades in school and have taken part on various extracurricular activities.<br>
        I have participated various MUN (Model United nations),STEM clubs and tutortings schemes.<br>
        In regard with Computer Science, I have been able to assemble my own PC and troubleshoot many of my friends' issues.<br>
        On top of this, I have multiple programming hours on my belt.
      </p>
    </section>

    <section id="portfolio"class="nopad">
      <h3>Portfolio</h3>
      <ul class="square">
        <li>Random password generator (Python)</li>
        <li>Hangman Game (Python)</li>
        <li>Alien pets Game (Java)</li>
        <li>Infection game (Java)</li>
      </ul>
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
<!--<button onclick="myFunction()">Click me</button>

<p id="demo"></p>

<script>
function myFunction() {
document.getElementById("demo").innerHTML = document.getElementById("demo").innerHTML+"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean urna neque, feugiat in interdum vel, vestibulum a ex. Morbi varius lacus sit amet leo placerat facilisis. Vestibulum justo mauris, iaculis vitae tincidunt malesuada, gravida nec erat. Ves";
}
</script>-->
