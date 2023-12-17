<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background: url('images/userlogin.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .login-contai {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .login-b {
      background-color: rgba(248, 249, 250, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Adjust the size of the icon */
    .input-group-t {
      width: 50px;
      /* Set the desired width */
      height: 38px;
      /* Match the height of the input boxes */
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="login-contai">
    <div class="login-b">
      <center>
        <h2>User Login</h2>
      </center>
      <hr>
      <form action="indexes.php" method="post" id="login-form">
        <div class="form-group">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-t"><i class="fas fa-user-circle fa-lg"></i></span>
            </div>
            <input type="text" class="form-control" id="username" name="name" placeholder="Enter your Username"
              required>
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-t"><i class="fas fa-lock fa-lg"></i></span>
            </div>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
              required>
          </div>
        </div>
        <br>
        <center>
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
          <div class="error-message" id="error-message"></div>
          <br>
        </center>
      </form>
      <center>
        <a href="register.php">Register Now</a>
      </center>
      <div>
        <i class="fa fa-home" style="font-size: 30px" aria-hidden="true"></i>
        <p><a href="../index.php"> Back Home </a></p>
      </div>
    </div>
  </div>
</body>

</html>