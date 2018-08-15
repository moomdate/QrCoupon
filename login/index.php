<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
  <style type="text/css">
    .bg{
      width: 150;
        height: 150;
    }
    .top-buffer { margin-top:20px; }
   </style>
</head>
<body class="text-center">
    <div class="container top-buffer">
    <div class="row"></div>
    <div class="row">
    <div class="col-sm"></div>
    <div class="col-sm">
    <form class="form-signin" method="post" action="index.php">
      <img class="mb-4" src="image/bg/discount.svg" alt="" width="150" height="150">
      <h1 class="h2 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="username" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <!--<label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
      </div>
      <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
      <p class ="text-muted">or</p>
      <a href="?do=register" >Sign up</a>
      <p class="mt-5 mb-3 text-muted">&copy; เปลี่ยนด้วยสาส</p>
    </form>
    </div>
    <div class="col-sm"></div>
    </div><!--row-->
    </div>
</body>
<?php
include_once "config/config.inc.php";
@session_start();
if (isset($_POST['username'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	/*printf($user);
    printf($pass);*/
	$command = "SELECT * FROM member WHERE mem_username = '$user'";
	$result = $mysqli->query($command);
	$see = $result->num_rows == 1 ? 1 : 0;
	if ($see) {
		$command2 = "SELECT * FROM member WHERE mem_username = '$user' AND mem_password = '$pass'";
		$result2 = $mysqli->query($command2);
		//echo $result2->num_rows;
		if ($result2->num_rows) {
			$_SESSION['login'] = $result2->fetch_array(MYSQLI_NUM);
			if ($_SESSION['login'][4] == "member") {
				header("location:index.php");
			} else {
				//echo "admin";
				header("location:admin/index.php");

			}

			//print_r($_SESSION['login']);
		}
	}
	//print_r();
}
?>
</html>
