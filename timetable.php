<?php
include 'functions/database.php';
include 'functions/sessions.php';

$connect = connect_db('swep_project');

    if(isset($_SESSION['name']) && isset($_SESSION['matric_number']) )
    {

    
                
            $semester = $_SESSION['semester'];
            $part = $_SESSION['current_part'];
            $name = $_SESSION['name'];
            $faculty = $_SESSION['faculty'];
            $matric_number = $_SESSION['matric_number'];
            $email = $_SESSION['email'];
            $table_name = str_replace(" ", "", $name);

        function course_exists($course, $table_name)
        {
            $connect = connect_db('swep_project');

            $sql = "SELECT * FROM $table_name where course_code = '$course' ";
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

            if (mysqli_num_rows($query)> 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        
        $sql_table = "SHOW TABLES LIKE '$table_name' ";        
        $result = mysqli_query($connect, $sql_table) or die(mysqli_error($connect));
       
        if(mysqli_num_rows($result) > 0)
        {
            $sql_for_regd = "SELECT * from $table_name";

            $result_regd = mysqli_query($connect, $sql_for_regd) or die(mysqli_error($connect));
        }
        else
        {
            die('You\'ve not started your course registration yet ');
        }
        


        
    }
    else
    {
        redirect_to('index.php');
    }

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

        table{
            width: 100%;
        }
        th,td{
            text-align: center;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2}

    </style>
    <title></title>
    <body>
        <div class="container">
            <div class="one">
            <ul class="heading"> 
                <li>EXAMINATION</li>
               <!--  <li>LECTURE</li>
                <li>CALENDAR</li> -->
            </ul>
            </div>

            <div style="overflow-x: auto;">
                <table>
                <tr>
                        <th>CODE</th>
                        <th>VENUE</th>
                        <th>DATE</th>
                        <th></th>
                    </tr>

                        <?php
                        if(isset($result_regd) && $result_regd != NULL && !empty($result_regd) )
                        {
                            while ($row = mysqli_fetch_array($result_regd)) {
                        
                        
                        ?>
            

                    <tr>
                        <td> <?=  $row['code']?></td>

                        <?php
                            $course = $row['code'];
                            if(course_exists($course, 'exam_timetable'))
                            {
                                $sql = "SELECT * from `exam_timetable` where course_code = '$course' ";
                                $result = fetch_custom($connect, $sql);

                                $row = mysqli_fetch_array($result);
                        ?>
                        <td>  <?= $row['venue'] ?></td>
                        <td><?=$row['day'] ?> <?=$row['month'] ?> <?=$row['time'] ?></td>

                        <?php
                            }
                            else
                            {
                        ?>
                            <td colspan="2">
                                No timetable released for this course yet
                            </td>                    

                        <?php
                            }
                        ?>
                    </tr>

                        <?php
                                }
                            }
                            else
                            {
                                "No courses for you yet";
                            }
                        ?>          
                    
                </table>

    </div>
            <a href="profilepage.php"><input type="submit" name="Close" value="Close" style="float:right;margin-right: 50px;background-color: skyblue;position: 
        relative;" id="close"></a>
        </div>
        
</body>
</head>
</html>