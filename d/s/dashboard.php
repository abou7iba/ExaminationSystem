<?php
    ob_start();
    require_once '../../config.php';
    session_start();
    $student_id_s = $_SESSION['st_id'];
    if(!isset($_SESSION['st_id']))
        header('LOCATION: ../../index.html');
?>
<?php
    $student_check_id = ''; $exam_check_id = '';$check_stutes = '';
    // When click on login do this code
    if(true){
    // Get Data from Sql database
    $sql_sel_student = "SELECT * FROM student WHERE st_id = '$student_id_s'";
    $res = mysqli_query($con, $sql_sel_student);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
    $student_department = $row['department'];
    $student_band = $row['band'];
    $student_id = $row['st_id'];
    $sitnumber = $row['snumber'];
    $name = $row['f_name'];
    }
    } 
?>
<?php
    // When click on login do this code
    if(true){
    // Get Data from Sql database
    $sql_sel_exam_q = "SELECT * FROM exam WHERE ex_department ='$student_department' AND ex_band='$student_band'  ";
    $res = mysqli_query($con, $sql_sel_exam_q);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        //  get data in Variable s
        $ex_department = $row['ex_department'];
        $ex_band = $row['ex_band'];
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
    <link rel="stylesheet" href="css/style.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>لوحة تحكم الطلاب</title> 
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"><?php echo $name ?></span>
                    <span class="profession"><?php echo $sitnumber ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-left toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="news.php">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">أخر الأخبار</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="dashexam.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">الأمتحانات</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="noti.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">الأشعارات</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="result.php">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">النتائج</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../../end.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">خروج</span>
                    </a>
                </li>
                </li>
                
            </div>
        </div>

    </nav>
    <section class="home">
<!-- 
        <marquee behavior="scroll" direction="right" class="marq-news">
        <span> اهلا بكم في موقع مشروع الاختبارات الالكتروني الخاص بطلاب المعهد العالي للإداره وتكنولوجيا المعلومات بكفرالشيخ شعبة نظم معلومات </span>
            <span> | </span>
            <span>- احمد ابوهيبة -</span>
        </marquee> -->

        <div class="student-data">
            <h4> اسم الطالب : <span class="data-style">  <?php echo $name ?> </span></h4>
            <h4> رقم الجلوس : <span class="data-style">  <?php echo $sitnumber ?> </span></h4>
            <h4> الفرقة : <span class="data-style">  <?php echo $student_band ?> </span></h4>
            <h4> القسم  : <span class="data-style">  <?php echo $student_department ?> </span></h4>
        </div>

        <table>
            <thead>
                <th colspan="3" class="head-table">امتحانات اونلاين</th><br>
            </thead>
            <thead>
              <tr>
                <th>اسم المادة</th>
                <th>النشاط</th>
              </tr>
            </thead>
<?php
if(true){
    $sel_exam = "SELECT * FROM exam WHERE ex_department ='$student_department' AND ex_band='$student_band'";
    $res_exam = mysqli_query($con, $sel_exam);
    while($row = mysqli_fetch_assoc($res_exam)){
        $ex_id = $row['ex_id'];
        $ex_subject = $row['ex_subject'];
        $ex_band = $row['ex_band'];

        $date = $row['ex_date'];
        $date_today = date("Y-m-d");

        if($date == $date_today){
        echo "<tbody>";
        echo '<td>'.$ex_subject.'</td>';
        echo '<td><a href="../../Exam/s_exam.php?exam_id='.$ex_id.'">دخول</a></td>';
        echo "</tbody>";
        }
    }
}
?> 
</tbody>     
   <!--  -->
    </table>    
    <br><br>
    <table class="exam-table">
            <thead>
                <th colspan="3" class="head-table">امتحانات تم دخولها</th><br>
            </thead>
            <thead>
              <tr>
                <th>اسم المادة</th>
              </tr>
            </thead>
<?php
    // When click on login do this code
if(true){
    // Get Data from Sql database
    $sql_sel_check = "SELECT * FROM ex_check";
    $res_ch = mysqli_query($con, $sql_sel_check);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res_ch)){
    //  get data in Variable s
    $student_check_id = $row['student_check_id'];
    $exam_check_id = $row['ex_id'];
   // Get Data from Sql database
   $sql_sel_exam = "SELECT * FROM exam WHERE ex_department ='$student_department' AND ex_band='$student_band'  ";
   $res_ex = mysqli_query($con, $sql_sel_exam);
   //  loop to get all data 
    while($row = mysqli_fetch_assoc($res_ex)){
    //  get data in Variable s
    $exam_id = $row['ex_id'];
    $ex_subject = $row['ex_subject'];
    $ex_band = $row['ex_band'];

        if($student_check_id == $student_id_s &&  $exam_check_id == $exam_id ){
            echo "<tbody>";
            echo '<td style="color:#2C3333;">'.$ex_subject.'</td>';
            echo "</tbody>";
        }
    }
}
}
?>     
        </tbody>
    </table>
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