<?php
    ob_start();
    require_once '../config.php';
    require 'q.php';
    $exam_id = $_GET['exam_id'];
    $student_id = $_SESSION['st_id'];
    if(!isset($_SESSION['st_id']))
        header('LOCATION: ../index.html');    
?>
<?php
        if(isset($_SESSION['st_id']))
        {
            // Get Data from Sql database
            $sql_sel_check = "SELECT * FROM ex_check";
            $res_check = mysqli_query($con, $sql_sel_check);
            //  loop to get all data
            while($row = mysqli_fetch_assoc($res_check)){
              $student_check_id = $row['student_check_id'];
              $exam_check_id = $row['ex_id'];
              $check_stutes = $row['check_stutes'];

            if($student_check_id == $student_id &&  $exam_check_id == $exam_id && $check_stutes == 1){
                header('LOCATION: ../d/s/dashboard.php');
            }
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s_exam.css">
    <title>بدء الأمتحان</title>
</head>
<body>
    <div class="l-form">
        <form action="" class="form"  method="" dir="rtl">
            <h2 class="form__title">تفاصيل الأمتحان</h2>
            <h3>مادة  : <span> <?php echo $exam_subject?> </span></h3>
            <h3> الفرقة  : <span><?php echo $ex_band?></span></h3>
            <h3>مدة الأمتحان : <span><?php echo $ex_time ?></span></h3><br>
            <?php echo '<a href="exam.php?exam_id='.$exam_id.'" class="form__button"  name="btnstartex" id="btnstartex">بدء الأمتحان</a>';?>
            </form>
</body>
</html>