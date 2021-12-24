<?php
include "../db.php";
session_start();
if (!isset($_SESSION["student_data"])) {
    header("Location: ./teacher.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                text-align: center;
            }

            .changeForm {
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
        <div class="changeForm">
            <form action="" method="post">
                <h1><?= $_SESSION['student_data'] ?></h1>
                <h3>Change marks</h3>
                <p>Data Structure</p><input type="number" name="ds">
                <p>Set</p><input type="number" name="set">
                <p>Java</p><input type="number" name="java">
                <p>Php</p><input type="number" name="php">
                <p>Java script</p><input type="number" name="js">
                <p></p>
                <input type="submit" value="Update" name="update">
            </form>
        </div>
    </body>

    </html>
<?php
if(isset($_POST['update'])){
    $student =  $_SESSION['student_data'];
    $ds = $_POST['ds'];
    $set = $_POST['set'];
    $java = $_POST['java'];
    $php = $_POST['php'];
    $js = $_POST['js'];
    echo ($ds);
    echo ($set);
    echo ($java);
    echo ($php);
    echo ($js);

    $update = mysqli_query($conn, "UPDATE `report` SET `ds`='$ds',`set`='$set',`java`='$java',`php`='$php',`js`='$js' WHERE student='$student'");
    if($update){
        echo "<script>alert('Done')</script>";
    }else{
        echo "<script>alert('error')</script>";
        
    }
    header("Location: ./teachers.php");
}
}
?>