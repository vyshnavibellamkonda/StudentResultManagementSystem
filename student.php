<?php session_start(); 
error_reporting(0);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="form-wrapper">
  <form action="report.php" method="get">
    <h1>Student Details</h1>
	  <table>
    <tr>
      <td>Student ID</td>
      <td>
      <input type="text" name="id" required="required" placeholder="StudentID" autofocus required></input>
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
    <tr>
      <td>Subject Name</td>
      <td>
      <input type="text" name="subject" required="required" placeholder="Subject Name" autofocus required></input>
      </td>
    </tr>
    </table>
    <div class="button-panel">
		<input type="submit" class="button" title="Get Report" name="submit" value="Get Report"></input><br>
    </div>
  </form>
</div>
</body>
</html>