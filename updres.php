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
  <form action="updres.php" method="get">
    <h1>Update Details</h1>
	<table>
    <tr>
      <td>Student ID</td>
      <td>
      <input type="text" name="xid" required="required" placeholder="Student ID" autofocus required></input>
      </td>
    </tr>
    <tr>
      <td>Subject ID</td>
      <td>
      <input type="text" name="yid" required="required" placeholder="Subject ID" autofocus required></input>
      </td>
    </tr>
    <tr>
      <td>Marks</td>
      <td>
      <input type="text" name="marks" required="required" placeholder="Marks" autofocus required></input>
      </td>
    </tr>
    </table>
    <div class="button-panel">
		<input type="submit" class="button" title="Get Report" yid="submit" value="Update"></input><br>
    </div>
  </form>
</div>

</body>
</html>
<?php
$xid=$_GET['xid'];
$yid=$_GET['yid'];
$marks=$_GET['marks'];
$con = mysqli_connect("localhost","root","","srms");
$sql = "UPDATE marks SET Marks=? WHERE StudentID=?";
$query = $con->prepare($sql);
$query->bind_param("ds", $marks, $xid);
$result=$query->execute();
if($result){
}
else{
    echo "---------------------------------------------------------------Something went wrong";
}
$con->close();
?>