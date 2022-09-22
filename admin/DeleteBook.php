<?php include "Db.php" ;?>
 
<?php 
session_start();
if((!isset($_SESSION['admin'])))
{
  header("location:login.php");
  exit();
}
if(isset($_POST["submit"]))

{
    $book_code=$_POST["number"];
   
   $query="DELETE FROM books WHERE number='$book_code' ";
   $query_conn=mysqli_query($conn,$query);
     if(!$query_conn)
     {
       echo "delete  failed";
 
     }
    if(empty($book_code))
    {
      
      echo '<script language="javascript">';
echo 'alert("Please Enter Code")';
echo '</script>';     
    }
}
?>



<!DOCTYPE html>
<head>
    <title> delete book</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/ddelete.css">
</head>
<body>
<a href ="logout.php"><strong>LogOut</strong></a>
<a href ="Manage_Book.php"><strong>Manage</strong></a>

<div class="clr"></div>
<div class="test">
<div class="bg-box">
<h1>Delete book</h1>
<form action="DeleteBook.php" method="post">
<!-- <label> enter book_code</label> -->
<input type="text" name="number" class="enter" placeholder="enter book_code :" >
<br>
<br>
<?php 
/*
 $query="SELECT * FROM books" ;
 $query_conn=mysqli_query($conn,$query);
  if(!$query_conn)
  {
    echo "query failed".mysqli_error();
  }

  while  ($row=mysqli_fetch_assoc($query_conn ))
   {
    
    $id = $row['id'];

    echo"<option value='$id'>$id</option>";
    
   }
   */

?>
<input type="submit" name="submit" value="delete" class="btn">


</form>

 
</div>
</div>
</body>