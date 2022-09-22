<?php include "Db.php"; ?>
<?php
 session_start();
 if(isset($_POST['login']))
 {
     //sanitization
 $username=mysqli_real_escape_string($conn,$_POST['name']);
 $password= filter_var($_POST['pass'],FILTER_SANITIZE_STRING);

 //validation
 
$error=[];

 if(empty($username))
 {
     $error[]="username is required";
 }

 if(empty($password))
 {
     $error[]="password required";
 }
 
 if(empty($error))
 {

 
 // check if username and password is existed in DB 
 $check_existance="SELECT * FROM users where name ='$username' and password ='$password'";
 $result=mysqli_query($conn,$check_existance);
 $userinfo=mysqli_fetch_assoc($result);
  if(!$userinfo)
  {
    echo '<script language="javascript">';
echo 'alert("invalid information")';
echo '</script>';   
    //$error[]= "";
     }
 else {
    $_SESSION['admin']=$username;
header("location:Manage_Book.php");
 } 
 } 
} 

?>


<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login Page</title>
</head>
 
<body>
<!-- <a href ="https://github.com/chixes404"><strong>Github</strong></a>
<a href="../user/index.php" class="link" ><strong> HOME </strong> </a> -->
<div class="clr"></div>
<center><h1> Admin Panel </h1></center>

<form action="login.php" method="post">
    <?php  
if (isset($error))
{
  if(!empty($error))
 {
   foreach($error as $err)
   {

    echo $err ."<br>"."<br>";
    }

  }


 }

?>


<div class="login-box">
            <h1>Admin </h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username"
                         name="name" value="">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="pass" value="">
            </div>
 
            <input class="button" type="submit"
                     name="login" value="Sign In">
        </div>
    </form>
   
</body>
 
</html>