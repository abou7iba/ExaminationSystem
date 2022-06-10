<?php
    ob_start();
    require_once '../../config.php';
    session_start();
    if(isset($_SESSION['st_id']))
        header('LOCATION: ../../d/s/dashboard.php');
    else
        echo "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stulog.css">
    <title>دخول | الطلاب</title>
</head>
<body>
    <div class="l-form">
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> class="form"  method="post">
        <!-- PHP CODE FOR LOGIN -->
        <?php
        // When click on login do this code
        $sitnumber = "";
        $nid = "";            
        $nid = '';
        $pass = '';
        $pincode = '';
        if(isset($_POST['btnlog'])){
        // get value from input
         $txtsitnumber  =  $_POST['sitnumber'];
         $txtnid   =  $_POST['nid'];
         // Get Data from Sql database 
         $sql_log_sel = "SELECT * FROM student WHERE snumber='$txtsitnumber' AND sn_id = '$txtnid'";
         $res = mysqli_query($con, $sql_log_sel);
        //  loop to get all data 
         while($row = mysqli_fetch_assoc($res)){
            //  Session for know how this person 
             $_SESSION['st_id'] = $row['st_id'];
            //  get data in Variable s
            $sitnumber = $row['snumber'];
            $nid = $row['sn_id'];
            $name = $row['f_name'];
            //  if data is true login this person and go to home page 
            if($txtnid == $nid && $txtsitnumber == $sitnumber){
                echo "<h5 style=' text-align: center; border-right: 4px solid #34BE82; padding: 8px; color: green; font-weight: 600; background-color: rgba(0, 128, 0, 0.250);'>اهلا بعودتك : " . $name . "</h5>"; // Welcome message and get name 
                header('REFRESH:1;URL=../../d/s/dashboard.php');
            }            
            
        }    
            // if data is false = try again to login
            if($txtnid != $nid || $txtsitnumber != $sitnumber) {
                echo "<h5 style=' text-align: center; border-right: 4px solid red; padding: 8px; color: red; font-weight: 600; background-color: rgba(255, 0, 0, 0.247);'>خطأ حاول مرة أخري</h5>";            
                header('REFRESH:1;URL= student.php');
            }

    }            
             ?>

            <h2 class="form__title">تسجيل الدخول للطلاب</h2>

        <div class="form__div">
            <input type="text" id="sitnumber" name="sitnumber" class="form__input" placeholder=" " required minlength="4" maxlength="100">
            <label for="" class="form__label">رقم الجلوس</label>
        </div>

        <div class="form__div">
            <input type="text" id="nid" name="nid" class="form__input" placeholder=" " required minlength="14" maxlength="14"> 
            <label for="" class="form__label">الرقم القومي</label>
        </div>

            <input type="submit" class="form__button" value="دخول" name="btnlog" id="btnlog">
        </form>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>