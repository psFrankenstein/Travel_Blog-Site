<?php $sql = "select * from footer where id = '1'";
$res = mysqli_query($con,$sql);
$arr = mysqli_fetch_assoc($res);?>

<!-- Footer -->
    <footer class="py-2 bg-black">
      <div class="container" id="container">
        <p>Follow  us on
        	<a href="<?php echo $arr['link1']?>"><img style="width: 40px;height: 40px;margin-left: 5px;" src="../admin/<?php echo $arr['share1']?>"></a>
        	<a href="<?php echo $arr['link2']?>"><img style="width: 40px;height: 40px;margin-left: 5px;" src="../admin/<?php echo $arr['share2']?>"></a>
        	<a href="<?php echo $arr['link3']?>"><img style="width: 40px;height: 40px;margin-left: 5px;" src="../admin/<?php echo $arr['share3']?>"></a>
        	<label style="padding-left: 15%;font-size: 18px;"><?php echo $arr['copyright']?></label>
        	<label style="left: 75%; position: absolute;"><a href="<?php echo $arr['contact_us']?>"><img style="width: auto;height: 50px;" src="../admin/<?php echo $arr['cont_logo']?>"></a></label>
        </p>
      </div>
      <!-- /.container -->
    </footer>