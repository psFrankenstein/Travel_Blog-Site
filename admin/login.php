<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        
    </head>
    <body  id="body">
        <div class="div">
            <div class="lp"><img src="photos/login-user-icon.png" height="" width="130%"></div>
            <div class="div2"><h3>Login Panel</a> </h3></div>
            <div class="login"><?php
                if(isset($_POST['username']) && isset($_POST['password']) ) { //check the requirement
                $username=$_POST['username'];     //access deta from html from
                $password=$_POST['password'];           //access deta from html from
                if(!empty($username) && !empty($password)) //creat a loop to check for the requirment
                {
                $sql = "select * from admin where username='$username'and password='$password'";
                //creat a query for sql database
                if($query=mysqli_query($con,$sql)) // connect database in a loop  for validation
                {
                    $mysql_rows=mysqli_num_rows($query); //check the rows for search reasult
                    if($mysql_rows==0 )
                    {
                        echo 'Invalid UserName or Password !';
                    }
                    else if($mysql_rows==1)
                    {
                echo $username.'&nbsp welcome';
                
                        
                        $userid = mysqli_fetch_assoc($query);
                        $_SESSION['id']=$userid;
                    
                        header("location:index.php");
                    }
                }
                }
                else {
                echo 'Please Enter UserName And Password ';
                }
                }
            ?></div>
            <br/> <!-- login form   -->
            <font color="" size="4px">
            <form action="<?php echo $currentfile; ?>" method="post">
                <div class="div1"><input type="text" name="username" placeholder="Enter Username" autofocus=""></div>
                <div class="div1"><input type="password" name="password" placeholder="Enter Password" ></div>
                <br/><br/>
               <div class="butt"><button type="submit" name="submit" id="button">LogIn</button></div>
            </div>
        </body>
    </html>