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
    - #LOGIN
  -->
  <section class="login" aria-label="crypto login" data-section></section>
    <div class="container"> 
      <div class="log-tab">
        <div class="row"> 

            <div class="col-md-6"> 

            

                <div class="card"> 

                <?php
                if (isset($_POST["login"])) {
                  $email = $_POST['email'];
                  $password = $_POST['pass'];
                    require_once "./assets/php/database.php";
                    $sql = "SELECT * FROM `signup_data` WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user["password"])) {
                            session_start();
                            $_SESSION[`signup_data`] = "yes";
                            header("Location: invest.html");
                            die();
                        }
                        else{
                            echo "<div class='alert-danger'>Password does not match</div>";
                        }
                    }else{
                        echo "<div class='alert-danger'>Email does not match</div>";
                    }
                }
                ?>
                    <form class="box" action="login.php" method="POST"> 

                        <h1>Sign in</h1>

                        <p class="text-muted"> Please enter your email and password!</p> 
                        <input type="text" name="email" placeholder="Email or Username"> 
                        <input type="password" name="pass" placeholder="Password"> 
                        <a class="forgot text-muted" href="#">Forgot password?</a> 
                        <input type="submit" name="login" value="Login"> 

                        <p>Don't have an account?<a class="logline" href="./signup.php">Get Started</a></p>
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