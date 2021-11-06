<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php include '../includes/db.php'; ?>
<?php require __DIR__ . '/mailconf.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Notes Naka | User Login</title>
    <link rel="icon" href="images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script type="application/x-javascript">
    function on() {
        document.getElementById("overlay").style.display = "block";
    }

    function off() {
        document.getElementById("overlay").style.display = "none";
    }
    </script>
    <!-- Custom Theme files -->
    <link href="css/forgot_password.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>RECOVER PASSWORD</h1>
        <br>
        <div>
            <p class="m-none text-semibold h6" style="text-align: center; color:white;">Enter your e-mail below and we
                will send you reset instructions !</p>
        </div>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="" method="post">
                    <input class="text" type="email" name="user_email" placeholder="Enter your email address"
                        required="">
                    <br>
                    <div class="wthree-text">
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="RESET" name="login">
                </form>
                <p>Remembered? <a href="login_user.php"> Login Now!</a></p>
            </div>
        </div>
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

<?php
if(isset($_POST['login']))
{
    $email = $_POST['user_email'];
    $email = mysqli_real_escape_string($connection, $email);

    // $rcode = bin2hex(random_bytes(15));

    $query = "SELECT * FROM user_profile WHERE user_email = '{$email}' ";
    $select_user_query = mysqli_query($connection, $query);

    if(!$select_user_query)
    {
        die("QUERY FAILED"." ".mysqli_error($connection));
    }

    $db_user_name = "";
    $db_user_email = "";
    $db_user_password = "";
    $db_user_code = "";

    while($row = mysqli_fetch_array($select_user_query))
    {
        $db_user_name = $row['user_name'];
        $db_user_email = $row['user_email'];
        $db_user_password = $row['user_password'];
        $db_user_code = $row['user_code'];
    }
    
    if($email == $db_user_email)
    {
        //the subject
        $sub = "NO REPLY - PASSWORD CHANGE";
        //the message
        $msg = "
Mr/Ms. $db_user_name,
<br>
Please follow the link below to reset your password
https://www.notesnaka.com/reset_password/index.php?email=$db_user_email&pcode=$db_user_password
<br>
Thank you.
<br>
Regards,
<br>
Notes Naka
<br>
notesnaka@gmail.com";
        //recipient email
        $rec = $db_user_email;
        //send email
        if(sendmail($sub,$msg,$rec))
        {
            echo "<div id='overlay' onclick='off()' >
                <div class='overlay' ></div>
                    <div class='modal_1'>
                    <img src='images/success.png' width='200'>
                    <h5 style='text-align: center; font-weight: bold;'>PLEASE CHECK YOUR EMAIL !</h5>
                </div>
            </div>";
        }
        else
        {
           echo "<div id='overlay' onclick='off()' >
                <div class='overlay' ></div>
                    <div class='modal_2'>
                    <img src='images/error.png' width='200'>
                    <h5 style='text-align: center; font-weight: bold;'>SOMETHING WENT WRONG !!</h5>
                    <h5 style='text-align: center; font-weight: bold;'>FEEL FREE TO CONTACT US</h5>
                    <h5 style='text-align: center; font-weight: bold;'><a href='mailto:notesnaka@gmail.com'>Contact Us</a></h5>
                </div>
            </div>"; 
        }
    }

    else
    {
        echo "<div id='overlay' onclick='off()' >
                <div class='overlay' ></div>
                    <div class='modal_2'>
                    <img src='images/error.png' width='200'>
                    <h5 style='text-align: center; font-weight: bold;'>WE ARE UNABLE TO FIND YOUR EMAIL !</h5>
                    <h5 style='text-align: center; font-weight: bold;'>FEEL FREE TO CONTACT US</h5>
                    <h5 style='text-align: center; font-weight: bold;'><a href='mailto:notesnaka@gmail.com'>Contact Us</a></h5>
                </div>
            </div>";
    }

}
?>

</html>