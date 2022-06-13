<?php session_start(); 
error_reporting(0);
?>
<html>
<style>
.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}
.sidenav a:hover {
  color: #f1f1f1;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="sidenav">
    <a href="result.php">Add Subjects</a>
    <a href="updres.php">Update Subject Details</a>
</div>

<div class="form-wrapper">
  <form action="result.php" method="get">
    <h1>Add Details</h1>
	<table>
    <tr>
      <td>Subject ID</td>
      <td>
      <input type="text" name="yid" required="required" placeholder="Subject ID" autofocus required></input>
      </td>
    </tr>
    <tr>
      <td>Class ID</td>
      <td>
      <input type="text" name="cid" required="required" placeholder="Class ID" autofocus required></input>
      </td>
</tr>
    </table>
    <div class="button-panel">
		<input type="submit" class="button" title="Get Report" name="submit" value="Insert"></input><br>
    </div>
  </form>
</div>

</body>
</html>
<?php
$yid=$_GET['yid'];
$cid=$_GET['cid'];
$con = mysqli_connect("localhost","root","","srms");
$sql="INSERT INTO combination VALUES(?,?)";
$query = $con->prepare($sql);
$query->bind_param("ss", $yid, $cid);
$result=$query->execute();
if($result){
}
else{
    echo "---------------------------------------------------------------Something went wrong";
}
$con->close();
?>