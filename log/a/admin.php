<?php
    ob_start();
    require_once '../../config.php';
    session_start();
    if(isset($_SESSION['admin_id']))
        header('LOCATION: ../../d/a/dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminlog.css">
    <title>دخول | الإدارة</title>
</head>
<body>
    <div class="l-form">
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> class="form"  method="post">
        <!-- PHP CODE FOR LOGIN -->
        <?php
// When click on login do this code
if(isset($_POST['btnlog'])){
        // get value from input
        $txtnid      =  $_POST['nid'];
        $txtpass     =  $_POST['password'];
        $txtpincode  =  $_POST['pincode'];
         // Get Data from Sql database 
         $sql_log_sel = "SELECT * FROM admin WHERE admin_nid = '$txtnid'  AND admin_password='$txtpass' AND admin_pincode='$txtpincode' ";
         $res = mysqli_query($con, $sql_log_sel);
        //  loop to get all data 
         while($row = mysqli_fetch_assoc($res)){
            //  Session for know how this person 
             $_SESSION['admin_id'] = $row['admin_id'];
            //  get data in Variable 
            $nid     = $row['admin_nid'];
            $pass    = $row['admin_password'];
            $pincode = $row['admin_pincode'];
            $name    = $row['admin_name'];

            if($txtnid == $nid && $txtpass == $pass && $txtpincode == $pincode ){
            header('LOCATION: ../../d/a/dashboard.php');
            }
        }    
        $nid = '';
        $pass = '';
        $pincode = '';
        // if data is false = try again to login
        if($txtnid != $nid || $txtpass != $pass || $txtpincode != $pincode) {
            echo "<h5 style=' text-align: center; border-right: 4px solid red; padding: 8px; color: red; font-weight: 600; background-color: rgba(255, 0, 0, 0.247);'>خطأ حاول مرة أخري</h5>";
            header('REFRESH:1;URL=admin.php');
        }
    }       
     ?>

            <h2 class="form__title">تسجيل الدخول للإدارة</h2>

        <div class="form__div">
            <input type="text" id="nid" name="nid" class="form__input" placeholder=" " required minlength="14" maxlength="14">
            <label for="" class="form__label">الرقم القومي</label>
        </div>

        <div class="form__div">
            <input type="password" id="password" name="password" class="form__input" placeholder=" " required minlength="4" maxlength="20"> 
            <label for="" class="form__label">الرقم السري</label>
        </div>

        <div class="form__div">
                <input type="text" class="form__input" id="pincode" name="pincode" placeholder=" " required minlength="4" maxlength="20">
                <label for="" class="form__label">الرمز التعريفي</label>
        </div>

            <input type="submit" class="form__button" value="دخول" name="btnlog" id="btnlog">
        </form>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>