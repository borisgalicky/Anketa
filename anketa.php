<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey</title>
    <meta charset="utf-8"></meta>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;background-image">
<div id="main">
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
                echo "<br><div style='text-align:left;'><label class='succes_vote'><b>You have successfully voted for ".$man_name."!</b></label></div><br>";
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
                echo "<br><div style='text-align:left;'><label class='succes_vote'><b>You have successfully voted for ".$che_name."!</b></label></div><br>";
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
                echo "<br><div style='text-align:left;'><label class='succes_vote'><b>You have successfully voted for ".$liv_name."!</b></label></div><br>";
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
                echo "<br><div style='text-align:left;'><label class='succes_vote'><b>You have successfully voted for ".$ars_name."!</b></label></div><br>";
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
                echo "<br><div style='text-align:left;'><label class='succes_vote'><b>You have successfully voted for ".$mci_name."!</b></label></div><br>";
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
                echo "<br><div style='text-align:left;'><label class='succes_vote'><b>You have successfully voted for ".$tot_name."!</b></label></div><br>";
            }else{
                echo "<label>There was some problem with vote!</label><br><br>";
            }
        }
        //získava celkový počet hlasov od všetkých tímov
        $see_results = $conn->query("select * from records");
        $get_sum = $conn->query("select * from records");
        $vote_count=0;
        while($row=$get_sum->fetch_assoc()){
            $vote_count++;
            $vote=$row['Votes'];
            switch($vote_count){
                case 1: $vote_man=$vote;
                case 2: $vote_che=$vote;
                case 3: $vote_liv=$vote;
                case 4: $vote_ars=$vote;
                case 5: $vote_mci=$vote;
                case 6: $vote_tot=$vote;
            }
        }
        //robí výpis výsledkov (názov mužstva,počet bodov, percentá)
        $sum=$vote_man+$vote_che+$vote_liv+$vote_ars+$vote_mci+$vote_tot;
        $quantity=0;
        while($row=$see_results->fetch_assoc()){
            $fullname=$row['FullName'];
            $votes=$row['Votes'];
            $quantity++;
            switch($quantity){
                case 1: $man=$row['Votes']; 
                $man_part=round((($man/$sum)*100),2);
                $man_col=$man_part*2;
                print "<img src='http://pngimg.com/uploads/manchester_united/manchester_united_PNG22.png' width='13px' height='13px'> "
                .$fullname.": ".$votes." votes<br><div style='background-color:#770202; width:".$man_col."px; height: 12px; float:left;'></div>&nbsp<b>".$man_part."%</b>"."<br><br>";
                break;

                case 2: $che=$row['Votes']; 
                $che_part=round((($che/$sum)*100),2);
                $che_col=$che_part*2;
                print "<img src='http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4e1.png' width='13px' height='13px'> "
                .$fullname.": ".$votes." votes<br><div style='background-color:blue; width:".$che_col."px; height: 12px; float:left;'></div>&nbsp<b>".$che_part."%</b>"."<br><br>";
                break;

                case 3: $liv=$row['Votes'];
                $liv_part=round((($liv/$sum)*100),2);
                $liv_col=$liv_part*2;
                print "<img src='https://i.pinimg.com/originals/da/de/cf/dadecf2eb40502838cf7f789aab5a828.png' width='13px' height='13px'> "
                .$fullname.": ".$votes." votes<br><div style='background-color:#fc3559; width:".$liv_col."px; height: 12px; float:left;'></div>&nbsp<b>".$liv_part."%</b>"."<br><br>";
                break;

                case 4: $ars=$row['Votes'];
                $ars_part=round((($ars/$sum)*100),2);
                $ars_col=$ars_part*2;
                print "<img src='https://cdn.freebiesupply.com/logos/large/2x/arsenal-6-logo-png-transparent.png' width='13px' height='13px'> "
                .$fullname.": ".$votes." votes<br><div style='background-color:red; width:".$ars_col."px; height: 12px; float:left;'></div>&nbsp<b>".$ars_part."%</b>"."<br><br>";
                break;

                case 5: $mci=$row['Votes'];
                $mci_part=round((($mci/$sum)*100),2);
                $mci_col=$mci_part*2;
                print "<img src='https://s3.amazonaws.com/freebiesupply/large/2x/manchester-city-logo-png-transparent.png' width='13px' height='13px'> "
                .$fullname.": ".$votes." votes<br><div style='background-color:#7bcef2; width:".$mci_col."px; height: 12px; float:left;'></div>&nbsp<b>".$mci_part."%</b>"."<br><br>";
                break;

                case 6: $tot=$row['Votes'];
                $tot_part=round((($tot/$sum)*100),2);
                $tot_col=$tot_part*2;
                print "<img src='http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c4ee.png' width='13px' height='13px'> "
                .$fullname.": ".$votes." votes<br><div style='background-color:#054866; width:".$tot_col."px; height: 12px; float:left;'></div>&nbsp<b>".$tot_part."%</b>"."<br><br>";
                break;
            }
        }
        echo "<a href='anketa.html' style='color:black;'><label style='margin-left:20px; cursor: pointer;'>
        <b>Back to previous page</b></label></a>";
        
    }
    else{
        echo "<div id='error'><br>You must agree with terms and conditions!</div><br>
        <a href='anketa.html'><label style='color:black; cursor:pointer; margin-left:20px;'><b>Back to previous page</b></label></a>";
    }
}
else{
    echo "<div id='error'><label style='color:black; cursor:pointer;'>You have to choose one option!<br></label><a href='anketa.html'><br><label style='color:black; cursor:pointer;'><b>Back to previous page</b></label></a></div>";
}       
?>
</div>
</body>
<style>
    body{
        background-image: url("http://www.kinyu-z.net/data/wallpapers/224/1488378.jpg");
        background-size: cover;
        background-attachment: fixed;
    }
    #main{
        margin-right: 20px;
        border-color: black;
        border-radius: 15px;
        background-color: #d8e7ff;
        position: absolute;
        width: 350px;
        height: 435px;
        z-index: 15;
        top: 30%;
        left: 50%;
        margin: -100px 0 0 -150px;
    }
    img,div{
        margin-left:20px;
    }
    .succes_vote{
        text-align: left;
        float: center;
        display: inline;
    }
</style>
</html>