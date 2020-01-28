<?php
  
  if(isset($_REQUEST['but2']))
  {
        
    $name= $_REQUEST['name'];
    $last_name= $_REQUEST['last_name'];
    $username= $_REQUEST['username'];
    $gender= $_REQUEST['gender'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
     //validetion for usernme
                      $check_username="select * from user_login where username='$username'";
                   $run_username=mysqli_query($con,$check_username);
                       $check2=mysqli_num_rows($run_username);
  if ($check2==1) { 
  echo "<script> alert('username alredy exist in database,try another username')
  </script>" ;
  exit();
    }
                    
    //validetion for email check requirment and existency
                       $check_mail="select * from user_login where email='$email'";
                   $run_email=mysqli_query($con,$check_mail);
                      $check1=mysqli_num_rows($run_email);
  if ($check1==1) { 
    ?>
  <script>alert('This E-mail address is already taken,try another E-mail');
  </script>
  <?php }
    //validetion for password
                      
  if (strlen($password)<8) {?>
  <script>alert('Password Should Be Minimum 8 Characters,try again') ;
  </script>
  <?php  }

   $sql = "insert into user_login (name,last_name,username,gender,email,password) values('$name','$last_name','$username','$gender','$email','$password')";
  mysqli_query($con,$sql);
  
   header("location:profile.php");
  }
  else
  {
    //header("location:index.php");
  }
  
  ?>
<!--register page end here-->