
<?php 
  ini_set('upload_max_filesize', '8M');
$sql = "select * from frontend_header where id = '1'";
$res = mysqli_query($con,$sql);
$arr = mysqli_fetch_assoc($res);
?>
<?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
$iduser=$_SESSION['id']['id']; //code for number of time loged in by admin or user
  $quer1="select * from user_login where id = '$iduser'";
  $req=mysqli_query($con,$quer1);
  $get=$_SESSION['id']['login_attempt'];
    $c=$get+1;
     
    $time=time();
    //$current_date=date('D,M,Y - H:i:s');
      $quer="update user_login set    login_attempt='$c',last_seen='$time' where id = '$iduser'";
    mysqli_query($con,$quer);

}

    ?>
<?php if(!isset($_SESSION['id']))
   { 


    ?>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-darkgray navbar-custom fixed-top" >
    <div class="container" >
      <a class="navbar-brand" href="<?php echo $arr['link']?>"><img class="hdimg"  src="../admin/<?php echo $arr['logo']?>" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarResponsive" >
        <ul class="navbar-nav ml-auto" style="">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link1']?>"><?php echo $arr['Navigation']?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link2']?>"><?php echo $arr['Navigation1']?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link3']?>"><?php echo $arr['Navigation2']?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link5']?>"><?php echo $arr['Navigation3']?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link4']?>"><?php echo $arr['Navigation4']?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'"><?php echo $arr['Navigation5']?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'" ><?php echo $arr['Navigation6']?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php } else{
    ?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-darkgray navbar-custom fixed-top" >
    <div class="container" style="height: 66px;">
      <a class="navbar-brand" href="<?php echo $arr['link']?>"><img class="hdimg" src="../admin/<?php echo $arr['logo']?>" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto" style="background-color: #3C3D3D;">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link0']?>"><img src="<?php echo $_SESSION['id']['p_photo'] ?>" style="height: 30px; width: 30px; border-radius: 50%; padding: 0px; margin: 0px; padding-top: -10px; " alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link0']?>"><?php echo $_SESSION['id']['username']?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link3']?>"><?php echo $arr['Navigation2']?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link5']?>"><?php echo $arr['Navigation3']?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link4']?>"><?php echo $arr['Navigation4']?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $arr['link7']?>"><?php echo $arr['Navigation7']?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php }?>

  <!--cheke the argument for user with if else  for better view-->
  <script>
      function validate(){
      var name= document.getElementById("name").value;
      var last_name= document.getElementById("last_name").value;
      var username= document.getElementById("username").value;
      
                 var email= document.getElementById("email").value;
                  var reg=/^\w+([\.-]?\w+)*@\gmail([\.-]?\w+)*(\.\w{2,3})+$/;
      var password= document.getElementById("password").value;
      
      
      if(name=="")
      {
      alert('please enter name ');
      document.getElementById("name").focus();
      return false;
      }
      else if(last_name=="")
      {
      alert('please enter last name ');
      document.getElementById("last_name").focus();
      return false;
      }
      
      else if(username=="")
                  {
                   alert('please enter username');
                   document.getElementById("username").focus();
                   return false;
                   }

         else if(email=="")
                  {
                   alert('please enter email bro');
                   document.getElementById("email").focus();
                   return false;
                   }
                                                       
                   else if(reg.test(email)== false)
                  {
                   alert('please enter valid email bro');
                   document.getElementById("email").focus();
                   return false;
                   }
      
      else if(password=="")
      {
      alert('please enter password bro');
      document.getElementById("password").focus();
      return false;
      }
      
      }
      
       
      </script>
