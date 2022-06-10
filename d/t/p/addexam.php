<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $teacher_id_s = $_SESSION['teacher_id'];
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
    <title> اضافة امتحان </title> 
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
                            <i class='bx bx-home-alt icon'></i>
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
                            <span class="text nav-text">اضافة اشعار</span>
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
        <form method="post">
        <div class="addexam">
            <center>
            <label for="">اضافة امتحان : </label><br>
            <input type="text" placeholder="اسم المادة" name="examname">
            <label for="">الشعبة :</label><br>
            <select name="department" id="" class="selection">
                <option disabled>الشعبة : </option>
                <option  value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>
                <option  value="علوم الحاسب">علوم الحاسب</option>
                <option  value="ادارة">ادارة</option>
                <option  value="محاسبة">محاسبة</option>
            </select>
            <br>
            <label for="">الفرقة :</label><br>
            <select name="band" id="" class="selection">
                <option disabled>الفرقة : </option>
                <option value="الاولي">الاولي</option>
                <option value="الثانية">الثانية</option>
                <option value="الثالثة">الثالثة</option>
                <option value="الرابعة">الرابعة</option>
            </select>
            <br>
            <label for="">تاريخ الامتحان :</label><br>
            <input type="date"  class="selection" name="date" id="">
            <br>
            <label for="">وصف الامتحان :</label><br>
            <textarea name="description" id="" cols="20" rows="5" class="selection" ></textarea>
            <br>

            <input type="submit" value="اضافة امتحان" name="addexambtn">
            </center>
            <br>
        </div>
<?php
if(isset($_POST['addexambtn'])){
        $department  = $_POST['department'];
        $band = $_POST['band'];
        $group = $_POST['group'];
        $examname = $_POST['examname'];
        $date  = $_POST['date'];
        $description  = $_POST['description'];

        mysqli_query($con, "INSERT INTO exam (ex_department,ex_band,ex_group,ex_subject,ex_time_for,ex_date,ex_description,d_id) VALUES ('$department','$band','$group','$examname','ساعة','$date','$description','$teacher_id_s')");
        header('LOCATION: addexam.php');

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