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
    <a href="classes.php">Add and Update Class</a>
    <a href="addstu.php">Add and Update Students</a>
    <a href="addsub.php">Add and Update Subjects</a>
    <a href="result.php">Add and Update Result</a>
    <a href="comb.php">Add and Update Combinations</a>
    <a href="logout.php" style="color: #fff;">LOGOUT</a>
    </div>
</body>
</html>