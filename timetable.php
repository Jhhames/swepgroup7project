<?php
include 'functions/database.php';
include 'functions/sessions.php';

$connect = connect_db('swep_project');

?>
<html>
<head>
    <style>
        body{
            background-image: url('./index.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 100%;
            position: relative;
        }
        .container{
            background-color: white;
            margin-right: 50px;
            margin-left: 50px;
            padding-top: 0;
            padding-bottom: 0;
            height: 540px;
        }
        div.one{
        background-color: skyblue;
        height: 40px;
        text-align: center;
        padding-top: 5%;
        padding-bottom: 1%;
        margin: 0;
        font-size: 22px;
        font-weight: bold;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        li{
        display: inline-block;
        margin-right: 10px;
        }
        /* .heading{
            padding: 0;
        } */
        #close{
            margin-top: 400px;
        }
    </style>
    <title></title>
    <body>
        <div class="container">
            <div class="one">
            <ul class="heading"> 
                <li>EXAMINATION</li>
                <li>LECTURE</li>
                <li>CALENDAR</li>
            </ul>
            </div>
            <a href="profilepage.php"><input type="submit" name="Close" value="Close" style="float:right;margin-right: 50px;background-color: skyblue;position: 
        relative;" id="close"></a>
        </div>
        
</body>
</head>
</html>