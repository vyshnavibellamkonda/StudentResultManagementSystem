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
    <a href="classes.php">Add Classes</a>
    <a href="clsupdate.php">Update Classes</a>
</div>

<div class="form-wrapper">
  <form action="classes.php" method="get">
    <h1>Add Details</h1>
	<table>
    <tr>
      <td>Class ID</td>
      <td>
      <input type="text" name="id" required="required" placeholder="Class ID" autofocus required></input>
      </td>
    </tr>
    <tr>
      <td>Branch Name</td>
      <td>
      <select name="branch">
      <option value="CSE">CSE</option>
      <option value="ECE">ECE</option>
      <option value="EEE">EEE</option>
      <option value="CIVIL">CIVIL</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>Academic Year</td>
      <td>
      <select name="year">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      </select>
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
$id=$_GET['id'];
$branch=$_GET['branch'];
$year=$_GET['year'];
$con = mysqli_connect("localhost","root","","srms");
$sql="INSERT INTO class(ClassID, BranchName, AcademicYear) VALUES(?,?,?)";
$query = $con->prepare($sql);
$query->bind_param("ssi", $id, $branch, $year);
$result=$query->execute();
if($result){
}
else{
    echo "---------------------------------------------------------------Something went wrong";
}
$con->close();
?>