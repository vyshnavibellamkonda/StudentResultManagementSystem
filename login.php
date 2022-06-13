<?php
error_reporting(0); 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="adminstyles.css">
</head>
<style>
input[type='password']{
    background: url("img/pass.jpg") no-repeat;
    background-color: #fff;
    background-position: 10px 50%;
}
input[type='text']{
    background: url("img/user.jpg") no-repeat;
    background-color: #fff;
    background-position: 10px 50%;
}
</style>
<div class="bg"></div>
<div class="form-wrapper" id="form-wrapper">
  <form action="login.php" method="post">
	  <h1>Admin Details</h1>
	  <table>
    <tr>
      <td>Admin user </td>
      <td>
      <input type="text" name="user" required="required" onfocus="this.value=''" style="wuserth:235px;"></input>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
      <input type="password" name="pass" required="required" onfocus="this.value=''" style="height:30px;wuserth:235px;font-size:12pt;"></input>
      </td>
    </tr>
    </table>
    <div class="button-panel">
		<input type="submit" class="button" title="login" name="submit" value="Login" style="wuserth:310px;"></input><br>
    </div>
  </form>
</div>
</body>
</html>
<?php
$id=$_POST['user'];
$pass=md5($_POST['pass']);
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
$sql="SELECT * FROM user WHERE UserName=?";
$query = $con->prepare($sql);
$query->bind_param("s",$id);
$query->execute();
$result = get_result($query);
while ($row = array_shift($result)) {
    if(md5($row['Passwords'])==$pass)
    {
      header('Location:admin.php');
    }
    else{
      header('Location:error.html');
    }
}
$con->close();
?>