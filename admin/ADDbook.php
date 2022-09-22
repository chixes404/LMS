<?php  include "Db.php"; ?>
<?php
session_start();
if((!isset($_SESSION['admin'])))
{
  header("location:login.php");
  exit();
}

if(isset($_POST['submit']))
{ 
    
          $book_code= filter_var($_POST['number'],FILTER_SANITIZE_STRING);
          $image= $_POST['image'];
          $title= filter_var($_POST['title'],FILTER_SANITIZE_STRING);
          $author= (filter_var($_POST['author'],FILTER_SANITIZE_STRING));
          $edition= $_POST['edition'];
          $error=[];
         
         
          if(empty($book_code))
          {
            $error[]="code required"; 
          }
         
          $check_existance="SELECT number FROM books where number ='$book_code'";
          $rresult=mysqli_query($conn,$check_existance);
          $BookId=mysqli_fetch_assoc($rresult);
          if($BookId)
          {
            $error[]="code already exist";
           }



           if(empty($title))
          {
            $error[]="title required"; 
          }
         
          $check_exxistance="SELECT book_title FROM books where book_title ='$title'";
          $result=mysqli_query($conn,$check_exxistance);
          $BookName=mysqli_fetch_assoc($result);
          if($BookName)
          {
            $error[]="title already exist";
           }



           if(empty($author))
          {
            $error[]="author_name required"; 
          }
         
          $check_exxxistance="SELECT book_title FROM books where author ='$author'";
          $resullt=mysqli_query($conn,$check_exxxistance);
          $BookName=mysqli_fetch_assoc($resullt);
        
         
          if(empty($error)){

      
        $query = "INSERT into books(number,book_title,author,edition_date,image) values('$book_code','$title','$author','$edition','$image')";
        $result = mysqli_query($conn,$query);
      if(!$result)
      {
        $error=" insertion failed ";
      }  
    }
    else { 
    var_dump($error);
    }
  }
    ?>

<!DOCTYPE HTML>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/add.css">
  </head>
<body>
<a href="logout.php"><strong> LogOut </strong> </a>
<a href="Manage_Book.php"><strong> Manage</strong> </a>
<a href="../user/index.php"><strong> Home </strong> </a>
<a href="upload.php"><strong>Upload_Image</strong></a>
<div class="clr"></div>
    <h1>New Book</h1>
    
   <div class="test">
   <form action="ADDbook.php" method="post">
      
      <table border="1" cellpadding="22" cellspacing="1">
          <tr>
          <td> Enter Book_code :</td>
          <td> <input type="text" name="number" size="60" class="input-bg"> </td>
          </tr>
          <tr>
          <td>
            Enter Image : 
          </td>
          <td> 
          <input type="text" name="image" size="60"  class="input-bg">
            </td>

</tr>
          <tr>
          <td> Enter Title :</td>
          <td> <input type="text" name="title" size="60" class="input-bg">  </td>
          </tr>
          <tr>
          <td> Enter Author :</td>
          <td> <input type="text" name="author" size="60" class="input-bg"> </td>
          </tr>
          <tr>
          <td> Enter Edition :</td>
          <td> <input type="date" name="edition" size="60" class="input-bg"> </td>
          </tr>
          <tr>
          <td colspan="2" style="text-align : center" >
          <button type="submit" name ="submit" class="btn" >Submit</button>
          </td>
          </tr>
      </table>
     
  </form>
   </div>
</body>
</html>




