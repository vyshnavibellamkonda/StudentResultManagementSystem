<?php
error_reporting(0);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
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
<body>
<div class="sidenav">
    <a href="addstu.php">Add Students</a>
    <a href="updstu.php">Update Student Details</a>
</div>
<div class="form-wrapper">
  <form action="updstu.php" method="get">
    <h1>Update Details</h1>
	<table>
    <tr>
      <td>Student ID</td>
      <td>
      <input type="text" name="id" required="required" placeholder="Student ID" autofocus required></input>
      </td>
    </tr>
    <tr>
      <td>Student Name</td>
      <td>
      <input type="text" name="name" required="required" placeholder="Student Name" autofocus required></input>
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
		<input type="submit" class="button" title="Get Report" name="submit" value="Update"></input><br>
    </div>
  </form>
</div>

</body>
</html>

<?php
$id=$_GET['id'];
$name=$_GET['name'];
$cid=$_GET['cid'];
$con = mysqli_connect("localhost","root","","srms");
$sql = "UPDATE students SET StudentName=?, ClassID=? WHERE StudentID=?";
$stmt= $con->prepare($sql);
$stmt->bind_param("sss", $name, $cid, $id);
$result=$stmt->execute();
if($result){
}
else{
    echo "---------------------------------------------------------------Something went wrong";
}
$con->close();
?>