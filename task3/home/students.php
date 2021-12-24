<?php
include "../db.php";
session_start();
if (!isset($_SESSION["sess_user"])) {
  header("location: ../login/student.php");
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
              $query = mysqli_query($conn, "SELECT * from students where email='$email'");
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
              <li class="list">Registered Subjects</li>
            </a>
            <form action="" method="POST">
              <a class="a_list" id="four">
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
          <div class="report_card">
            <table>
              <thead>
                <tr>
                  <td rowspan="2"> Code </td>

                </tr>
                <tr>
                  <td>Subject </td>
                  <td colspan="2"> Marks </td>
                  <td> Grade </td>
                  <td> Points </td>
                </tr>
              </thead>
              <tbody>
                <?php
                $student = $_SESSION["sess_user"];
                $query = mysqli_query($conn, "SELECT * from report where student='$student'");
                while ($row = mysqli_fetch_array($query)) {
                  $ds = $row['ds'];
                  $set = $row['set'];
                  $java = $row['java'];
                  $php = $row['php'];
                  $js = $row['js'];

                ?>
                  <tr>
                    <td>CS 225 </td>
                    <td colspan="2">Data Structures </td>
                    <td> <?= $ds ?> </td>
                    <td> B </td>
                    <td> 12.0 </td>
                  </tr>
                  <tr>
                    <td>CS 225 </td>
                    <td colspan="2">Software Engineering </td>
                    <td> <?= $set ?> </td>
                    <td> A </td>
                    <td> 12.0 </td>
                  </tr>
                  <tr>
                    <td>CS 225 </td>
                    <td colspan="2">Java </td>
                    <td><?= $java ?></td>
                    <td> A </td>
                    <td> 12.0 </td>
                  </tr>
                  <tr>
                    <td>CS 225 </td>
                    <td colspan="2">PHP </td>
                    <td> <?= $php ?></td>
                    <td> A </td>
                    <td> 12.0 </td>
                  </tr>
                  <tr>
                    <td>CS 225 </td>
                    <td colspan="2">Java Script </td>
                    <td> <?= $js ?> </td>
                    <td> B </td>
                    <td> 12.0 </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>

            </table>
          </div>
        </div>


        <div class="right" id="subjects" style="display: none; overflow: scroll;">
          <h3>Registered subjects</h3>
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
        </div>
      </div>
    </div>

    <script>
      document.getElementById("one").addEventListener("click", () => {
        document.getElementById("one").style.color = "red";
        document.getElementById("two").style.color = "black";
        document.getElementById("three").style.color = "black";
        document.getElementById("four").style.color = "black";
        document.getElementById("dashboard").style.display = "block";
        document.getElementById("report").style.display = "none";
        document.getElementById("subjects").style.display = "none";
      })
      document.getElementById("two").addEventListener("click", () => {
        document.getElementById("one").style.color = "black";
        document.getElementById("two").style.color = "red";
        document.getElementById("three").style.color = "black";
        document.getElementById("four").style.color = "black";
        document.getElementById("dashboard").style.display = "none";
        document.getElementById("report").style.display = "block";
        document.getElementById("subjects").style.display = "none";
      })
      document.getElementById("three").addEventListener("click", () => {
        document.getElementById("one").style.color = "black";
        document.getElementById("two").style.color = "black";
        document.getElementById("three").style.color = "red";
        document.getElementById("four").style.color = "black";
        document.getElementById("dashboard").style.display = "none";
        document.getElementById("report").style.display = "none";
        document.getElementById("subjects").style.display = "block";
      })
      document.getElementById("four").addEventListener("click", () => {
        document.getElementById("one").style.color = "black";
        document.getElementById("two").style.color = "black";
        document.getElementById("three").style.color = "black";
        document.getElementById("four").style.color = "red";
        document.getElementById("dashboard").style.display = "none";
        document.getElementById("report").style.display = "none";
        document.getElementById("subjects").style.display = "none";
      })
    </script>
    </body>

  </html>
<?php
if(isset($_POST["logout"])){
    session_start();
    unset($_SESSION['sess_user']);
    session_destroy();
    echo "<script>window.open('../index.html','_self')</script>";
}
}
?>