<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
session_start();
include("Head.php");


include("../Asset/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$uname=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	
	$upQry1="update tbl_user set  user_name='".$uname."', user_contact='".$contact."', user_email='".$email."' where user_id='".$_SESSION["uid"]."'";

		if($con->query($upQry1))
		{
			header("location:DashBoard.php");
		}
	
}
		

$selQry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc();

?>

<body>
<div id="tab" align="center"> 
<form id="form1" name="form1" method="post" action=""> 
<table  border="1" style="border-collapse:collapse">
    <tr>
      <td>NAME</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"  value=<?php echo $data["user_name"]?> required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td>CONTACT</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value=<?php echo $data["user_contact"]?> required="required" autocomplete="off" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9" /></td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" value=<?php echo $data["user_email"]?> required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="SAVE" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>