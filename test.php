<?php 
$con=mysqli_connect('localhost','root','qwerty','travel');

		$user_id =1;
		$post_id=45;


		$sql1 = "select id from likes where user_id='$user_id' and post_id='$post_id' ";

		$res = mysqli_query($con,$sql1);

		echo $row = mysqli_num_rows($res);

		if($row==0)
		{

			$time = time();
			$sql2 = "insert into likes (user_id,post_id,created_time) values ('$user_id','$post_id','$time')";

			mysqli_query($con,$sql2);


		}
		else
		{

			echo "alredy exist";
		}




			echo date("d/m/Y h:i a l",1536573388);

?>


<!--====================================================================================-->
//$sessuid=$_SESSION['id']['id'];
                  $sqlresultre1="select * from likes where which_blog='$sessuid' ORDER BY id DESC";
                  $quryresultre1=mysqli_query($con,$sqlresultre1);
                  $rowresultre1=mysqli_num_rows($quryresultre1);
                  while ($getres1=mysqli_fetch_assoc($quryresultre1)) { 
                    $ouser1=$getres1['user_id'];
                     $reblo1=$getres1['post_id'];
                     $idliked=$getres1['which_blog'];

                     //to get user information who reported
                     $sqlusere1="select * from user_login where id='$ouser1'";
                  $quryusere1=mysqli_query($con,$sqlusere1);
                    $getname1=mysqli_fetch_assoc($quryusere1);
          //to get blog post photos
                    $sqlblog1="select * from user_post where id='$reblo1'";
                  $qurblog1=mysqli_query($con,$sqlblog1);
                    $getblog1=mysqli_fetch_assoc($qurblog1);
                    ?>
                      
            <p>
               <?php if(!empty($getblog1['photos1'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos1']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog1['photos2'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos2']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog1['photos3'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos3']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog1['photos4'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos4']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }?>
              <font style="font-size: 13px;">
                <?php if($sessuid==$ouser1){ ?><a href="read.php?id=<?php echo base64_encode($getres1['post_id'])?>">you liked this post</a><?php } else{?>

                 <a href="read.php?id=<?php echo base64_encode($getres1['post_id'])?>">your blog liked by</a>
                 <a href="ucbloger.php?id=<?php echo base64_encode($getname1['id'])?>"><font style="color: green;"><?php echo $getname1['name'];?></font></a><?php }?></font> <font style="font-size: 9px;">at <?php echo date("y-m-d - H:i:s",$getres1['created_time']);?></font></p>
            <?php }?>
          </div>

          <?php // to get a live update

$_SESSION['id']['name'] = (isset($name) ? $name : (isset($_SESSION['id']['name']) ? $_SESSION['id']['name'] : '')); //name

$_SESSION['id']['last_name']= (isset($last_name) ? $last_name : (isset($_SESSION['id']['last_name']) ? $_SESSION['id']['last_name'] : '')); //last_name

$_SESSION['id']['work']= (isset($work) ? $work : (isset($_SESSION['id']['work']) ? $_SESSION['id']['work'] : '')); //for work

$_SESSION['id']['country']= (isset($country) ? $country : (isset($_SESSION['id']['country']) ? $_SESSION['id']['country'] : '')); //for country

$_SESSION['id']['b_date'] = (isset($_POST['b_date']) ? $_POST['b_date'] : (isset($_SESSION['id']['b_date']) ? $_SESSION['id']['b_date'] : '')); //b_date

$_SESSION['id']['b_day'] = (isset($_POST['b_day']) ? $_POST['b_day'] : (isset($_SESSION['id']['b_day']) ? $_SESSION['id']['b_day'] : '')); //b_day

$_SESSION['id']['b_year'] = (isset($_POST['b_year']) ? $_POST['b_year'] : (isset($_SESSION['id']['b_year']) ? $_SESSION['id']['b_year'] : '')); //b_year

$_SESSION['id']['contact'] = (isset($contact) ? $contact : (isset($_SESSION['id']['contact']) ? $_SESSION['id']['contact'] : '')); //contact

$_SESSION['id']['email'] = (isset($_POST['email']) ? $_POST['email'] : (isset($_SESSION['id']['email']) ? $_SESSION['id']['email'] : '')); //email
  //$_SESSION['id']['b_day']='$b_day';
  //$_SESSION['id']['b_year']='$b_year';
  //$_SESSION['id']['contact']='$contact'; ?>

  <?php //to get live update another process post method

$_SESSION['id']['name'] = (isset($_POST['name']) ? $_POST['name'] : (isset($_SESSION['id']['name']) ? $_SESSION['id']['name'] : '')); //name

$_SESSION['id']['last_name']= (isset($_POST['last_name']) ? $_POST['last_name'] : (isset($_SESSION['id']['last_name']) ? $_SESSION['id']['last_name'] : '')); //last_name

$_SESSION['id']['work']= (isset($_POST['work']) ? $_POST['work'] : (isset($_SESSION['id']['work']) ? $_SESSION['id']['work'] : '')); //for work

$_SESSION['id']['country']= (isset($_POST['country']) ? $_POST['country'] : (isset($_SESSION['id']['country']) ? $_SESSION['id']['country'] : '')); //for country

$_SESSION['id']['b_date'] = (isset($_POST['b_date']) ? $_POST['b_date'] : (isset($_SESSION['id']['b_date']) ? $_SESSION['id']['b_date'] : '')); //b_date

$_SESSION['id']['b_day'] = (isset($_POST['b_day']) ? $_POST['b_day'] : (isset($_SESSION['id']['b_day']) ? $_SESSION['id']['b_day'] : '')); //b_day

$_SESSION['id']['b_year'] = (isset($_POST['b_year']) ? $_POST['b_year'] : (isset($_SESSION['id']['b_year']) ? $_SESSION['id']['b_year'] : '')); //b_year

$_SESSION['id']['contact'] = (isset($_POST['contact']) ? $_POST['contact'] : (isset($_SESSION['id']['contact']) ? $_SESSION['id']['contact'] : '')); //contact

$_SESSION['id']['email'] = (isset($_POST['email']) ? $_POST['email'] : (isset($_SESSION['id']['email']) ? $_SESSION['id']['email'] : '')); //email
  //$_SESSION['id']['b_day']='$b_day';
  //$_SESSION['id']['b_year']='$b_year';
  //$_SESSION['id']['contact']='$contact'; ?>
  =====================================================================================================================================================================
  /*   
    $name= $_REQUEST['name'];
    $last_name= $_REQUEST['last_name'];
    $work= $_REQUEST['work'];
    $email= $_REQUEST['email'];
    $country= $_REQUEST['country'];
    $b_date = $_REQUEST['b_date'];
    $b_day = $_REQUEST['b_day'];
    $b_year = $_REQUEST['b_year'];
    $contact = $_REQUEST['contact'];
    $sql = "update user_login set name='".str_replace('<', ' ', $name)."',last_name='".str_replace('<', ' ', $last_name)."',work='".str_replace('<', ' ', $work)."',country='".str_replace('<', ' ', $country)."',b_date='$b_date',b_day='$b_day',b_year='$b_year',contact='".str_replace('<', ' ', $contact)."' ,email='$email' where id = '$iid'";
  mysqli_query($con,$sql);*/