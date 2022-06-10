<?php
    ob_start();
    require_once '../../../config.php';
    session_start();
    $teacher_id_s = $_SESSION['teacher_id'];
    if(!isset($_SESSION['teacher_id']))
        header('LOCATION: ../../index.html');
?>
<?php
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($con, "DELETE FROM exam WHERE ex_id ='$delete_id'");
        // mysqli_query($con, "DELETE FROM questions WHERE ex_id ='$delete_id'");
     }
    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM teacher WHERE teacher_id = '$teacher_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $nid     = $row['teacher_n_id'];
        $pass    = $row['teacher_password'];
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
    <title> عرض الامتحانات </title> 
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

        <table>

            <thead>
                <th colspan="5" class="head-table"> الامتحانات </th><br>
            </thead>
            <thead>
              <tr>
                <th>اسم المادة</th>
                <th colspan="4">النشاط</th>
              </tr>
              
<?php
if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM exam WHERE d_id = '$teacher_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $ex_id = $row['ex_id'];
        $ex_department = $row['ex_department'];
        $ex_band = $row['ex_band'];
        $ex_subject = $row['ex_subject'];
        $ex_group = $row['ex_group'];
        $ex_date    = $row['ex_date'];
        $d_id    = $row['d_id'];

        echo '<tr>';
        echo '<td>'. $ex_subject .'</td>';
        echo '<td><a href="editexam.php?edit='.$ex_id.'">تعديل</a></td>';
        echo '<td><a href="addquestions.php?show='.$ex_id.'">اضف سؤال</a></td>';
        echo '<td><a href="showquestion.php?show='.$ex_id.'">عرض الاسئلة</a></td>';
        echo '<td><a style="color:red;" href="showexam.php?delete='.$ex_id.'">حذف</a></td>';

        echo '</tr>';
    }
    } 
?>
                  
                  
                  
              </tr>
            </thead>
            <tbody>    
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