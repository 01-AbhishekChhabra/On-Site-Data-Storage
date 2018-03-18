<?php


include_once 'gpConfig.php';
include_once 'User.php';
include_once 'UserSign.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>File Storage</title>
  <link rel="shortcut icon" href="images.png" type="image/png">

  <!-- Style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="style7771.css" />
  <link rel="stylesheet" type="text/css" href="main3.css">
  <link rel="stylesheet" type="text/css" href="about3.css" />
  <link rel="stylesheet" type="text/css" href="adminStyle.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <style type="text/css">
    
  h5
  {
    color:red;
  }

  </style>
</head>
<body>

  <div >
    <nav>
      <div >
        <a href="index3.html" class="brand-logo">
          <img src="images.png" alt="OnePlus">
        </a>
        <div class = "space">
        <ul >
          <li class="tab1"><a href="index3.html">About</a></li>
          <li class="tab1"><a href="upload3.php">Upload Files</a></li>
          <li class="tab1"><a href="sign.php">Sign In</a></li>
        </ul>
      </div>
      </div>
    </nav>
  </div>
  <div class="bdy">
    <div class="jumb">
      <div class="jumb-title font-aw" class="a1">FILE STORAGE DRIVE</div>
      </div>
    </div>

<div class="login-page">
  <div class="form">
    
    <form class="login-form" action="" method="post">
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password" />
      <button name="loginB" >Login</button>
      
    </form>
  </div>
</div>

<?php




if(isset($_POST['loginB']))
{
  $pwd = md5($_POST['password']);
  //creating connection
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="File_StorageDB";
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if($conn->connect_error)
  {
    echo $conn->connect_error;
  }
  else
    {
      $sql = "SELECT * FROM admin_details WHERE username = '".$_POST['username']."' AND password = '".$pwd."' ";
      $result = mysqli_query($conn,$sql);
      $id = $_POST['username'];
      if($row=$result->fetch_assoc())
      {
        $_SESSION['id']= $id; 
        header("Location: content.php");
      }
      else
        echo "<div><h5><center>Incorrect Username or Password</center></h5></div>";
    }

  $conn->close();

}

?>



</body>
</html>

