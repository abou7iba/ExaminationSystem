<?php
    ob_start();
    session_start();
    require_once '../config.php';
    $exam_id = $_GET['exam_id'];
    $student_id = $_SESSION['st_id'];
    if(!isset($_SESSION['st_id']))
        header('LOCATION: ../index.html');
?>
<?php
    // When click on login do this code
    $i = 1;
    if($i = 1){
    // Get Data from Sql database
    $sql_sel_student = "SELECT * FROM student";
    $res = mysqli_query($con, $sql_sel_student);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $student_id = $row['st_id'];
        $student_department = $row['department'];
        $student_band = $row['band'];
    }
    } 

    if(true){
        // Get Data from Sql database
        $sql_sel_exam_q = "SELECT * FROM exam WHERE ex_department ='$student_department' AND ex_band='$student_band' AND ex_id ='$exam_id'";
        $res = mysqli_query($con, $sql_sel_exam_q);
        //  loop to get all data 
        while($row = mysqli_fetch_assoc($res)){
            //  get data in Variable s
            $exam_id = $row['ex_id'];
            $exam_subject = $row['ex_subject']; // اسم الماده
            $ex_department = $row['ex_department'];
            $ex_time = $row['ex_time_for'];
            $ex_band = $row['ex_band'];
            $ex_date = $row['ex_date'];
            $date_ex = $ex_date . " " . $ex_time;  
        }
        }
    
    if($student_department == $ex_department && $student_band == $ex_band ){
    // Get Data from Sql database
    $sql_sel_exam_q = "SELECT * FROM exam WHERE ex_department ='$student_department' AND ex_band='$student_band' AND ex_id ='$exam_id'";
    $res = mysqli_query($con, $sql_sel_exam_q);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        //  get data in Variable s
        $exam_id = $row['ex_id'];
        $exam_subject = $row['ex_subject']; // اسم الماده
        $ex_department = $row['ex_department'];
        $ex_time = $row['ex_time_for'];
        $ex_band = $row['ex_band'];
        $ex_band = $row['ex_band'];
        $ex_date = $row['ex_date'];
        $date_ex = $ex_date . " " . $ex_time;  
    }
    }
    else{
}

    // When click on login do this code
    $i = 1;
    if($i = 1){
    // Get Data from Sql database
    $sql_sel_result = "SELECT * FROM result";
    $reseult = mysqli_query($con, $sql_sel_result);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($reseult)){
        $st_id = $row['st_id'];
        $ex_id = $row['ex_id'];
    }
    } 
?>