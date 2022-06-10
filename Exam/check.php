<?php
  ob_start();
  require_once '../config.php';
  session_start();

  $exam_id = $_GET['exam_id'];
  $student_id = $_SESSION['st_id'];

  $sql_sel_exam = "SELECT * FROM exam WHERE ex_id ='$exam_id'";
  $reseult_exam = mysqli_query($con, $sql_sel_exam);
  while($row = mysqli_fetch_assoc($reseult_exam)){
      $ex_subject = $row['ex_subject'];
  }

  if(!isset($_SESSION['st_id']))
    header('LOCATION: ../index.html');
?>

<?php
    if(isset($_POST['endexam'])){
        mysqli_query($con, "insert into ex_check (student_check_id,ex_id,check_stutes) values ('$student_id','$exam_id',1)");
    }
?>
<?php
if(isset($_POST['endexam'])){
  
    $count  = $_POST['count'];
    $i = 1;
    while($i <= $count){
      $qu  = $_POST['question'.$i];
      $ans = $_POST['choice'.$i];
      $cor_ans = $_POST['plus'.$i];

      $score=0;
      if($ans == $cor_ans){
        $score = $score+2;
      }
      mysqli_query($con, "insert into result (answer,question,ex_id,st_id,ex_subject,total_degree) values ('$ans','$qu','$exam_id','$student_id','$ex_subject','$score')");
      $i++;
}
header('LOCATION: ../d/s/dashboard.php');
}
?>