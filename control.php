<html>
<head>
<title></title>
<?php 
$conn = mysqli_connect("localhost","root","","robot");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
   <?php
    $sql_record = "select * from navigations where id='1' LIMIT 1";
    $retval_record= mysqli_query($conn,$sql_record);
    if(! $retval_record )
    {
    die('Could not get data: ' . mysqli_error($conn));
    }
    while($row= mysqli_fetch_array($retval_record))
    { 
		$right_value=$row['right_value'];
		$left_value=$row['left_value'];
		$top_value=$row['top_value'];
		$bottom_value=$row['bottom_value'];
	}
	?>
<script language='JavaScript' type='text/JavaScript'>
<!--
function move_img(str) {
var step_down=<?php echo $bottom_value ?>; // change this to different step value
switch(str){
case "down":
var x=document.getElementById('i1').offsetTop;
x= x + step_down;
document.getElementById('i1').style.top= x + "px";
break;

case "up":
var top_step=<?php echo $top_value ?>;  // change this to different step value
var x=document.getElementById('i1').offsetTop;
x= x -top_step;
document.getElementById('i1').style.top= x + "px";
break;

case "left":
var left_step=<?php echo $left_value ?>;  // change this to different step value
var y=document.getElementById('i1').offsetLeft;
y= y - left_step;
document.getElementById('i1').style.left= y + "px";
break;

case "right":
var right_step=<?php echo $right_value ?>;  // change this to different step value
var y=document.getElementById('i1').offsetLeft;
y= y + right_step;
document.getElementById('i1').style.left= y + "px";
break;
}
}
//-->
</script>
</head>
<body>
<img src="robot.png" id='i1' style="position:absolute; left: 45%; top: 100;">
<br><br><br><br>
<center>
<div style="margin-top:20%;">
    <input type="button" onClick="move_img('up')" value='Up' style="padding:5px 50px;">
    <br>
    <input type="button" onClick="move_img('left')" value='Left' style="padding:5px 50px;">
    <input type="button" onClick="move_img('right')" value='right' style="padding:5px 50px;">
    <br>
    <input type="button" onClick="move_img('down')" value='down' style="padding:5px 50px;">
</div>
</center>
</body>
</html>