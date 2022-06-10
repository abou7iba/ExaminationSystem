<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $teacher_id_s = $_SESSION['teacher_id'];
    $questions_id_edit = $_GET['edit'];
    if(!isset($_SESSION['teacher_id']))
        header('LOCATION: ../../index.html');
?>
<?php
    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM teacher WHERE teacher_id = '$teacher_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $nid     = $row['teacher_n_id'];
        $pincode = $row['teacher_pincode'];
        $name    = $row['teacher_name'];
        $nickname    = $row['teacher_nickname'];
    }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/inputstyle.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title> تعديل سؤال </title> 

    <style>
        .showquetion{
            position: absolute;
            bottom: -180%;
            right: 5%;
            width: 90%;
            margin: auto;
            box-shadow: 0 10px 25px rgb(144 163 179 / 20%);
            border-spacing: 0;
}
</style>
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <img src="../img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"><?php echo $name ?></span>
                    <span class="profession"><?php echo $nickname ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-left toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../news.php">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">أخر الأخبار</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../dashexam.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">الأمتحانات</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../noti.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">الاشعارات</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../../../end.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">خروج</span>
                    </a>
                </li>



                </li>
                
            </div>
        </div>

    </nav>

<section class="home">

        <div class="student-data">
            <h4> الاسم  : <span class="data-style">  <?php echo $name ?> </span></h4>
            <h4> اللقب : <span class="data-style">  <?php echo $nickname ?> </span></h4>
            <h4> الرمز التعريفي : <span class="data-style">  <?php echo $pincode ?> </span></h4>
        </div>
<form method="post" class="formstyle">

<div class="addexam">
            <center>
<?php
if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM questions WHERE q_id  = '$questions_id_edit'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $question = $row['question'];
        $ans1  = $row['ans1'];
        $ans2  = $row['ans2'];
        $ans3  = $row['ans3'];
        $ans4  = $row['ans4'];
        $cor_ans  = $row['cor_ans'];
    }
    } 
?>

<label for="">تعديل سؤال : </label><br>
<input type="text" placeholder="السؤال" name="question" value="<?php echo $question ?>" >
<br>
<label for="">تعديل الاجابات : </label><br>
<input type="text" placeholder=" الاجابة الاولي"   name="cho1" value="<?php echo $ans1 ?>" >
<input type="text" placeholder=" الاجابة الثانية" name="cho2" value="<?php echo $ans2 ?>">
<input type="text" placeholder=" الاجابة الثالثة" name="cho3" value="<?php echo $ans3 ?>">
<input type="text" placeholder=" الاجابة الرابعة" name="cho4" value="<?php echo $ans4 ?>">
<br>
<label for="">تعديل الاجابة الصحيحه : </label><br>
<input type="text" placeholder=" الاجابة الصحيحة" name="cho5" value="<?php echo $cor_ans ?>">
<p> * ملاحظه : يرجي تعديل الاجابه الصحيحه اذا تم تعديلها من الاجابات فالاعلي </p>
            <br>

            <input type="submit" value="تعديل سؤال" name="editquestionbtn">
            </center>
            <br>
        </div>
<?php
if(isset($_POST['editquestionbtn'])){
    $question  = $_POST['question'];
    $cho1 = $_POST['cho1'];
    $cho2 = $_POST['cho2'];
    $cho3 = $_POST['cho3'];
    $cho4 = $_POST['cho4'];
    $cho5 = $_POST['cho5'];

    $update = "UPDATE `questions` SET `question`='$question',`ans1`='$cho1',`ans2`='$cho2',`ans3`='$cho3',`ans4`='$cho4',`cor_ans`='$cho5' WHERE q_id = '$questions_id_edit'";
    mysqli_query($con, $update);
    
    header('LOCATION: editquestions.php?edit='.$questions_id_edit.'');


}
?>
</form>
</section>

<script>
const body = document.querySelector('body'),
sidebar = body.querySelector('nav'),
toggle = body.querySelector(".toggle"),
searchBtn = body.querySelector(".search-box"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click" , () =>{
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");

    if(body.classList.contains("dark")){
        modeText.innerText = "الوضع النهاري";
    }else{
        modeText.innerText = "الوضع الليلي";
        
    }
});
    </script>
</body>
</html>