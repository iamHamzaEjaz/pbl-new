<?php
include 'connection.php';

session_start();
 
if(empty($_SESSION["userName"]) || $_SESSION["userType"]!="Student")
{
  header('location:login.php');

}
include 'connection.php';

$userName=$_SESSION["userName"];
$userType=$_SESSION["userType"];
$userRoll=$_SESSION["userRoll"];
$sql = "SELECT s_course FROM student_course where s_roll='$userRoll'";
$result = $conn->query($sql);
$row1 = mysqli_fetch_array($result);
$s_id = $row1['s_course'];
$fetch = mysqli_query($conn , "SELECT * FROM survey WHERE survey_course = '$s_id'");
$row = mysqli_fetch_array($fetch);
$id=$_GET['survey_id'];
//$row['id'];
//$getSurveyId=$_GET['survey_id'];
$fetch1 = mysqli_query($conn , "SELECT * FROM survey_questions WHERE survey_id = '$id'");

?>

<html>
<head>
<title>PBL | Evaluation </title>

<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../bower_components/bootstrap/js/bootstrap.min.js"></script>

<style>
#qid {
  padding: 10px 15px;
  -moz-border-radius: 50px;
  -webkit-border-radius: 50px;
  border-radius: 20px;
}
label.btn {
    padding: 18px 60px;
    white-space: normal;
    -webkit-transform: scale(1.0);
    -moz-transform: scale(1.0);
    -o-transform: scale(1.0);
    -webkit-transition-duration: .3s;
    -moz-transition-duration: .3s;
    -o-transition-duration: .3s
}

label.btn:hover {
    text-shadow: 0 3px 2px rgba(0,0,0,0.4);
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -o-transform: scale(1.1)
}
label.btn-block {
    text-align: left;
    position: relative
}

label .btn-label {
    position: absolute;
    left: 0;
    top: 0;
    display: inline-block;
    padding: 0 10px;
    background: rgba(0,0,0,.15);
    height: 100%
}

