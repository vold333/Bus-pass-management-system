<?php
session_start();
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'buspassdb');
// Establish database connection.
include('alert.php');
try {
  $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
  exit("Error: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body style="background:none">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-b">
          <center>
            <h2>New Registration</h2>
          </center>
          <center>
          <hr>
          <form action="reg.php" method="post" id="login-form">
            <div class="form-group">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-t"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                  <!-- Icon for email field -->
                </div>
                <input type="text" class="form-control" id="username" name="name" placeholder="Enter your Username"
                  required>
              </div>
            </div>
            </br>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-t"><i class="fas fa-lock fa-lg"></i></span> <!-- Icon for password field -->
                </div>
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="Enter your password" required>
                <div class="input-group-append">
                </div>
              </div>
              </br>
              <div class="form-group">
                <label for="password">Mobile number</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-t"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <!-- Icon for password field -->
                  </div>
                  <input type="text" class="form-control" id="password" name="phone"
                    placeholder="Enter your Mobile Number" required>
                  <div class="input-group-append">
                  </div>
                </div>
              </div>
              </br>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                <div class="error-message" id="error-message"></div>
                <br>
          </form>
          <p>Already have an Account? <a href="index.php">Sign in</a></p>
          </center>
        </div>
      </div>
    </div>
  </div>
  <script>
  </script>
</body>

</html>