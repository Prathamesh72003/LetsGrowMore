<?php
include "../db.php";
// include "../style.css";
session_start();
if (!isset($_SESSION["sess_user"])) {
  header("Location: ../index.php");
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task 3</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .student_class {
        /* box-shadow: ra(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 5px -13px !important; */
      }

      .report {
        overflow: scroll;
      }
    </style>
  </head>
  <body">
    <div class="home" id="home">
      <nav class="navbar nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <div class="info">
              <img src="https://images.unsplash.com/photo-1554042317-efd62f19bc95?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fHNjaG9vbHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" width="40" height="34" class="d-inline-block align-text-top img" />
              <?php

              $email = $_SESSION["sess_user"];
              $query = mysqli_query($conn, "SELECT * from teachers where email='$email'");
              $row = mysqli_fetch_array($query);
              $name = $row['name'];
              ?>
              <p style="margin-left: 10px; color: black;"><?= $name ?></p>
            </div>
          </a>
          <div class="title" style="font-size: 20px; margin-top: 10px;">
            <p>Government Polytechnic Pune</p>
          </div>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <div class="display">
        <div class="left">
          <ul>
            <a class="a_list" id="one">
              <li class="list">Dashboard</li>
            </a>
            <a class="a_list" id="two">
              <li class="list">Report</li>
            </a>
            <a class="a_list" id="three">
              <li class="list">Subjects</li>
            </a>
            <form action="" method="post">
              <a class="a_list" id="three">
                <li class="list"><input type="submit" name="logout" value="logout"></li>
              </a>
            </form>
          </ul>
        </div>

        <div class="right" id="dashboard">
          <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div class="col-lg-6 mx-auto">


              <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fas fa-quote-left"></i></div>
                <p class="mb-0 mt-2 font-italic">“Success is no accident. It is hard work, perseverance, learning, sacrifice, and most of all, love of what you are doing.”</p>
                <footer class="blockquote-footer pt-4 mt-4 border-top">Pele

                </footer>
              </blockquote>

            </div>
          </div>
        </div>
        <div class="right report" id="report" style="display: none;">

          <?php
          $query = mysqli_query($conn, "SELECT * FROM report");
          while ($row = mysqli_fetch_array($query)) {
            $name = $row["student"];
            $ds = $row["ds"];
            $set = $row["set"];
            $java = $row["java"];
            $php = $row["php"];
            $js = $row["js"];

          ?>
            <div class="student_class" style="margin-top: 20px; background-color: white !important;display: flex;flex-direction:row ;justify-content: space-between;padding: 15px;align-items: center;">
              <div class="name">
                <p><?= $name ?></p>
              </div>
              <div class="marks" style=" margin-right:20px">
                <p>DS: <?= $ds ?></p>
                <p>SET: <?= $set ?></p>
                <p>JAVA: <?= $java ?></p>
                <p>PHP: <?= $php ?></p>
                <p>JS: <?= $js ?></p>
              </div>
              <form action="" method="post">
                <div class="change_button">
                  <input type="text" name="std_name" value=<?= $name; ?> hidden>
                  <input type="submit" value="change" name="change">
                </div>
              </form>

            </div>


          <?php
          }
          ?>

        </div>

        <div class="right" id="subjects" style="display: none; overflow: scroll;">
          <h3>All subjects (Add subjects)</h3>
          <?php
          $query = mysqli_query($conn, "SELECT * from subjects");
          while ($row = mysqli_fetch_array($query)) {
            $sub_name = $row['name'];
            $subject_id = $row['code'];
          ?>
            <div class="sybject_card">
              <div class="sub_name">
                <p><?= $sub_name ?></p>
              </div>
              <div class="sub_marks">
                <p><?= $subject_id ?></p>
              </div>
            </div>

          <?php
          }
          ?>
          <form action="" method="post">
            <div class="add_btn" style=" display:flex; justify-content:center; align-items:center">
              <input type="submit" value="Add Subject" name="add_sub" style="margin-top: 20px;">
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      document.getElementById("one").addEventListener("click", () => {
        document.getElementById("one").style.color = "red";
        document.getElementById("two").style.color = "black";
        document.getElementById("three").style.color = "black";
        document.getElementById("dashboard").style.display = "block";
        document.getElementById("report").style.display = "none";
        document.getElementById("subjects").style.display = "none";
      })
      document.getElementById("two").addEventListener("click", () => {
        document.getElementById("one").style.color = "black";
        document.getElementById("two").style.color = "red";
        document.getElementById("three").style.color = "black";
        document.getElementById("dashboard").style.display = "none";
        document.getElementById("report").style.display = "block";
        document.getElementById("subjects").style.display = "none";
      })
      document.getElementById("three").addEventListener("click", () => {
        document.getElementById("one").style.color = "black";
        document.getElementById("two").style.color = "black";
        document.getElementById("three").style.color = "red";
        document.getElementById("dashboard").style.display = "none";
        document.getElementById("report").style.display = "none";
        document.getElementById("subjects").style.display = "block";
      })
    </script>
    </body>

  </html>

<?php
  if (isset($_POST['change'])) {
    $name = $_POST['std_name'];
    session_start();
    $_SESSION["student_data"] = $name;
    echo "<script>window.open('./form.php','_self')</script>";
  }
  if (isset($_POST["logout"])) {
    session_start();
    unset($_SESSION['sess_user']);
    session_destroy();
    echo "<script>window.open('../index.html','_self')</script>";
  }

  if(isset($_POST["add_sub"])){
    session_start();
    $_SESSION["teacher"] = $_SESSION["sess_user"];
    echo "<script>window.open('./addsub.php','_self')</script>";
  }
}
?>