label .glyphicon {
    top: 34%
}
.element-animation1 {
    animation: animationFrames ease .8s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease .8s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease .8s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation2 {
    animation: animationFrames ease 1s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation3 {
    animation: animationFrames ease 1.2s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1.2s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1.2s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
.element-animation4 {
    animation: animationFrames ease 1.4s;
    animation-iteration-count: 1;
    transform-origin: 50% 50%;
    -webkit-animation: animationFrames ease 1.4s;
    -webkit-animation-iteration-count: 1;
    -webkit-transform-origin: 50% 50%;
    -ms-animation: animationFrames ease 1.4s;
    -ms-animation-iteration-count: 1;
    -ms-transform-origin: 50% 50%
}
@keyframes animationFrames {
    0% {
        opacity: 0;
        transform: translate(-1500px,0px)
    }

    60% {
        opacity: 1;
        transform: translate(30px,0px)
    }

    80% {
        transform: translate(-10px,0px)
    }

    100% {
        opacity: 1;
        transform: translate(0px,0px)
    }
}

@-webkit-keyframes animationFrames {
    0% {
        opacity: 0;
        -webkit-transform: translate(-1500px,0px)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate(30px,0px)
    }

    80% {
        -webkit-transform: translate(-10px,0px)
    }

    100% {
        opacity: 1;
        -webkit-transform: translate(0px,0px)
    }
}

@-ms-keyframes animationFrames {
    0% {
        opacity: 0;
        -ms-transform: translate(-1500px,0px)
    }

    60% {
        opacity: 1;
        -ms-transform: translate(30px,0px)
    }
    80% {
        -ms-transform: translate(-10px,0px)
    }

    100% {
        opacity: 1;
        -ms-transform: translate(0px,0px)
    }
}

.modal-header {
    background-color: transparent;
    color: inherit
}

.modal-body {
    min-height: 205px
}
#loadbar {
    position: absolute;
    width: 62px;
    height: 77px;
    top: 2em
}
.blockG {
    position: absolute;
    background-color: #FFF;
    width: 10px;
    height: 24px;
    -moz-border-radius: 8px 8px 0 0;
    -moz-transform: scale(0.4);
    -moz-animation-name: fadeG;
    -moz-animation-duration: .8800000000000001s;
    -moz-animation-iteration-count: infinite;
    -moz-animation-direction: linear;
    -webkit-border-radius: 8px 8px 0 0;
    -webkit-transform: scale(0.4);
    -webkit-animation-name: fadeG;
    -webkit-animation-duration: .8800000000000001s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-direction: linear;
    -ms-border-radius: 8px 8px 0 0;
    -ms-transform: scale(0.4);
    -ms-animation-name: fadeG;
    -ms-animation-duration: .8800000000000001s;
    -ms-animation-iteration-count: infinite;
    -ms-animation-direction: linear;
    -o-border-radius: 8px 8px 0 0;
    -o-transform: scale(0.4);
    -o-animation-name: fadeG;
    -o-animation-duration: .8800000000000001s;
    -o-animation-iteration-count: infinite;
    -o-animation-direction: linear;
    border-radius: 8px 8px 0 0;
    transform: scale(0.4);
    animation-name: fadeG;
    animation-duration: .8800000000000001s;
    animation-iteration-count: infinite;
    animation-direction: linear
}
#rotateG_01 {
    left: 0;
    top: 28px;
    -moz-animation-delay: .33s;
    -moz-transform: rotate(-90deg);
    -webkit-animation-delay: .33s;
    -webkit-transform: rotate(-90deg);
    -ms-animation-delay: .33s;
    -ms-transform: rotate(-90deg);
    -o-animation-delay: .33s;
    -o-transform: rotate(-90deg);
    animation-delay: .33s;
    transform: rotate(-90deg)
}
#rotateG_02 {
    left: 8px;
    top: 10px;
    -moz-animation-delay: .44000000000000006s;
    -moz-transform: rotate(-45deg);
    -webkit-animation-delay: .44000000000000006s;
    -webkit-transform: rotate(-45deg);
    -ms-animation-delay: .44000000000000006s;
    -ms-transform: rotate(-45deg);
    -o-animation-delay: .44000000000000006s;
    -o-transform: rotate(-45deg);
    animation-delay: .44000000000000006s;
    transform: rotate(-45deg)
}
#rotateG_03 {
    left: 26px;
    top: 3px;
    -moz-animation-delay: .55s;
    -moz-transform: rotate(0deg);
    -webkit-animation-delay: .55s;
    -webkit-transform: rotate(0deg);
    -ms-animation-delay: .55s;
    -ms-transform: rotate(0deg);
    -o-animation-delay: .55s;
    -o-transform: rotate(0deg);
    animation-delay: .55s;
    transform: rotate(0deg)
}
#rotateG_04 {
    right: 8px;
    top: 10px;
    -moz-animation-delay: .66s;
    -moz-transform: rotate(45deg);
    -webkit-animation-delay: .66s;
    -webkit-transform: rotate(45deg);
    -ms-animation-delay: .66s;
    -ms-transform: rotate(45deg);
    -o-animation-delay: .66s;
    -o-transform: rotate(45deg);
    animation-delay: .66s;
    transform: rotate(45deg)
}
#rotateG_05 {
    right: 0;
    top: 28px;
    -moz-animation-delay: .7700000000000001s;
    -moz-transform: rotate(90deg);
    -webkit-animation-delay: .7700000000000001s;
    -webkit-transform: rotate(90deg);
    -ms-animation-delay: .7700000000000001s;
    -ms-transform: rotate(90deg);
    -o-animation-delay: .7700000000000001s;
    -o-transform: rotate(90deg);
    animation-delay: .7700000000000001s;
    transform: rotate(90deg)
}
#rotateG_06 {
    right: 8px;
    bottom: 7px;
    -moz-animation-delay: .8800000000000001s;
    -moz-transform: rotate(135deg);
    -webkit-animation-delay: .8800000000000001s;
    -webkit-transform: rotate(135deg);
    -ms-animation-delay: .8800000000000001s;
    -ms-transform: rotate(135deg);
    -o-animation-delay: .8800000000000001s;
    -o-transform: rotate(135deg);
    animation-delay: .8800000000000001s;
    transform: rotate(135deg)
}
#rotateG_07 {
    bottom: 0;
    left: 26px;
    -moz-animation-delay: .99s;
    -moz-transform: rotate(180deg);
    -webkit-animation-delay: .99s;
    -webkit-transform: rotate(180deg);
    -ms-animation-delay: .99s;
    -ms-transform: rotate(180deg);
    -o-animation-delay: .99s;
    -o-transform: rotate(180deg);
    animation-delay: .99s;
    transform: rotate(180deg)
}
#rotateG_08 {
    left: 8px;
    bottom: 7px;
    -moz-animation-delay: 1.1s;
    -moz-transform: rotate(-135deg);
    -webkit-animation-delay: 1.1s;
    -webkit-transform: rotate(-135deg);
    -ms-animation-delay: 1.1s;
    -ms-transform: rotate(-135deg);
    -o-animation-delay: 1.1s;
    -o-transform: rotate(-135deg);
    animation-delay: 1.1s;
    transform: rotate(-135deg)
}
@-moz-keyframes fadeG {
    0% {
        background-color: #000
    }

    100% {
        background-color: #FFF
    }
}

@-webkit-keyframes fadeG {
    0% {
        background-color: #000
    }

    100% {
        background-color: #FFF
    }
}

@-ms-keyframes fadeG {
    0% {
        background-color: #000
    }

    100% {
        background-color: #FFF
    }
}

@-o-keyframes fadeG {
    0% {
        background-color: #000
    }
    100% {
        background-color: #FFF
    }
}

@keyframes fadeG {
    0% {
        background-color: #000
    }

    100% {
        background-color: #FFF
    }
}

</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >

<div class="container-fluid bg-info">
    <div class="modal-dialog">
	<div class="modal-content">
 
           <div class="modal-header">
