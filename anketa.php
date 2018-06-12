<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey</title>
    <meta charset="utf-8"></meta>
</head>
<body>
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "survey";
$conn = new mysqli($servername, $username, $password, $database);
$see_results = $conn->query("select * from records");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$count=0;
/*else{
    echo "<div>Connected!</div>";
}*/
$answer = $_GET['club'];  
if($answer == "man" || $answer == "che" || $answer == "liv" || $answer == "ars" || $answer == "mci" || $answer == "tot") {          
    if(isset($_GET['terms'])){
        if($_GET['club']=='man'){
            while($row=$see_results->fetch_assoc()){
                $man=$row['Votes'];
                $man_name=$row['FullName'];
                $man+=1;
                $count++;
                if($count==1){
                    break;
                }
            }
            $man_vote = "update records set votes=".$man." where abbr='MAN'";
            if($conn->query($man_vote) === TRUE){
                echo "<label><b>You have successfully voted for ".$man_name."!</b></label><br><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='che'){
            while($row=$see_results->fetch_assoc()){
                $che=$row['Votes'];
                $che_name=$row['FullName'];
                $che+=1;
                $count++;
                if($count==2){
                    break;
                }
            }
            $che_vote = "update records set votes=".$che." where abbr='CHE'";
            if($conn->query($che_vote) === TRUE){
                echo "<label><b>You have successfully voted for ".$che_name."!</b></label><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='liv'){
            while($row=$see_results->fetch_assoc()){
                $liv=$row['Votes'];
                $liv_name=$row['FullName'];
                $liv+=1;
                $count++;
                if($count==3){
                    break;
                }
            }
            $liv_vote = "update records set votes=".$liv." where abbr='LIV'";
            if($conn->query($liv_vote) === TRUE){
                echo "<label><b>You have successfully voted for ".$liv_name."!</b></label><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='ars'){
            while($row=$see_results->fetch_assoc()){
                $ars=$row['Votes'];
                $ars_name=$row['FullName'];
                $ars+=1;
                $count++;
                if($count==4){
                    break;
                }
            }
            $ars_vote = "update records set votes=".$ars." where abbr='ARS'";
            if($conn->query($ars_vote) === TRUE){
                echo "<label><b>You have successfully voted for ".$ars_name."!</b></label><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='mci'){
            while($row=$see_results->fetch_assoc()){
                $mci=$row['Votes'];
                $mci_name=$row['FullName'];
                $mci+=1;
                $count++;
                if($count==5){
                    break;
                }
            }
            $mci_vote = "update records set votes=".$mci." where abbr='MCI'";
            if($conn->query($mci_vote) === TRUE){
                echo "<label><b>You have successfully voted for ".$mci_name."!</b></label><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='tot'){
            while($row=$see_results->fetch_assoc()){
                $tot=$row['Votes'];
                $tot_name=$row['FullName'];
                $tot+=1;
                $count++;
                if($count==6){
                    break;
                }
            }
            $tot_vote = "update records set votes=".$tot." where abbr='TOT'";
            if($conn->query($tot_vote) === TRUE){
                echo "<label><b>You have successfully voted for ".$tot_name."!</b></label><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><br>";
            }
        }
        $see_results = $conn->query("select * from records");
        /*if($conn->query($see_results) === TRUE){
            echo "";
        }else{
            echo "<label>There was some problem with displaying of current results!</label><br><a href='anketa.html'><br>Back to previous page</a>";
        }*/

        while($row=$see_results->fetch_assoc()){
            print $row['FullName'].": ".$row['Votes']."<br>";
        }
        /*while($row=$see_clubs->fetch_assoc()){
            print $row['Name'].": ".$man."<br>";
        }*/
        echo "<br><a href='anketa.html'>Back to previous page</a>";
    }
    else{
        echo "<div id='main'>You must agree with terms and conditions!</div><a href='anketa.html'><br>Back to previous page</a>";
    }
}
else{
    echo "<div id='main'>You have to choose one option!</label><a href='anketa.html'><br>Back to previous page</a></div>";
}       
?>
</body>
<!--<style>
    #send_btn,#res_btn{
        width: 85px;
        height: 25px;
        font-size: 15px;
        font-weight: bold;
    }
    #main{
        position: absolute;
        width: 300px;
        height: 200px;
        z-index: 15;
        top: 30%;
        left: 50%;
        margin: -100px 0 0 -150px;
    }
</style>-->
</html>