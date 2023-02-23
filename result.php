<?php

session_start();

//database connection
include "db_connection.php";

//session-error

$getID="";
if(isset($_SESSION['stdid'])){
    //for getting student info using primary key
    $assignID=$_SESSION['stdid'];
    $studentID=mysqli_query($conn,"SELECT *FROM `std_info` WHERE roll_no=$assignID");
    $fetch=mysqli_fetch_assoc($studentID);
    $getID=$fetch['std_ids'];
}else{
    header('location:index.php');    
}

 //for getting student info using primary key
//  $assignID=$_SESSION['stdid'];
//  $studentID=mysqli_query($conn,"SELECT *FROM `std_info` WHERE roll_no=$assignID");
//  $fetch=mysqli_fetch_assoc($studentID);
//  $getID=$fetch['std_ids'];


// ending the session
if(isset($_POST['btn-close'])){
    session_unset();
    session_destroy();
    header('location:index.php');  
}
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/result.css">
        <script src="https://kit.fontawesome.com/3bb2251dd3.js" crossorigin="anonymous"></script>
        <title>Document</title>

    </head>

    <section class="main-section">  
        <section class="icon-section">
            <i class="fa fa-times" aria-hidden="true"></i>
        </section>          
        <header>
            KIST College and SS <br>Kamalpokhari, Kathmandu <br>Email:info@kist.edu.np <br>PO Box. 20828, Nepal <br>Phone:+977-01-4534990/4534178
        </header>
        <br>
        
        <!-- Student information here -->
        <body>
            <section>
                <table>
                <?php
                        $sql="SELECT *FROM std_info,faculty_list,semester WHERE std_ids=$getID AND std_faculty=f_id AND std_info.sem_id=semester.sem_id";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        ?>
                        
                            <tr>
                                <th class="t1">Name:<?php echo $row['std_name'] ?></th>
                                <th class="t1">Faculty:<?php echo $row['sem_name']?></th>
                            </tr>
                            <tr>
                                <th>Roll No:<?php echo $row['roll_no']?></th>
                                <th>Faculty:<?php echo $row['faculty']?></th>
                            </th>
                        </tr>       
                </table>
            </section>
        <br>
                
        <!-- marksheet here -->
        <table border="" >
            <thead>
                <th>S.N.</th>
                <th>Subject</th>
                <th>GPA</th>
                <th>Grade</th>
                <th>Remark</th>
            </thead>
            <tbody>
            <?php
                $sql="SELECT *FROM ref_table,ref2_table,subjects,gpa_marks,std_info WHERE ref_table.sn=$getID AND ref2_table.ref_id=ref_table.sn AND ref2_table.sub_id=subjects.sub_sn AND std_info.std_ids=gpa_marks.std_ids AND subjects.sub_sn=gpa_marks.sub_sn" ;
                $result=mysqli_query($conn,$sql);
                if($result){
                $sn=1;
                $total="";
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td class="sn txt-center" ><?php echo $sn ?></td>
                        <td class="subject"><?php echo $row['subject']  ?></td>
                        <td class="gpa txt-center"><?php echo $row['gpa']  ?></td>
                        <td class="grade txt-center">
                        <?php   
                            if($row['gpa']==4){
                                echo "A+<br>";
                            }elseif($row['gpa']<4 && $row['gpa']>3.7){
                                echo "A<br>";
                            }
                            elseif($row['gpa']<=3.7 && $row['gpa']>3.3){
                                echo "A-<br>";
                            }
                            elseif($row['gpa']<=3.3 && $row['gpa']>3.0){
                                echo "B+<br>";
                            }
                            elseif($row['gpa']<4 && $row['gpa']>2.7){
                                echo "B<br>";
                            }
                            elseif($row['gpa']<4 && $row['gpa']>2.3){
                                echo "B-<br>";
                            }
                            elseif($row['gpa']<4 && $row['gpa']>2.0){
                                echo "C+<br>";
                            }
                            ?>
                        </td>
                        <td class="remark txt-center">
                        <?php   
                            if($row['gpa']==4){
                                echo "Excellent";
                            }elseif($row['gpa']<4 && $row['gpa']>3.7){
                                echo "Very good";
                            }
                            elseif($row['gpa']<=3.7 && $row['gpa']>3.3){
                                echo "Good";
                            }
                            elseif($row['gpa']<=3.3 && $row['gpa']>3.0){
                                echo "Very nice";
                            }
                            elseif($row['gpa']<4 && $row['gpa']>2.7){
                                echo "Apperciatable";
                            }
                            elseif($row['gpa']<4 && $row['gpa']>2.3){
                                echo "Satisfactory";
                            }
                            elseif($row['gpa']<4 && $row['gpa']>2.0){
                                echo "Need improvement";
                            }
                            ?>
                        </td>
                    </tr> 
                <?php
                 $sn++;
                 $total=(float)$total+(float)$row['gpa'];
                }
                }
                ?> 
            </tbody>
            <tfoot>
                <th colspan="4" class="cgpa">CGPA</th>
                <th >
                    <?php $CGPA=(float)$total/2; echo number_format($CGPA,2); ?>
                </th>
            </tfoot>
        </table>
    </body>
    <br>

    <!-- Result decision here -->
    <footer class=".footer">
        <?php 
        if($CGPA!=""){
            echo "You Are Passed!!!";
        }else{
            echo "You Are Failed";
        }
        ?>
        <br>
        <form action="" method="post">
            <button class="btn-close" name="btn-close">Exit</button>
        </form>
            
    </footer>
    </section>

    </html>