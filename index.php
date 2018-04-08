<?php
include 'functions/database.php';
include 'functions/sessions.php';

$connect = connect_db('swep_project');
 
function post($var)
{
    $connect = connect_db('swep_project');
    if(isset($_POST[$var]))
    {
        return mysqli_real_escape_string($connect, $_POST[$var]);
    }
}
        if (post('login') != NULL)
        {
            $matric = post('matric');
            $password = post('password');
            $session = post('session');
            $semester = post('semester');

            $sql = "SELECT * FROM `students` where matric_no = '$matric' && password = '$password' ";

            $login_check = fetch_custom('students', $connect, $sql);
            
                if (mysqli_num_rows($login_check) > 0 )
                {
                    $_SESSION['matric_number']  = $matric;
                    $_SESSION['session']  = $session;
                    $_SESSION['semester']  = $semester;
                    
                        while ($row = mysqli_fetch_array($login_check)) {
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['course'] = $row['course'];
                            $_SESSION['department'] = $raow['department'];
                            $_SESSION['faculty'] = $row['faculty'];
                            $_SESSION['current_part'] = $row['current_part'];
                            $_SESSION['name'] = $row['name'];

                        }

                        // $_SESSION['successMessage'] = "Welcome $_SESSION['name']";
                        redirect_to('profilepage.php');
                }
                else
                {
                    $_SESSION['errorMessage'] = "Invalid username or password";
                }
            

        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swep Project</title>
    <link rel="stylesheet" href="style.css" type="text/css"> 
    <!-- <link rel="stylesheet" href="responsive.css" type="text/css"> -->
</head>
<body width="100%">
        <div class="primary">
                 <table width= "100%">
                     <tr width= "100%">
                        <td width="20%">
                            <img src="oaulogo.png" alt="OAU LOGO" >
                        </td> 
                        <td width="80%">
                            <h1>OBAFEMI AWOLOWO UNIVERSITY</h1>
                        </td>  
                    </tr>
                </table>
        </div>       
                <div class="form">
                    <span style="color:red"> <?= error(); ?> </span>
                    <form method="POST" action="">
                        <h2>LOG IN</h2>
                        <br><br>
                        <input type="text" placeholder="MATRIC NO..." title="MATRIC NUMBER" name="matric" required  style="width:250px;">
                        <br><br>
                        <input type="text" placeholder="password..." name="password" title="Password" style="width:250px;" required>
                        <br><br>
                    
                        <!-- <input type="text" placeholder="session..."required> -->
                         <select style="width:250px;" name="session"> 
                            
                            <option value="2017/18">2017/18</option>
                            <option>2016/17</option>
                            <option>2015/16</option>
                            <option>2014/15</option>
                            <option>2013/14</option>
                            <option>2012/13</option>
                            <option>2011/12</option>
                            <option>2010/11</option>
                            <option>2009/10</option>
                        </select> 
                        <br><br>
                        <!-- <input type="text" placeholder="semester..." required> -->
                        <select style=" width:250px;" name="semester">
                            <option value="harmattan">Harmattan</option>
                            <option value="rain">Rain</option>
                        </select>
                        <br><br>
                        <input type="submit" value="LOG IN" name="login" class="login">
                    </form>
        
                </div>
</body>
</html>