<?php
    ob_start();
    require_once '../config.php';
    require_once 'q.php';
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
              header('LOCATION: ../dashboard/student/dashboard.php');
            }
            }
        }
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="exam.css">
    <title>امتحان اونلاين</title>
    <style>
      .question h5{
        width: 60%;
      }
      body{
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    </style>
    <script src="exam.js"></script>
</head>
<body>
<?php echo "<form action='check.php?exam_id=".$exam_id."' method='post' >" ?>
<div class="events" id="events">
        <div class="container">
          <div class="info" dir="rtl">
            <div class="time">
              <div class="unit" id="unit">
                <span id="mints"></span>
                <span>دقيقة</span>
              </div>
              <div class="unit" id="unit">
                <span id="sec"></span>
                <span>ثانية</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="exam" >
  <?php
        // When click on login do this code
            echo '<div class="question" dir="rtl">';
            $q = 1; 
            while($q == 1){
                if(true){
                    // Get Data from Sql database
                  $sql_sel_questions = "SELECT * FROM questions WHERE ex_id ='$exam_id' ORDER BY rand() LIMIT 20";
                  $res_q = mysqli_query($con, $sql_sel_questions);
                    //  loop to get all data
            while($row = mysqli_fetch_assoc($res_q)){
                    //  get data in Variable
                    $q_id = $row['q_id'];
                    $question = $row['question'];
                    $q_ch1 = $row['ans1'];
                    $q_ch2 = $row['ans2'];
                    $q_ch3 = $row['ans3'];
                    $q_ch4 = $row['ans4'];
                    $q_ch5 = $row['cor_ans'];
            echo '<div class="question'.$q.'" id="">';
            echo '<h3 class="q">السؤال [ '.$q.' ] </h3>';
            echo '<input type="hidden" name="count" value="'. $q.'" >';
            echo '<h5 value="'. $question .'">'. $question .'</h5>';
            echo '<input type="hidden" name="question'.$q.'" value="'. $question .'" >';
            echo '<div>';
            echo '<input type="radio" name="choice'.$q.'" value="'. $q_ch1 .'" id="q'.$q.'-one">';
            echo '<label for="q'.$q.'-one">'. $q_ch1 .'</label>';
            echo '</div>';
            echo '<div>';
            echo '<input type="radio" name="choice'.$q.'" value="'. $q_ch2 .'" id="q'.$q.'-two">';
            echo '<label for="q'.$q.'-two">'. $q_ch2 .'</label>';
            echo '</div>';

            if($q_ch3 == ''){
              echo '<div>';
              echo '<input type="hidden" name="plus'.$q.'" value="'. $q_ch5 .'" id="q'.$q.'-five">';
              echo '</div>';
            }else{
              echo '<div>';
              echo '<input type="radio" name="choice'.$q.'" value="'. $q_ch3 .'" id="q'.$q.'-three">';
              echo '<label for="q'.$q.'-three">'. $q_ch3 .'</label>';
              echo '</div>';
            }

            if($q_ch4 == ''){
              echo '<div>';
              echo '<input type="hidden" name="plus'.$q.'" value="'. $q_ch5 .'" id="q'.$q.'-five">';
              echo '</div>';
            }else{
              echo '<div>';
              echo '<input type="radio" name="choice'.$q.'" value="'. $q_ch4 .'" id="q'.$q.'-four">';
              echo '<label for="q'.$q.'-four">'. $q_ch4 .'</label>';
              echo '</div>';
            }

            echo '<div>';
            echo '<input type="hidden" name="plus'.$q.'" value="'. $q_ch5 .'" id="q'.$q.'-five">';
            echo '</div>';

            $q++; 
}}}
echo '</div>';
?>
<button class="end" name="endexam">حفظ وخروج</button>

</div>
</div>
</form>

<!-- script for timer -->
<script>
	var s=60; 
	var m=60; 
	var time= setInterval(function() {timer()}, 1000); 
	function timer(){ 
    s--;  
	if(s==-1){ 
    m--; 
    s=59;
	if(m==-1){ 
    m=0; 
    s=0; 
    clearInterval(time); 

      alert("انتهى الوقت المحدد للأمتحان"); 
	} 
	} 

  document.getElementById('mints').innerHTML =  m ;
  document.getElementById('sec').innerHTML = s ;	

if(s < 10){
  document.getElementById('sec').innerHTML = "0" + s ;	
}
if(m < 10){
  document.getElementById('mints').innerHTML = "0" + m ;	
}
	} 
</script>
</body>
</html>