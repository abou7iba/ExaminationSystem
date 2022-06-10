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
    $sql_sel_exam_q = "SELECT * FROM exam";
    $res = mysqli_query($con, $sql_sel_exam_q);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        //  get data in Variable s
        $ex_department = $row['ex_department'];
        $ex_band = $row['ex_band'];
    }
    }   
?>
<?php
    $student_check_id = ''; $exam_check_id = '';$check_stutes = '';

        if(isset($_SESSION['st_id']))
        {
            // Get Data from Sql database
            $sql_sel_check = "SELECT * FROM ex_check";
            $res_check = mysqli_query($con, $sql_sel_check);
            //  loop to get all data
            while($row = mysqli_fetch_assoc($res_check)){
              $student_check_id = $row['student_check_id'];
              $exam_check_id = $row['exam_check_id'];
              $check_stutes = $row['check_stutes'];
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
    <link rel="stylesheet" href="css/exam.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>الامتحانات</title> 
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

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">الوضع الليلي</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div> -->
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <!-- <marquee behavior="scroll" direction="right" class="marq-news">
            <span> اهلا بكم في موقع مشروع الاختبارات الالكتروني الخاص بطلاب المعهد العالي للإداره وتكنولوجيا المعلومات بكفرالشيخ شعبة نظم معلومات </span>
            <span> | </span>
            <span>- احمد ابوهيبة -</span>
        </marquee> -->

        <table class="online-exam-table">
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
        </table> 
        <br><br><br>
        <table class="exam-table">
            <thead>
                <th colspan="3" class="head-table">جدول الامتحانات</th><br>
            </thead>
            <thead>
              <tr>
                <th>اسم المادة</th>
                <th>التاريخ</th>
                <th>الوقت</th>
              </tr>
            </thead>
            <tbody>

                <tr>
<?php
    // When click on login do this code
    if(true){
    // Get Data from Sql database
    $sql_sel_table_ex = "SELECT * FROM table_ex WHERE ex_department ='$student_department' AND ex_band='$student_band' ";
    $res_ex_table = mysqli_query($con, $sql_sel_table_ex);

    while($row = mysqli_fetch_assoc($res_ex_table)){
        $table_ex_id = $row['table_ex'];
        $ex_name = $row['ex_name'];
        $table_ex_date = $row['ex_date'];
        $table_ex_time = $row['ex_time'];
        $table_ex_band = $row['ex_band'];
        $table_ex_department = $row['ex_department'];

        echo "<td>". $ex_name ."</td>";
        echo "<td>". $table_ex_date ."</td>";
        echo "<td>". $table_ex_time ."</td>";
    }
}   
?>  
            </tr>
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
