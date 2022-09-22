<!DOCTYPE HTML>
<html>
    <head>

    <link rel="stylesheet" type="text/css" href="CSS/indexx.css">
    </head>
    <body> 
        <a href ="https://github.com/chixes404"><strong>Github</strong></a>
        <a href ="../admin/login.php"><strong>Admin</strong></a>
        <a href ="ALLBooks.php"><strong>All Books</strong></a>
        <div class="clr"></div>
        <h1>Simple Library Management System</h1>
       
        <div class="layer">
      <div class="box">
    <form action = "index.php" method="post">
       <h3>Enter Book Title</h3>
        <input type="text" name="search" size="80" class="input" >
        <br></br>
        <input type="submit" name ="submit" class="btn" >
        <input type="reset" value="Reset"  class="btn">
       
        <br>
        </form>
        </div>
        </div>
        <h2>Search Result :</h2>
        <div class="line"></div>
    </body>
</html>
<?php
    include "../admin/Db.php";
    ?>
    <?php 
    if(isset($_POST['submit']))
{

    $search = $_POST["search"];
    $search = mysqli_real_escape_string($conn,$search);
    $search = htmlspecialchars($search);

 if(!empty($search))
 {
    $query = "SELECT book_title,image,id FROM books where book_title like '%$search%'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        ?>
        <center>
        <table border="" cellpadding="20" cellspacing="2">
        
        <tr> 
        <th> Image </th>
        <th>Title </th>
        <th>Action</th>
    </tr>
        <?php while($row = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><center><img src="../admin/upload_img/<?= $row['image']?>" height="80" width="100"></td>  </center></td>
             <td><center><?php echo $row["book_title"];?></center> </td>
            <td><center><a href= "ViewDetails.php?id=<?php echo $row["id"];?>" class="details">View Details</a>
        </tr>
        <?php
        }
        ?>
        </table>
    </center>
        <?php
    }
   if(empty($result))
        {
        echo "No books found in the library by the name $search" ;
    }
 }
else { echo '<script language="javascript">';
    echo 'alert("Title Required")';
    echo '</script>'; }
}
?>
