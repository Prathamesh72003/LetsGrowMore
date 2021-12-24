<?php
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Task 3</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body class="centered">
  <div class="login">
    <div class="card">
      <h5 class="card-title">Login</h5>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Login" class="btn">
        </div>
      </form>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_POST["submit"])) {

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM teachers WHERE email='" . $user . "' AND password='" . $pass . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
      while ($row = mysqli_fetch_array($query)) {
        $dbusername = $row['email'];
        $dbpassword = $row['password'];
      }

      if ($user == $dbusername && $pass == $dbpassword) {
        session_start();
        $_SESSION['sess_user'] = $user;

        /* Redirect browser */
        header("Location: ../home/teachers.php");
      }
    } else {
      echo "<script>alert('Invalid username or password!')</script>";
    }
  } else {
    echo "<script>alert('All fields are required!')</script>";
  }
}
?>