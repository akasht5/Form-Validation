<?php

//Alert Variables
$msg ='';
$msgClass = '';

if(filter_has_var(INPUT_POST,'submit')){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    if(!empty($name) && !empty($email) && !empty($message)){
        //pass
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            //valid email
            $msg = 'Your message has been sent !';
            $msgClass = 'alert-success';

        }else{
            //Invalid email
            $msg = 'Invalid Email address !';
            $msgClass = 'alert-danger';

        }
        

    }else{
        //fail
        $msg = 'Please fill in all the fields below !';
        $msgClass = 'alert-danger';

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    
    .boundary{
        width:80%;
        padding:100px;
    }
    @media(max-width:800px){
    .boundary{
        width:100%;
        padding:50px;
    }
    }
    .txtmsg{
        width:100%;
        height:150px;
    }
    </style>
</head>
<body>
<div class="boundary">
<form method="POST" action=" <?php echo $_SERVER['PHP_SELF'];?>">
  <?php if($msg != ''):?>
    <div class="alert <?php echo $msgClass ?>">
        <?php echo $msg ?>
    </div>  
  <?php endif; ?>
  <h3>Contact Akash Takawale</h3> 
   
  <div class="form-group">
    <label for="exampleInputPassword1">Name :</label>
    <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address :</label>
    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
 </div>
  <div class="form-group">
      <label>Message :</label><br>
      <textarea class="form-control txtmsg" name="message"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
  </div>
  
  
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  
  
</form>
</div>
</body>
</html>
