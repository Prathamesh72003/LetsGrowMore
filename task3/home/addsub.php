<?php
include "../db.php";
session_start();
if (!isset($_SESSION["teacher"])) {
    header("Location: ./teacher.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task 3</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                text-align: center;
            }

            .addform {
                background-color: lavender;
                display: flex;
                justify-content: center;
                text-align: center;
                height: 100%;
                margin: 20px;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                padding: 20px;
            }
        </style>
    </head>

    <body>
        <div class="addform">
            <form action="" method="post">
                <h1><?= $_SESSION['teacher'] ?></h1>
                <h3>Add Subject</h3>
                <p>Subject Name</p><input type="text" name="subject">
                <p>Subject Code</p><input type="text" name="code">
                <p></p>
                <input type="submit" value="Add" name="add">
            </form>
        </div>
    </body>

    </html>
<?php
if(isset($_POST['add'])){
    $subject = $_POST['subject'];
    $code = $_POST['code'];
    $add_query = mysqli_query($conn,"INSERT INTO `subjects`(`name`, `code`) VALUES ('$subject','$code')");
    if($add_query){
        echo "<script>alert('Done')</script>";
    }else{
        echo "<script>alert('error')</script>";
        
    }
    header("Location: ./teachers.php");
}
}
?>