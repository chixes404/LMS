<?php include "Db.php";?>
<?php



//print_r($_FILES);superGlobal FILES is an array which include {name,type,tmp-name,error,size}
if(isset($_FILES['file']))
{ 
 $name=$_FILES['file']['name'];// when you want to get thing from array you get it by this[array][thing]
 $type=$_FILES['file']['type'];     
 $tmp=$_FILES['file']['tmp_name'];// when you upload file it uploaded in this temporary path until you move it to specfic path you want     
 $size=$_FILES['file']['size'];     
 $error=$_FILES['file']['error']; 

 $errors=array();

 $Allexten=array('png','jpg','jpeg','gif','jfif');
 
 $exten = explode('.', $name);

$resultEX  = strtolower(end($exten));


echo"<br>";
 

 if($error==4)
 {
   $errors[]="no file uploaded";
 }
 else{
 

 if(!in_array($resultEX,$Allexten))
 {

    $errors[]="invalid extension";
 }


 if($size>8000000)
 {
   $errors[]="size is large";
 }
 }
 if(empty($errors))  
 {
      move_uploaded_file($tmp,"upload_img/".$name);
      /*$query = "INSERT into books(image) values('file')";
        $result = mysqli_query($conn,$query);
        */
      if(!$errors)
      {
        
        echo $name;
      }
      
    }  
 else 
  {
    foreach($errors as $err)
     
     {
      echo $err;
    
     }
   
  }
  
}

?>

<!DOCTYPE html>
 <head>
<title>upload page</title>
<link rel="stylesheet" type="text/css" href="CSS/upload.css">
</head>
    
     
<body bgcolor= #313149>

<a href="ADDbook.php"><strong> ADD_BOOK </strong> </a>
<div class="clr"></div>
    <form method='post' action='upload.php' enctype='multipart/form-data'><!-- yiu must put enctype when you make file input-->
        <input type='file' name='file' ><!--multiple if you want to upload multiple file--> 
        <input type='submit' name='upload' >




    </form>
</body>
