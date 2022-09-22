<?php include "Db.php"; ?>
<?php
session_start();
if((!isset($_SESSION['admin'])))
{
  header("location:login.php");
  exit();
}

//select all books
$query ="SELECT * FROM books ";
$result= mysqli_query($conn,$query);
?>
<html>
  <head>
    <title> list books</title>
    <link rel="stylesheet" type="text/css" href="CSS/manage.css">
   
  </head>
<body bgcolor="">
<h3><ins > Welcome Admin </ins></h3>
<a href="../user/index.php"><strong>Home</a></strong>
<a href="logout.php"><strong>Logout</a></strong></a>
<a href="ADDbook.php"><strong>ADD Book</a></strong></a>
<div class="clr"></div>
<h1><center>Manage Books</center></h1>

<br>



<table border="2"  class="center"  style="text-align : center"  cellpadding="20" cellspacing="1">
  <thead>
    <tr>
        <th>Id</th>
        <th>Image </th>  
        <th>Book_Code</th>
		    <th>Book_Title</th>
        <th>Author</th>
        <th>Edition_Date</th>
        <th>Action</th>

     </tr>
    </thead>
    <?php
while($row = mysqli_fetch_assoc($result)) { //<php echo $row == < ?= $row
?>
        <tr>
              <td> <?= $row['id']?></td> 
              <td><img src="upload_img/<?= $row['image']?>" height="80" width="100"></td> 
               
              <td> <?= $row['number']?></td> 
              <td> <?= $row['book_title']?></td>
              <td> <?= $row['author']?></td>
              <td> <?= $row['edition_date']?></td>
              <td> <a href = "Editbook.php?id=<?= $row['id']?>&image=<?= $row['image']?>&number=<?= $row['number']?>&book_title=<?= $row['book_title']?>&author=<?= $row['author']?>   " class="btn" >EDIT</a> <a href= "DeleteBook.php?id= <?=$row['id']?>&number=<?= $row['number']?>" class="btn" >REMOVE</a></td> <tr>
 
<?php
 }
?>    
</tbody>
<tfoot> 
<tr>
 <td colspan="7" style="text-align : center"> number of books : <?=  mysqli_num_rows( $result)?> </td>
 
</tr>
   </tfoot>
  </table>
 </body>
</html>

