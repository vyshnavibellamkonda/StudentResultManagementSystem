<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="pdf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>
<style>
.center {
margin-left: auto;
margin-right: auto;
}
.centerx {
margin-left: auto;
margin-right: auto;
display: block;
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}
.btn:hover {
  background-color: RoyalBlue;
}
</style>
<body id="invoice">

    <div class="header">
    <div class="image"><img src="img/v.png" class="centerx" height="150px"></div><div class="header"></div></div>
    <button class="btn" id="download" style="margin-left:680px;"><i class="fa fa-download"></i> Download</button>

<?php
$id=$_GET['id'];
$branch=$_GET['branch'];
$subject=$_GET['subject'];
$year=$_GET['year'];
function get_result(\mysqli_stmt $statement)
{
    $result = array();
    $statement->store_result();
    for ($i = 0; $i < $statement->num_rows; $i++)
    {
        $metadata = $statement->result_metadata();
        $params = array();
        while ($field = $metadata->fetch_field())
        {
            $params[] = &$result[$i][$field->name];
        }
        call_user_func_array(array($statement, 'bind_result'), $params);
        $statement->fetch();
    }
    return $result;
}
$con = mysqli_connect("localhost","root","","srms");
$sql="SELECT t.StudentName, t.StudentID, t.ClassID, SUM(t.Marks) from
(SELECT sts.StudentName, sts.StudentID, sts.ClassID, tr.Marks from 
students as sts join marks as tr on tr.StudentID=sts.StudentID) as t
WHERE ClassID IN (SELECT ClassID FROM class WHERE BranchName=? and AcademicYear=?)
and StudentID=?";
$query = $con->prepare($sql);
$query->bind_param("sss", $branch, $year, $id);
$query->execute();
$result = get_result($query);
while ($row = array_shift($result)) {
?>
<table border="1" class="center">
  <tr>
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Class ID</th>
      <th>Total</th>
  </tr>
  <tr>
      <td><?php echo $row['StudentID'];?></td>
      <td><?php echo $row['StudentName'];?></td>
      <td><?php echo $row['ClassID'];?></td>
      <td><?php echo $row['SUM(t.Marks)'];?></td>
  </tr>
</table>
<?php
}
$sql="SELECT t.StudentName, t.StudentID, t.ClassID, t.Marks, t.SubjectID, subjects.SubjectName from 
((SELECT sts.StudentName, sts.StudentID, sts.ClassID, tr.Marks, tr.SubjectID from 
students as sts join marks as tr on tr.StudentID=sts.StudentID) as t
join subjects on subjects.SubjectID=t.SubjectID)  WHERE ClassID IN (SELECT ClassID FROM class WHERE BranchName=? and AcademicYear=?)
and StudentID=?";
$query = $con->prepare($sql);
$query->bind_param("sss", $branch, $year, $id);
$query->execute();
$result = get_result($query);
?>
<table border="1" class="center">
  <tr>
      <th>Subject Name</th>
      <th>Marks</th>
  </tr>
  <?php
while ($row = array_shift($result)) {
?>
  <tr>
      <td><?php echo $row['SubjectID'];?></td>
      <td><?php echo $row['Marks'];?></td>
  </tr>
<?php
}
?>
</table>
<?php
$con->close();
?>

</body>
</html>