<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Registration</h1>
        <form onsubmit="return validateFormRegist()" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>?page=registration">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="fName">First Name</label>
                            <input type="text" name="fname" class="form-control" id="fName" placeholder="First name">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lName" placeholder="Last name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="user">Username</label>
                          <input type="text" name="user" class="form-control" id="user" placeholder="Username">
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pas1">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="pas2">re-Password</label>
                            <input type="password" name="repass" class="form-control" id="pas2" placeholder="re-Password">
                          </div>
                        </div>
          
                        <div class="form-row">
                          <label for="mail">E-mail</label>
                          <input type="text" name="email" class="form-control" id="mail" placeholder="E-mail">
                          
                        </div>
                        <input name="sub" id="logbut" type="submit" value="Registration" class="btn btn-primary text-center">
                        <div id="mm"></div>
                      </form>
                      
        </div>
    </div>

</div>

<?php
  if(isset($_POST['sub'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $email = $_POST['email'];
    $regExPas = "/^[a-z0-9]{5,30}$/";
    $regExfName = "/^[A-Z]{1}[a-z]{3,15}(\s[A-Z]{1}[a-z]{20})*$/";                          
    $regExlName = "/^[A-Z]{1}[a-z]{3,15}(\s[A-Z]{1}[a-z]{20})*$/";                        
    $regExUser = "/^[\w][\w\d]{2,14}$/";
    $mistakes = array();

    if(!preg_match($regExfName , $fname)){
      array_push($mistakes , "Bad first name!");
    }
    if(!preg_match($regExlName , $lname)){
      array_push($mistakes , "Bad last name!");
    }
    if(!preg_match($regExUser , $user)){
      array_push($mistakes , "Bad username!");
    }
    if(!preg_match($regExPas , $pass)){
      array_push($mistakes , "Bad password!");
    }
    if($pass != $repass){
      array_push($mistakes , "Password and repassword do not match!");
    }

    if(count($mistakes) == 0){
      $pass = md5($pass);
      $upit = "SELECT * from users where username = ?";
      try{
        $upit = $conn -> prepare($upit);
        $rez = $upit->execute([$user]);
        $rezultat = $upit->fetchAll();
        if(count($rezultat)){
          array_push($mistakes , "Username already exist!");
        }
      }
      catch(PDOException $ex){
        echo $ex->getMessage();
      }
      $upit2 = "SELECT * from users where email = ?";
      try{
        $upit2 = $conn -> prepare($upit2);
        $rez = $upit2->execute([$email]);
        $rezultat = $upit2->fetchAll();
        #var_dump($rezultat);
        if(count($rezultat)){
          array_push($mistakes , "E-mail already exist!");
        }
      }
      catch(PDOException $ex){
        echo $ex->getMessage();
      }
    }
    if(count($mistakes) == 0){
      $insert = "INSERT INTO users values(null , ? , ? , ? ,? ,?,?,?)";
      try{
        $insert = $conn->prepare($insert);
        $rez = $insert->execute([$fname , $lname , $user , $email ,$pass , 0 , "korisnik"]);
        if($rez){
          echo "<script>alert('Registration successful!')</script>";
        }
        else{
          echo "<script>alert('Error!')</script>";
        }
      }
      catch(PDOException $ex){
        echo $ex->getMessage();
      }
    }
    else{
      echo "<script>alert('";
      foreach($mistakes as $m){
        echo $m."   ";
      }
      echo "');</script>;";
    }

  }
?>