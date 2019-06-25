<?php
  session_start();
?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <nav id="navv" class="navbar navbar-expand-lg navbar-light bg-light position-relative">
          <a class="navbar-brand" href="index.php">DzondrAadvertisements</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <?php
              include "config/connection.php";
              include "models/functions.php";
              $upit_linkovi = "SELECT * FROM menu WHERE parent=0";
              $rezultat_linkovi = executeQuery($upit_linkovi);
              if(isset($_SESSION['uloga'])){
              if($_SESSION['uloga'] == "korisnik"){
                echo "<li class='nav-item active'>
                <a class='nav-link' href='index.php?page=korisnik'>Moji oglasi</a>
              </li>";
              }
              else if($_SESSION['uloga'] = "administrator"){
  
              }
            }
              foreach($rezultat_linkovi as $red){
              if((int)$red->hasChilds){
                echo "<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                ".$red->text."
                </a>
               <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
              }
              else{
              echo "<li class='nav-item active'>
              <a class='nav-link' href='".$red->href."'>".$red->text."<span class='sr-only'>(current)</span></a>
            </li>";
              }
              prikazi_strukturu( $red->ID, $red->level);        
 }
            
            ?>  
            
      </li>
    </ul>
    
          <ul id="right" class="nav navbar-nav">
          <?php
            if(!isset($_SESSION['user'])):
          ?>

          <li>   <a class="nav-link" id="absClick" href="#">  <i class="fa fa-user" aria-hidden="true"></i>  Log in </a></li>
          </ul>
            <?php endif; 
            if(isset($_SESSION['user'])):
            ?>
            <li>   <a class="nav-link" id="absClick" href="models/users/logout.php">Log out </a></li>
            <?php endif; ?>
  </div>
</nav>
        </div>
    </div>
    <div id="absolute">
              <form action="#" method="post" onsubmit="return validateFormLog()">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username:</label>
                  <input id="username" type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input id="password" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <small id="emailHelp" class="form-text text-muted">If you don't already have an account register <a href="index.php?page=registration">here.</a></small>
                <input type="button" id="sub" class="btn btn-primary" value="Log in" name="subLog">
                <div id="mistakeslog">

                </div>
              </form>
    </div>
</div>