<div id="id02" class="modal">
  <form class="modal-content animate" action="" method="post" onSubmit="return(validate())">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../photos/img_avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Enter Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" id="name" maxlength="40" pattern="[a-zA-Z]+">
      <label for="uname"><b>Enter Last Name</b></label>
      <input type="text" placeholder="Enter last Name" name="last_name" id="last_name" maxlength="40" pattern="[a-zA-Z]+">

      <label for="uname" ><b>Gender</b></label><br>
        <input type="radio" name="gender"  value="Male" checked> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other <br> 
      <label for="uname"><b>Enter Username <small style="color: red;">(minimum 5 characters)</small></b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" maxlength="40" pattern="[a-zA-Z0-9]{5,}">
      <label for="uname"><b>Enter E-mail</b></label>
      <input type="text" placeholder="Enter E-mail" name="email" id="email" pattern="[a-z0-9._%+-]+@gmail+\.[a-z]{2,63}$">

      <label for="psw"><b>Password</b></label><br>
      <label for="psw" style="font-size:12px; padding: 0px; margin: 0px;top: 1px;color: red;">*Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</label>
      <input type="password" placeholder="Enter Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
      <label>
        <input type="checkbox" onclick="swFunction()">Show Password
      </label> 
        
      <button type="submit" name="but2">Register</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#fefefe">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<?php $ip=$_SERVER['REMOTE_ADDR'];
  
  if(isset($_REQUEST['but2']))
  {
        
    $name= $_REQUEST['name'];
    $last_name= $_REQUEST['last_name'];
    $username= $_REQUEST['username'];
    $gender= $_REQUEST['gender'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    //validetion for usernme

  if ( ($name=='travel' && $last_name=='blog')|| ($name=='Travel' && $last_name=='Blog')) { ?>
  <script> alert('This Name Is Reserved For The Page Admin') ;
  </script>
  <?php return; }

     //validetion for usernme
               $check_username="select * from user_login where username='$username'";
                   $run_username=mysqli_query($con,$check_username);
                      $check0=mysqli_num_rows($run_username);
  if ($check0==1) { ?>
  <script> alert('username alredy exist in database,try another username') ;
  </script>
  <?php return; }
                    
    //validetion for email check requirment and existency
                       $check_mail="select * from user_login where email='$email'";
                   $run_email=mysqli_query($con,$check_mail);
                      $check1=mysqli_num_rows($run_email);
  if ($check1==1) { 
    ?>
  <script>alert('This E-mail address is already taken,try another E-mail');
  </script>
  <?php return;}
    //validetion for password
                      
  if (strlen($password)<8) {?>
  <script>alert('Password Should Be Minimum 8 Characters,try again') ;
  </script>
  <?php return; }
//str_replace(',', ' ', $name)
   $sql = "insert into user_login (name,last_name,username,gender,email,password,ip) values('$name','$last_name','$username','$gender','$email','$password','$ip')";
  mysqli_query($con,$sql);
  
   header("location:profile.php");
  }
  else
  {
    //header("location:index.php");
  }
  
  ?>
<!--register page end here--><?php
                if(isset($_POST['username']) && isset($_POST['password']) ) { //check the requirement
                $username=$_POST['username'];     //access deta from html from
                $password=$_POST['password'];           //access deta from html from
                if(!empty($username) && !empty($password)) //creat a loop to check for the requirment
                {
                $sql = "select * from user_login where username='$username'and password='$password'";
                //creat a query for sql database
                if($query=mysqli_query($con,$sql)) // connect database in a loop  for validation
                {
                    $mysql_rows=mysqli_num_rows($query); //check the rows for search reasult
                    if($mysql_rows==0 )
                    {
                      ?>
  <script> alert('Invalid username or password. try again!') ;
  </script>
  <?php }
                    else if($mysql_rows==1)
                    {
                //echo $username.'&nbsp welcome';
                
                        
                        $userid = mysqli_fetch_assoc($query);
                        $_SESSION['id']=$userid;
                    
                        header("location:profile.php");
                    }
                }
                }
                else {
                echo 'Please Enter UserName And Password ';
                }
                }
            ?>
<div id="id01" class="modal">
  <form class="modal-content animate" action="" method="post" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../photos/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="my1Input" required>
      <label>
        <input type="checkbox" onclick="mtFunction()">Show Password
      </label>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#fefefe">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="findid.php">password?</a></span>
    </div>
  </form>
</div>
<!--log in page end here-->
<!--====================================================================================-->
<?php  

  $sq11="select * from user_login";
  $re11=mysqli_query($con,$sq11);
  $ar11=mysqli_fetch_assoc($re11);
   $p_photo=$_SESSION['id']['p_photo'];
    $iden=$_SESSION['id']['id'];
     
     $sq1="select * from contact where u_id=$iden";
  $re1=mysqli_query($con,$sq1);
  $ar1=mysqli_fetch_assoc($re1);
  $photo=$ar1['photos'];

   if(isset($_SESSION['id']))
   {
        if('$photo'!='$p_photo'){

          $sll = "update contact set photos='$p_photo' where u_id=$iden";
            mysqli_query($con,$sll);
        }
    }

    $sq112="select * from user_login";
  $re112=mysqli_query($con,$sq112);
  $ar112=mysqli_fetch_assoc($re112);
   $p_photo1=$_SESSION['id']['p_photo'];
    $iden=$_SESSION['id']['id'];
    $name00=$_SESSION['id']['name']."&nbsp".$_SESSION['id']['last_name'];
     
     $sq12="select * from comments where u_id=$iden";
  $re12=mysqli_query($con,$sq12);
  $ar12=mysqli_fetch_assoc($re12);
  $photo1=$ar12['logo'];
  $name10=$ar12['name'];

   if(isset($_SESSION['id']))
   {
        if('$photo1'!='$p_photo1'){

         $sll = "update comments set logo='$p_photo1' where u_id=$iden";
            mysqli_query($con,$sll);
        }
        if('$name10'!='$name00'){

         $sll = "update comments set name='$name00' where u_id=$iden";
            mysqli_query($con,$sll);
        }
    }
?>
<!--====================================================================================-->
                             <!--USER INFORMETION-->
                             <?php
        //cpu stat
        $prevVal = shell_exec("cat /proc/stat");
        $prevArr = explode(' ',trim($prevVal));
        $prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
        $prevIdle = $prevArr[5];
        usleep(0.15 * 1000000);
        $val = shell_exec("cat /proc/stat");
        $arr = explode(' ', trim($val));
        $total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
        $idle = $arr[5];
        $intervalTotal = intval($total - $prevTotal);
        $stat['cpu'] =  intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
        $cpu_result = shell_exec("cat /proc/cpuinfo | grep model\ name");
        $stat['cpu_model'] = strstr($cpu_result, "\n", true);
        $stat['cpu_model'] = str_replace("model name    : ", "", $stat['cpu_model']);
        //memory stat
        $stat['mem_percent'] = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
        $mem_result = shell_exec("cat /proc/meminfo | grep MemTotal");
        $stat['mem_total'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
        $mem_result = shell_exec("cat /proc/meminfo | grep MemFree");
        $stat['mem_free'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
        $stat['mem_used'] = $stat['mem_total'] - $stat['mem_free'];
        //hdd stat
        $stat['hdd_free'] = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
        $stat['hdd_total'] = round(disk_total_space("/") / 1024 / 1024/ 1024, 2);
        $stat['hdd_used'] = $stat['hdd_total'] - $stat['hdd_free'];
        $stat['hdd_percent'] = round(sprintf('%.2f',($stat['hdd_used'] / $stat['hdd_total']) * 100), 2);
        //network stat
        $stat['network_rx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/rx_bytes")) / 1024/ 1024/ 1024, 2);
        $stat['network_tx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/tx_bytes")) / 1024/ 1024/ 1024, 2);
        //output headers
        //header('Content-type: text/json');
        //header('Content-type: application/json');
        //output data by json
         $dtl="{\"cpu\": " . $stat['cpu'] . ", \"cpu_model\": \"" . $stat['cpu_model'] . "\"" . //cpu stats
        ", \"mem_percent\": " . $stat['mem_percent'] . ", \"mem_total\":" . $stat['mem_total'] . ", \"mem_used\":" . $stat['mem_used'] . ", \"mem_free\":" . $stat['mem_free'] . //mem stats
        ", \"hdd_free\":" . $stat['hdd_free'] . ", \"hdd_total\":" . $stat['hdd_total'] . ", \"hdd_used\":" . $stat['hdd_used'] . ", \"hdd_percent\":" . $stat['hdd_percent'] . ", " . //hdd stats
        "\"network_rx\":" . $stat['network_rx'] . ", \"network_tx\":" . $stat['network_tx'] . //network stats
        "}";
          /* to get system hardware config*/
        ?>
      <?php
              /* to get system  config*/
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}


$user_os        = getOS();
$user_browser   = getBrowser();

 $device_details = "<strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."";


         $time = time();
         $iidd=$_SESSION['id']['id'];
         $ip=$_SERVER['REMOTE_ADDR'];
?>
<?php 
$gtpage1= basename($_SERVER['PHP_SELF']);
if(isset($_SESSION['id']))
{
  $sqlinfo = "insert into system_info (system_os,system_conf,browser,u_id,ip,time,page) values ('$user_os','$dtl','$user_browser','$iidd','$ip','$time','$gtpage1')";

      mysqli_query($con,$sqlinfo);
  
}
else if(!isset($_SESSION['id']))
{
  $sqlinfo = "insert into system_info (system_os,system_conf,browser,ip,time,page) values ('$user_os','$dtl','$user_browser','$ip','$time','$gtpage1')";

      mysqli_query($con,$sqlinfo);
  
}
?>

<!--====================================================================================-->
<script>
// Get the modal
var modal = document.getElementById('id02');
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
function mtFunction() {
    var x = document.getElementById("my1Input");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function swFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>