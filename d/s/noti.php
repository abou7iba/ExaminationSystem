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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/noti.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>الاشعارات</title> 
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
        <!-- <marquee behavior="scroll" direction="right" class="marq-news">
            <span> اهلا بكم في موقع مشروع الاختبارات الالكتروني الخاص بطلاب المعهد العالي للإداره وتكنولوجيا المعلومات بكفرالشيخ شعبة نظم معلومات </span>
            <span> | </span>
            <span>- احمد ابوهيبة -</span>
        </marquee> -->

        <!-- Noti -->
        <div class="noti">
        <h1 class='header-noti'>الإشعارات</h1>
        <hr><br>
<?php
if(true){
    $sql_sel_table_ex = "SELECT * FROM notifications WHERE noti_for_department ='$student_department' AND noti_for_band='$student_band' OR noti_for_department ='الجميع' AND noti_for_band='الجميع' ";
    $res_ex_table = mysqli_query($con, $sql_sel_table_ex);

    while($row = mysqli_fetch_assoc($res_ex_table)){
        $noti_id = $row['noti_id'];
        $noti_text = $row['noti_text'];
        $noti_time = $row['noti_time'];
        $noti_date = $row['noti_date'];
        $noti_add_by = $row['noti_add_by'];
        
        echo "<span class='time'>". $noti_time ."</span>";
        echo "<span> | </span>";
        echo "<span class='date'>". $noti_date ."</span>";
        echo "<h4 class='notifications'>". $noti_text ."</h4>";
        echo "<br><hr>";
    }
}   
?>  
        </div>
        <!-- / Noti -->
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
