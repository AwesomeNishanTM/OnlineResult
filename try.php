<?php

include 'db_connection.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // $sql="SELECT *FROM std_info WHERE std_ids='1'";
    // $result=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($result);
    // echo $row['std_name'];

    // $sql="SELECT *FROM std_info,faculty_list WHERE std_ids='1' AND std_faculty=f_id";
    // $result=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($result);
    // echo $row['std_name'].'<br>'; 
    // echo $row['faculty'];

//     $sql="SELECT *FROM ref_table,ref2_table,subjects,gpa_marks,std_info WHERE ref_table.sn='1' AND ref2_table.ref_id=ref_table.sn AND ref2_table.sub_id=subjects.sub_sn AND std_info.std_ids=gpa_marks.std_ids AND subjects.sub_sn=gpa_marks.sub_sn" ;
//     $result=mysqli_query($conn,$sql);
//     $sn=1;
//     while($row=mysqli_fetch_assoc($result)){
//         echo $row['subject'].'=';
//         if($row['gpa']==4){
//             echo "A+"."<br>";
//         }elseif($row['gpa']<4 && $row['gpa']>3.7){
//             echo "A"."<br>";
//         }
//         elseif($row['gpa']<=3.7 && $row['gpa']>3.3){
//             echo "A-"."<br>";
//         }
//         elseif($row['gpa']<=3.3 && $row['gpa']>3.0){
//             echo "B+"."<br>";
//         }
//         elseif($row['gpa']<4 && $row['gpa']>2.7){
//             echo "B"."<br>";
//         }
//         elseif($row['gpa']<4 && $row['gpa']>2.3){
//             echo "B-"."<br>";
//         }
//         elseif($row['gpa']<4 && $row['gpa']>2.0){
//             echo "C+"."<br>";
//         }
//         $sn++;
        
//     }
    


            // $sql="SELECT *FROM `subjects`";
            // $result=mysqli_query($conn,$sql);
            // if($result){
            //     $sn=1;
            //     while($row=mysqli_fetch_assoc($result)){
            //         echo '<tr>
            //         <td>'.$sn.'</td>
            //         <td>'.$row["subject"].'</td>      
            //         </tr>';
            //         $sn++;               
            //     }          
            // }      
    ?>

<table>
    <?php
        $sql="SELECT *FROM ref_table,ref2_table,subjects,gpa_marks,std_info WHERE ref_table.sn='1' AND ref2_table.ref_id=ref_table.sn AND ref2_table.sub_id=subjects.sub_sn AND std_info.std_ids=gpa_marks.std_ids AND subjects.sub_sn=gpa_marks.sub_sn" ;
        $result=mysqli_query($conn,$sql);
        if($result){
            $sn=1;
            while($row=mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $sn ?></td>
                    <td><?php  echo $row['subject']  ?></td>
                    <td><?php  echo $row['gpa']  ?></td>
                    <td>
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
                    <td>
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
        }
    }
    ?> 

</table>




    </table>
</body>

</html>