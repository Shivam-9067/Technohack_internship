<?php
error_reporting(0);
    session_start();
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == TRUE){
        $loggedin = TRUE;
    }
 
 echo  '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Project-1/welcome.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
      if(!$loggedin){
      echo  '<li class="nav-item">  
          <a class="nav-link active" aria-current="page" href="/Pj 2/signup.php">Sign-Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Pj 2/login.php">Login</a>
        </li>';
      }
        if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/Project-1/logout.php">Log-Out</a>
        </li>';
    }
     echo '</ul>
     
    </div>
  </div>
</nav>';

?>