<div class= "row">

</div>
         
        </div>
		
		</div>
      <div class="modal-content">
 <div class="modal-header">
            <h3> ___Survey Form___
</h3>
        </div>
		
		<form action ="survey-form-studentDB.php" method="POST">
        <?php $i=0;
        $j=0;
        $k=0;
         while($row = mysqli_fetch_array($fetch1)) {
            $i++;
            ?>
           <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">


            <h5><span class="label label-info" id="qid"><?php echo $i; ?></span> <?php echo $row['question']; ?></h5>
          
        </div>  
         <center> 
		 
       <?php  $q_id=$row['id'];
       
         $toottip = mysqli_query($conn,"SELECT * FROM survey_ruberics WHERE ques_id = '$q_id'");
while($row2 = mysqli_fetch_array($toottip)){
    ++$j;
    ++$k;
?>
<input type="text" name="q_id[<?php echo $k; ?>]" value="<?php echo $q_id; ?>">
<input type="text" name="id" value="<?php echo $id; ?>">
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" padding:10px;">
           <label style="margin:10px;" class="element-animation1   btn-default  "> 1 <br> <input type="radio" name="q_answer[<?php echo $j; ?>]" title="<?php echo $row2['rub1']; ?>" value="0" style=" height:20px ; width:20px; " /></label>
           <label style="margin:10px;" class="element-animation1   btn-default  "> 2 <br> <input type="radio" name="q_answer[<?php echo $j; ?>]" value="1" title="<?php echo $row2['rub2']; ?>"  style=" height:20px ; width:20px; "  /></label>
           <label style="margin:10px;" class="element-animation2   btn-default  "> 3 <br> <input type="radio" name="q_answer[<?php echo $j; ?>]" value="2" title="<?php echo $row2['rub3']; ?>"  style=" height:20px ; width:20px; " /></label>
           <label style="margin:10px;" class="element-animation3   btn-default  "> 4 <br> <input type="radio" name="q_answer[<?php echo $j; ?>]" value="3"  title="<?php echo $row2['rub4']; ?>"  style=" height:20px ; width:20px; "  /></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br> <input type="radio" name="q_answer[<?php echo $j; ?>]" value="4"  title="<?php echo $row2['rub5']; ?>" style=" height:20px ; width:20px; "  /></label>

      	  </div>
	   </center> <?php } } ?>
       <!-- <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">1</span> <?php // echo $Q1 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">2</span> <?php //echo $Q2 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">3</span> <?php //echo $Q3 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">4</span> <?php //echo $Q4 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">5</span> <?php //echo $Q5 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">6</span> <?php //echo $Q6 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">7</span> <?php echo $Q7 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">8</span> <?php //echo $Q8 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">9</span> <?php //echo $Q9 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
       <div class="modal-header" style=" justify-content: flex-start; padding:12px; ">
            <h5><span class="label label-info" id="qid">10</span> <?php //echo $Q10 ; ?></h5>
        </div> 
         <center> 
		 
		 <div class="quiz" id="quiz" data-toggle="buttons" style=" ;padding:10px;">
           <label style="margin:10px;" class="element-animation1    btn-default  ">  0 <br>  <input  type="radio" name="q_answer" value="0" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation1    btn-default  ">   1 <br> <input type="radio" name="q_answer" value="1" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation2   btn-default  ">   2 <br>  <input type="radio" name="q_answer" value="2" style=" height:20px ; width:20px; " required/></label>
           <label style="margin:10px;" class="element-animation3   btn-default  ">  3 <br> <input type="radio" name="q_answer" value="3" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 4 <br>  <input type="radio" name="q_answer" value="4" style=" height:20px ; width:20px; "  required/></label>
           <label style="margin:10px;" class="element-animation4   btn-default  "> 5 <br>  <input type="radio" name="q_answer" value="5" style=" height:20px ; width:20px; " required /></label>
      	  </div>
	   </center>
  -->

<div class="modal-header" style=" justify-content: flex-end; padding:12px; ">

   <button  type="submit" class="btn btn-success">Submit</button>
&nbsp;
 &nbsp;
 &nbsp;
 &nbsp;
 &nbsp;
 &nbsp;
         </div> 
       
</form>
     
</div>
</div>
</div>

</body>
<script>
$(function(){
    var loading = $('#loadbar').hide();
    $(document)
    .ajaxStart(function () {
        loading.show();
    }).ajaxStop(function () {
    	loading.hide();
    });
    
    $("label.btn").on('click',function () {
    	var choice = $(this).find('input:radio').val();
    	$('#loadbar').show();
    	$('#quiz').fadeOut();
    	setTimeout(function(){
           $( "#answer" ).html(  $(this).checking(choice) );      
            $('#quiz').show();
            $('#loadbar').fadeOut();
           /* something else */
    	}, 1500);
    });

    $ans = 3;

    $.fn.checking = function(ck) {
        if (ck != $ans)
            return 'INCORRECT';
        else 
            return 'CORRECT';
    }; 
});	

</script>
</html>