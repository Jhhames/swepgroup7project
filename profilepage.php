<?php
include 'functions/database.php';
include 'functions/sessions.php';

$connect = connect_db('swep_project');

if (isset($_SESSION['name']) && isset($_SESSION['matric_number'])) 
{

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Obafemi Awolowo University - Undergraduate Profile</title>

    <style>
    a {
        text-decoration: none;
        color: inherit;
    }
       .head{
    }
    text-align:center;
    background: darkblue;
    color: yellow;
    width: 100%;
    font-family: impact regular;
    font-size: 250%;
    padding: 17px;
    font-style: italic;
    }


    .container{
    font-size: 100%;
    width: 100%;
    height:500px;
   
    }
    body {
            background-image: url('./index.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 100%;
            position: relative;
            width: 100%;
    }
    .profile{
    /* margin-left: 2%; */
    font-weight: bolder;
    font-style: italic;
    /* float: right; */
    width: 70%;
    font-size: 20px;
    margin-top: 10px;
    }
    .logo{
    float: left;
    position: relative;
    bottom: 10px;
    left: 20px;
    }
    .sidebar{
    float: left;
    margin-top: 10px;
    /* margin-left:0.5em; */
    color: darkblue;
    font-weight: bold;
    font-size: 25px;
    /* background-color: #000099; */
    text-decoration: none;
    /* padding-left: 1%; */
    /* padding-right: 1%; */
    /* padding-top: 0; */
    /* padding-bottom: 20%; */
    }
    .sidebar:hover{
    /*background-image: linear-gradient(to top, white  0%, #000099 100%);*/
    background-color: rgba(100,100,100,0.4);
    color: white;
    padding-left: 5px;
    padding-right: 5px;
    border-radius: 7px;

    }
     /* a:active{
    color: green;
    }  */
    footer{
        background-color: darkblue;
         padding-top: 5px;
         padding-bottom: 5px; 
         color: yellow; 
         margin-top:400px;
         margin-bottom: 0;
    }
    .primary {
    display: inline;
}
img {
    width: 13em;
    height: 12em; 
    align-self: left;
}
h1 {
    font-size: 50px; 
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: darkblue;
    text-align: center;
}

    </style>
</head>
<!-- BODY -->

<body>
    <div class="all">
    	<div class ="container">
    		<!-- <header class="head">
                OBAFEMI AWOLOWO UNIVERSITY
                <div class="logo">
                <img src="oaulogo.png" width="70px"    />
                </div>
            </header> -->
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
              
            <table width="100%">
                <tr width= "100%">
                    <td width="25%" valign="top">
                        <div class="sidebar">
                            <p><a href="profilepage.php">Profile Page</a></p>
                            <p><a href="coursereg.php">Course Registration</a></p>
                            <p><a class="b" href="timetable.php">Check Time Table</a></p>
                            <p><a href="logout.php"><?= $_SESSION['name'] ?> Sign Out</a></p>
                        </div>
                    </td>
                    <td width="75%">
                        <div class="profile">
                            <h2>STUDENT PROFILE</h2>
                                <p>Registration Number: <span class="details"> <?= $_SESSION['matric_number'] ?>  </span><br/></p>
                                <p> Name: <span class="details"><?= $_SESSION['name'] ?></span><br/></p>
                                <p> Current Part: <span class="details"> <?= $_SESSION['current_part'] ?> </span><br/></p>
                                <p> Degree Programme: <span class="details"><?= $_SESSION['course'] ?></span><br/></p>
                                <p> Department: <span class="details"> <?= $_SESSION['department'] ?> </span><br/></p>
                                <p> Faculty: <span class="details"><?= $_SESSION['faculty'] ?></span><br/></p>
                                <p> BedSpace Location: <span class="details">nil </span><br/></p>
                        </div>
                    </td>
                </tr>
            </table>
		</div>
    </div>
</body>
<footer style="">
    COPYRIGHT&copy;2016/2017 GROUP 7 SWEP PROJECT
</footer>  
</html>

<?php

    }
else
{
    die('');
}
?>