<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Defrai.it</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap Simple Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="css/stylessign.css" rel="stylesheet" />
</head>

<body>


  <form action="chkLogin.php" method="post">
    <?php if (isset($_GET["msg"])) echo $_GET["msg"] . "<br>" ?>

    <div class="login-form">
      <form action="/examples/actions/confirmation.php" method="post">
        <h2 class="text-center" style="color:aliceblue">Login</h2>
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
          <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
          
        </div>
      </form>
      <p class="text-center"><a href="signup.php">Create an Account</a></p>
    </div>

  </form>


</body>

</html>