<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UniQoin - Buy & Sell Digital Currency</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">


  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>  

   <!-- 
    - #HEADER
  -->

  <header class="login-header" data-header>
    <div class="container">

      <a href="./index.html" class="login-logo">
        <img src="./assets/images/logo.png" width="32" height="32" alt="UniQoin logo">
      </a>
    </div>  
    </header>  
    
  <!-- 
    - #SIGNUP
  -->
  <section class="login" aria-label="crypto login" data-section></section>
    <div class="container"> 
      <div class="log-tab">
        <div class="row"> 
            <div class="col-md-6"> 
                <div class="card">

                <?php
                if (isset($_POST['signup'])) {
                  $username = $_POST['user'];
                  $email = $_POST['email'];
                  $password = $_POST['pass'];
                  $cpassword = $_POST['cpass'];

                  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                  $errors = array();
                  
                  if (empty($username) OR empty($email) OR empty($password) OR empty($cpassword)) {
                    array_push($errors,"<div class='alert alert-danger'>All fields are required</div>");
                  }
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "<div class='alert alert-danger'>Email is not valid</div>");
                  }
                  if (strlen($password)<8) {
                    array_push($errors,"<div class='alert alert-danger'>Password must be at least 8 charactes long</div>");
                  }
                  if ($password!==$cpassword) {
                    array_push($errors,"<div class='alert alert-danger'>Password does not match</div>");
                  }

                  require_once "./assets/php/database.php";
                  $sql = "SELECT * FROM `signup_data` WHERE email = '$email'";
                  $result = mysqli_query($conn, $sql);
                  $rowCount = mysqli_num_rows($result);
                  if ($rowCount>0) {
                    array_push($errors,"<div class='alert alert-danger'>Email already exists!</div>");
                  }

                  if (count($errors)>0) {
                    foreach ($errors as  $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                   }else{
                    
                    $sql = "INSERT INTO `signup_data` (username, email, password) VALUES ( ?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt,"sss",$username, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert-success'>You are registered successfully.</div>";
                    }else{
                        die("Something went wrong");
                    }
                   }
                   
                }

                ?>
                    <form  class="box" action="signup.php" method="POST" autocomplete="off"> 

                        <h1>Get Started</h1>

                        <input type="text" name="user" placeholder="Username">  
                        <input type="text" name="email" placeholder="Email"> 
                        <input type="password" name="pass" placeholder="Password"> 
                        <input type="password" name="cpass" placeholder="Confirm Password"> 
                        <p>By creating an account you agree to our<a class="terms" href="#">Terms & Privacy</a></p>
                        <input type="submit" name="signup" value="Create Account"> 

                        <p>Already have an account?<a class="logline" href="./login.php">Sign in</a></p>
                        <br>
                        <div class="col-md-12"> <ul class="social-list"> 

                          <li>
                            <a href="#" class="social-link">
                              <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                          </li>
                
                          <li>
                            <a href="#" class="social-link">
                              <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                          </li>
                
                          <li>
                            <a href="#" class="social-link">
                              <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                          </li>
                
                          <li>

                            <a href="#" class="social-link">
                              <ion-icon name="logo-linkedin"></ion-icon>
                            </a>

                          </li>
                        </ul> 
                    </div> 
                </form> 
            </div> 
        </div> 
    </div>
  </div>
  </div>
</section>

<!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>