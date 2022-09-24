<?php include "../admin/Db.php";?>
<?php 
$ID=$_GET['id'];
 if($ID)
 {

    
       $query = "SELECT * FROM books where id ='$ID'"; //search with a book name in the table book_info
       $result = mysqli_query($conn,$query);
       if($result)
       {
        ?>
        <html>
          <head>
            <title> list books</title>
            <link rel="stylesheet" type="text/css" href="CSS/view.css">
          </head>
        <body bgcolor="">
        <strong><a href="../user/index.php">HOME</a></strong>
        <strong><a href="../admin/login.php">ADMIN</a></strong>
        <div class="clr"></div>
        <h1><center>Book Details</center></h1> 
<!--  in video i replaced book details with manage book  -->
       
        
        <table border="2"  class="center"  style="text-align : center"  cellpadding="40" cellspacing="1">
          <thead>
            <tr>
                <th>Id</th>  
                <th>Book_Code</th>
                <th>Book_Title</th>
                <th>Author</th>
                <th>Edition_Date</th>
                
        
             </tr>
            </thead>
            <?php
        while($row = mysqli_fetch_assoc($result)) { //<php echo $row == < ?= $row
        ?>
                <tr>
                      <td> <?= $row['id']?></td> 
                      <td> <?= $row['number']?></td> 
                      <td> <?= $row['book_title']?></td>
                      <td> <?= $row['author']?></td>
                      <td> <?= $row['edition_date']?></td>
        </tr>
         
        <?php
         }
        ?>    
        </tbody>
        
        
          </table>
         </body>
        </html>
       <?php 

    }

 }

?>





