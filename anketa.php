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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*else{
    echo "<div>Connected!</div>";
}*/
$answer = $_GET['club'];  
if($answer == "man" || $answer == "che" || $answer == "liv" || $answer == "ars" || $answer == "mci" || $answer == "tot") {          
    if(isset($_GET['terms'])){
        if($_GET['club']=='man'){
            $man_vote = "update records set man='1'";
            if($conn->query($man_vote) === TRUE){
                echo "<label><b>You have successfully voted for Manchester United!</b></label><br>(Results table)<a href='anketa.html'><br>Back to previous page</a>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='che'){
            $che_vote = "update records set che='1'";
            if($conn->query($che_vote) === TRUE){
                echo "<label><b>You have successfully voted for Chelsea!</b></label><br>(Results table)<a href='anketa.html'><br>Back to previous page</a>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='liv'){
            $liv_vote = "update records set liv='1'";
            if($conn->query($liv_vote) === TRUE){
                echo "<label><b>You have successfully voted for Liverpool!</b></label><br>(Results table)<a href='anketa.html'><br>Back to previous page</a>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='ars'){
            $ars_vote = "update records set ars='1'";
            if($conn->query($ars_vote) === TRUE){
                echo "<label><b>You have successfully voted for Arsenal!</b></label><br>(Results table)<a href='anketa.html'><br>Back to previous page</a>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='mci'){
            $mci_vote = "update records set mci='1'";
            if($conn->query($mci_vote) === TRUE){
                echo "<label><b>You have successfully voted for Manchester City!</b></label><br>(Results table)<a href='anketa.html'><br>Back to previous page</a>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }if($_GET['club']=='tot'){
            $tot_vote = "update records set tot='1'";
            if($conn->query($tot_vote) === TRUE){
                echo "<label><b>You have successfully voted for Tottenham!</b></label><br>(Results table)<a href='anketa.html'><br>Back to previous page</a>";
            }else{
                echo "<label>There was some problem with vote!</label><br><a href='anketa.html'><br>Back to previous page</a>";
            }
        }
        /*$see_results = "select * from records;
        if($conn->query($see_results) === TRUE){
             //some displaying of current survey results
        }else{
            echo "<label>There was some problem with displaying of current results!</label><br><a href='anketa.html'><br>Back to previous page</a>";
        }*/
    }
    else{
        echo "<label>You must agree with terms and conditions!</label><a href='anketa.html'><br>Back to previous page</a>";
    }
}
else{
    echo "<label>You have to choose one option!</label><a href='anketa.html'><br>Back to previous page</a>";
}       
?>
</body>
</html>