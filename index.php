  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Robot</title>
</head>
<?php 
$conn = mysqli_connect("localhost","root","","robot");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['submit'])){
	$sql="UPDATE  navigations set right_value='$_POST[right_value]', left_value='$_POST[left_value]', top_value='$_POST[top_value]', bottom_value='$_POST[bottom_value]' where id=1";
	mysqli_query($conn, $sql);

}

?>
<body>
   <center> <!-- <img src="top-banner.png" /> -->
    <div style="background:#F1F0FE; width:60%; margin:0 auto;">
        <form method="post" action="">
           <table width="100%" border="0" cellpadding="0" cellspacing="5">
              <tr>
                <td width="20%">Right</td>
                <td><input type="text" name="right_value" /></td>
              </tr>
              <tr>
                <td>Left</td>
                <td> <input type="text" name="left_value" /></td>
              </tr>
              <tr>
                <td>Top</td>
                <td><input type="text" name="top_value" /></td>
              </tr>
              <tr>
                <td>Bottom</td>
                <td><input type="text" name="bottom_value" /></td>
              </tr>
              <tr>
                <td colspan="2"> <input type="submit" name="submit" value="Save"  style="background:#A6BBF0; border:0px; color:#fff; padding:4px;" /></td>
              </tr>
            </table>
        </form>
        
                  <?php
    $sql_record = "select * from navigations where id='1' LIMIT 1";
    $retval_record= mysqli_query($conn,$sql_record);
    if(! $retval_record )
    {
    die('Could not get data: ' . mysqli_error($conn));
    }
    while($row= mysqli_fetch_array($retval_record))
    { ?>
        <table width="20%" border="1" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%">Right</td>
                <td><?php echo $row['right_value']; ?></td>
              </tr>
              <tr>
                <td>Left</td>
                <td><?php echo $row['left_value']; ?></td>
              </tr>
              <tr>
                <td>Top</td>
                <td><?php echo $row['top_value']; ?></td>
              </tr>
              <tr>
                <td>Bottom</td>
                <td><?php echo $row['bottom_value']; ?></td>
              </tr>
              
            </table>
        <?php } ?>
    </div>
    <br />
    <br />
    <br />
    	<a href="control.php" style="background:#006; padding:10px; color:#fff; ">Robot Control</a>
    </center>

</body>
</html>
