<?php include "../admin/Db.php"; ?>
<?php
//select all books
$query ="SELECT * FROM books ";
$result= mysqli_query($conn,$query);
?>
<html>
  <head>
    <title> list books</title>
    <link rel="stylesheet" type="text/css" href="CSS/AllBooks.css">
    
  </head>
<body>

<a href ="https://github.com/chixes404">Github</a>
<a href="index.php">Home</a>

<div class="clr"></div>
<h1><center> ALL BOOKS</center></h1>


<table border="2"  class="center"  style="text-align : center"  cellpadding="20" cellspacing="1">
  <thead>
    <tr>
        <th>Id</th>
        <th>Image </th>  
        <th>Book_Code</th>
		<th>Book_Title</th>
        <th>Author</th>
        <th>Edition</th>
     </tr>
    </thead>
    <?php
while($row = mysqli_fetch_assoc($result)) { //<php echo $row == < ?= $row
?>
        <tr>
              <td> <?= $row['id']?></td> 
              <td><img src="../admin/upload_img/<?= $row['image']?>" height="80" width="100"></td> 
               
              <td> <?= $row['number']?></td> 
              <td> <?= $row['book_title']?></td>
              <td> <?= $row['author']?></td>
              <td> <?= $row['edition_date']?></td>
              
 
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

