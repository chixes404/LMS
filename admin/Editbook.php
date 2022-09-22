<?php include "Db.php" ;?>
 
<?php 
session_start();
if((!isset($_SESSION['admin'])))
{
  header("location:login.php");
  exit();
}

if(isset($_POST["submit"])){
    $book_code=$_POST["number"];
    $image=$_POST['image'];
    $title=$_POST["title"];
    $author=$_POST["author"];
    $edition=$_POST["edition"];
    $id=$_POST["id"];

   $query="UPDATE books SET id = '$id', number ='$book_code', image='$image' , book_title='$title', author ='$author' , edition_date='$edition' WHERE id='$id'"; 
   $query_conn=mysqli_query($conn,$query);
     if(!$query_conn)
     {
       echo "update failed";
     }

}
?>



<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="CSS/add.css">
  </head>

<body>
  <a href="Manage_Book.php"><strong>Books</strong></a>
  <a href="../user/index.php"><strong>Home</strong></a>
  <div class="clr"></div>
    <center><h1>EDIT BOOK </h1></center>
    
  
   <form action="Editbook.php" method="post">
 
 <table border="1" align="center" cellpadding="20" cellspacing="1">
 <tr>
     <td> Enter Book_Code :</td>
     <td> <input type="text" name="number" size="60" value="<?php if(isset($_GET["number"])){echo $_GET["number"];} ?>" class="input-bg"> </td>
     </tr>
     <tr>
   <td>
     Enter Image : 
   </td>
   <td> 
   <input type="text" name="image" size="60" value="<?php if(isset($_GET["image"])){echo $_GET["image"];} ?>"  class="input-bg">
     </td>
     </tr>
     <tr>
     <td> Enter Title :</td>
     <td> <input type="text" name="title" size="60" value="<?php if(isset($_GET["book_title"])){echo $_GET["book_title"];} ?> " class="input-bg">  </td>
     </tr>
     <tr>
     <td> Enter Author :</td>
     <td> <input type="text" name="author" size="60" value="<?php if(isset($_GET["author"])){echo $_GET["author"];} ?>" class="input-bg"> </td>
     </tr>
     <tr>
     <td> Enter Edition :</td>
     <td> <input type="date" name="edition" size="60" value="<?php if(isset($_GET["edition_date"])){echo $_GET["edition_date"];} ?>" class="input-bg"> </td>
     </tr>
     <tr>
       <td> Choose Book Id </td>
     <td >
     <select id="id" name="id" >
      
<?php 
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
?>
</select>
</td>

</tr>
     
     <tr>
     <td colspan="2" style="text-align : center"><button type="submit" name ="submit" class="btn"  >Submit</button> </td>
     </tr>
     </table>
</form>
  
</body>
</html>  