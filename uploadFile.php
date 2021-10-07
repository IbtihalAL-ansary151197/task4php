<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

   
  
// CODE .... 

if(!empty($_FILES['cv']['name'])){

$cvTmp   =  $_FILES['cv']['tmp_name'];
$cvName  =  $_FILES['cv']['name'];
$cvSize  =  $_FILES['cv']['size'];
$cvType  =  $_FILES['cv']['type'];    //      image/png

$allowdEx  = ['pdf'];

$TypeArray = explode('/',$cvType);

 if(in_array($TypeArray[1],$allowdEx)){
    // code 
 $FinalName = rand(1,100).time().'.'.$TypeArray[1];

 $disPath = './uploads/'.$FinalName;

   if(move_uploaded_file($cvTmp,$disPath)){
       echo 'File Uploaded';
   }else{
       echo 'Error Try Again';
   }         


 }else{
     echo 'Not Allowed Extension';
 }



}else{

    echo 'Image Required';
}



}




?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
<h2>Upload CV</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="exampleInputPassword1">CV</label>
        <input type="file" name="cv">
    </div>



    <button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>

</body>

</html>