<?php 
// session_start();

include 'index2.php';

 
if($_SERVER['REQUEST_METHOD'] == "POST"){




  $name       =  clean($_POST['name']); 
  $password   =  clean($_POST['password']);
  $email      =  clean($_POST['email']);
  $address    =  clean($_POST['address']);
  $linkedIn   =  clean($_POST['linkedin']);






     $errors = [];

    if(!validate($name,1)){
        $errors['Name'] = "undefined";
    }

    if(!validate($password,1)){
        $errors['password'] = "undefined";
    }elseif(!validate($password,3) ){
        $errors['Password'] = "Password Length Must >= 6 ch";
    }

      if(!validate($email,1)){
        $errors['Email'] = "undefined";
    }elseif(!validate($email,2)){
        $errors['Email'] = "Invalid Email";
    }


     
    if(!validate($address,1)){
        $errors['address'] = "undefined";
    }elseif(strlen($address,3)){
        $errors['address'] = "address Length Must >= 10 ch";
    }
 


    if(!validate($linkedIn,1)){
        $errors['url'] = "undefined";
    }elseif(!validate($linkedIn,4)){
        $errors['linkedIn'] = "Invalid Url";
    }

    

       if(isset($_POST['gender'])){

       $gender     =  clean($_POST['gender']);
       }else{
      
         $errors['gender'] = "Field Required";
    
       }




    if(count($errors) > 0){
        foreach($errors as $key => $val ){
            echo '* '.$key.' :  '.$val.'<br>';
        }
    }else{
        echo 'Valid Data';
       }
}



include 'uploadFile.php';
?>



    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">



            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby=""
                    placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>



            <div class="form-group">
                <label for="exampleInputPassword1">Linked In</label>
                <input type="text" name="linkedin" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Gender</label>
                <br>
                <input type="radio" name="gender" value="male">
                <label for="exampleInputPassword1">Male</label>
                <br>
                <input type="radio" name="gender" value="female">
                <label for="exampleInputPassword1">Female</label>

            </div>




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>