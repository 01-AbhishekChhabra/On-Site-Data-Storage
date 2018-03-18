<?php

include_once 'UserSign.php';

if(isset($_SESSION['userData']))
{
  ;
}
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

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
  
    
    <div><?php echo $output; ?></div>

    <div><br><br><br><h4><center><a href="alogin.php">Admin Login</a></center></h4></div>

</body>
</html>
