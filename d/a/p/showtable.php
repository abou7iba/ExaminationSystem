<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $admin_id_s = $_SESSION['admin_id'];

    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../../../index.html');
?>
<?php
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($con, "DELETE FROM table_ex WHERE table_ex  ='$delete_id'");
    }

    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM admin WHERE admin_id = '$admin_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $admin_name     = $row['admin_name'];
        $admin_pincode = $row['admin_pincode'];
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
    <title> عرض الجداول </title> 
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                <span class="name"><?php echo $admin_name ?></span>
                    <span class="profession"><?php echo $admin_pincode ?></span>
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
        <h4> الاسم  : <span class="data-style">  <?php echo $admin_name ?> </span></h4>
            <h4> اللقب : <span class="data-style"> ادارة المعهد </span></h4>
            <h4> الرمز التعريفي : <span class="data-style">  <?php echo $admin_pincode ?> </span></h4>
        </div>
<form action="" method="post">
        <table>
            <thead>
            <th colspan="6" class="head-table"> 
                <select name="department" id="" class="selection">
                <option disabled>الشعبة : </option>
                <option value="" style="display:none;">اختار الشعبة من هنا .. </option>
                <option value="نظم المعلومات الادارية">نظم المعلومات الادارية</option>
                <option value="علوم الحاسب">علوم الحاسب</option>
                <option value="ادارة">ادارة</option>
                <option value="محاسبة">محاسبة</option>
            </select>

            <select name="band" id="" class="selection">
                <option disabled>الفرقة : </option>
                <option value="" style="display:none;">اختار الفرقة من هنا .. </option>
                <option value="الاولي">الاولي</option>
                <option value="الثانية">الثانية</option>
                <option value="الثالثة">الثالثة</option>
                <option value="الرابعة">الرابعة</option>
            </select>

            <br>
            <input type="submit" name="search" value='بحث ... ' >
            </th>
            </thead>
            <thead>
              <tr>
                <th>اسم المادة</th>
                <th>الفرقه</th>
                <th>الشعبة</th>
                <th>التاريخ</th>
                <th colspan="2" >النشاط</th>
              </tr>
              
<?php
if(isset($_POST['search'])){

    $department_search = $_POST['department'];
    $band_search = $_POST['band'];

    $sql_sel_teacher = "SELECT * FROM table_ex WHERE ex_band ='$band_search' AND ex_department ='$department_search' ";
    $res = mysqli_query($con, $sql_sel_teacher);

    while($row = mysqli_fetch_assoc($res)){

        $table_ex  = $row['table_ex'];
        $ex_name = $row['ex_name'];
        $ex_date = $row['ex_date'];
        $ex_time = $row['ex_time'];
        $ex_band = $row['ex_band'];
        $ex_department = $row['ex_department'];

        echo '<tr>';
        echo '<td>'. $ex_name .'</td>';
        echo '<td>'. $ex_band .'</td>';
        echo '<td>'. $ex_department .'</td>';
        echo '<td>'. $ex_date .'</td>';
        echo '<td><a href="edittable.php?edit='.$table_ex .'">تعديل</a></td>';
        echo '<td><a style="color:red;" href="showtable.php?delete='.$table_ex .'">حذف</a></td>';
        echo '</tr>';
    }

    } 
?>
                  
                  
                  
              </tr>
            </thead>
    </table>    
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