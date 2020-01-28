<?php 
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
?>
<!DOCTYPE html>
<!-- travler blog front page -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>travel blog-travel ideas, tips and beautiful photos to help you plan your next holiday</title>
  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="./css/css" rel="stylesheet">
  <link href="./css/css(1)" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./css/fontpage.css" rel="stylesheet">
  <style type="text/css">@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}
.rounded-circle{
  height: 200px; width: auto;
}
/body{font-family:Muli,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';padding-top:54px;color:#868e96}@media (min-width:992px){body{padding-top:0;padding-left:17rem}}h1,h2,h3,h4,h5,h6{font-family:'Saira Extra Condensed',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';font-weight:700;text-transform:uppercase;color:#343a40}h1{font-size:6rem;line-height:5.5rem}h2{font-size:3.5rem}h3{font-size:2rem}p.lead{font-size:1.15rem;font-weight:400}.subheading{text-transform:uppercase;font-weight:500;font-family:'Saira Extra Condensed',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';font-size:1.5rem}.social-icons a{display:inline-block;height:3.5rem;width:3.5rem;background-color:#495057;color:#fff!important;border-radius:100%;text-align:center;font-size:1.5rem;line-height:3.5rem;margin-right:1rem}.social-icons a:last-child{margin-right:0}.social-icons a:hover{background-color:#bd5d38}.dev-icons{font-size:3rem}.dev-icons .list-inline-item i:hover{color:#bd5d38}#sideNav .navbar-nav .nav-item .nav-link{font-weight:800;letter-spacing:.05rem;text-transform:uppercase}#sideNav .navbar-toggler:focus{outline-color:#d48a6e}@media (min-width:992px){#sideNav{text-align:center;position:fixed;top:0px;left:0;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;width:17rem;height:100vh}#sideNav .navbar-brand{display:-webkit-box;display:-ms-flexbox;display:flex;margin:auto auto 0;padding:.5rem}#sideNav .navbar-brand .img-profile{max-width:10rem;max-height:10rem;border:.5rem solid rgba(255,255,255,.2)}#sideNav .navbar-collapse{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;-webkit-box-flex:0;-ms-flex-positive:0;flex-grow:0;width:100%;margin-bottom:auto}#sideNav .navbar-collapse .navbar-nav{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;width:100%}#sideNav .navbar-collapse .navbar-nav .nav-item{display:block}#sideNav .navbar-collapse .navbar-nav .nav-item .nav-link{display:block}}section.resume-section{padding-top:5rem!important;padding-bottom:5rem!important;max-width:75rem}section.resume-section .resume-item .resume-date{min-width:none}@media (min-width:768px){section.resume-section{min-height:100vh}section.resume-section .resume-item .resume-date{min-width:18rem}}@media (min-width:992px){section.resume-section{padding-top:3rem!important;padding-bottom:3rem!important}}.bg-primary{background-color:#037214!important}.text-primary{color:#bd5d38!important}a{color:#bd5d38}a:active,a:focus,a:hover{color:#824027}
.collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active, .collapsible:hover {
    background-color: #555;
}

.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
}
</style>
</head>
<body style="padding-top: 54px;" id="page-top">
	<?php
require('slice/header.php'); 


if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
     $idcard = $_REQUEST['id'];
     $ied = base64_decode($idcard);
//backup for deleted user account
    $reset="INSERT INTO del_user SELECT * FROM user_login WHERE id='$ied'";
            mysqli_query($con,$reset);
    
    $sql = "DELETE FROM `user_login` WHERE id='$ied'";
    mysqli_query($con,$sql);
    
     header("location:logout.php");
  } 
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed" id="sideNav" style="padding-top: 56px;">
      <a class="navbar-brand js-scroll-trigger" href="#">
        <span class="d-block d-lg-none"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about" target="">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#why">Why Travel Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#help">Need Help</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0" style="padding-top: 2%;">Welcome to travel
            <span class="text-primary">Blog</span>
          </h1>
           <!-- Introduction Row -->
                 <h1 class="my-4">
                 <small>It's Nice to Meet You!</small>
                 </h1>
      <p>experienced writers travel the world to bring you informative and inspirational features, destination roundups, travel ideas, tips and beautiful photos in order to help you plan your next holiday.</p>
      
          <p class="lead mb-5">In fact, I think travel makes everybody a more awesome person. We end our travels way better off than when we started. I’m not saying this to be conceited or egotistical; I’m saying it because I believe that travel is something that makes you not only a better human being but a way cooler one too. The kind of person people gravitate toward and want to be around.</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#>
              <i class="fab fa-github"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience" >
        <div class="my-auto">
          <h2 class="mb-5" id="Experience" style="padding-top: 5%;">Experience</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Traveling the world</h3>
              <p>Traveling the world allows you to see and experiences, the worlds most historical important sites, the worlds best beaches, the worlds best food etc. Yes your country may make good pizzas but they will not compare to Italian pizzas. Your local city may have a hustle and bustle feel to it, but it won’t be as extreme as in London, New York and Tokyo.</p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Breathe in the lavender fields in Provence, France.</h3>
              <p>The fragrant lavender fields of Provence bloom from June to August into a sea of purple, creating an incredible, color-rich, aromatic scene. Close your eyes, breathe deep, and exhale.</p>
            </div>
            
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Take a cruise in Hạ Long Bay, Vietnam.</h3>
              <p>A vision of towering limestone rainforest islands surrounded by emerald-green waters, Hạ Long Bay in the Gulf of Tonkin, Vietnam, includes more than 1600 islands and islets, most of which are uninhabited. The area provides lots of interest for sightseers, scuba divers, rock climbers, and hikers alike.</p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Heat up next to New Zealand's Champagne Pool.</h3>
              <p>Located on the North Island of New Zealand, the Champagne Pool is a terrestrial hot spring formed by a hydrothermal eruption 900 years ago and it belongs on your travel bucket list. Its name derives from its abundance of flowing carbon dioxide that causes a similar bubbling to champagne, and its unusual colors come from mineral deposits. Water in the pool is around 163° Fahrenheit—swimming is not recommended.</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Swing at the "End of the World" in Ecuador.</h3>
              <p>La Casa del Arbol, a low-tech tourist attraction in Baños, Ecuador, is nicknamed “the end of the world” for good reason. Here, non-acrophobes swing over a deep abyss below, the crater of Mount Tungurahua, an active stratovolcano. The tree house that the swing is attached to is a seismic monitoring station.</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Stroll through the Sagano Bamboo Forest in Japan</h3>
              <p>Located on the outskirts of Kyoto, Japan’s Sagano Bamboo Forest is a magical wonderland of towering, verdant bamboo stalks gently moving in the wind, eerily creaking as they collide.</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Walk through Plitvice Lakes in Croatia.</h3>
              <p>Located in central Croatia at the border of Bosnia and Herzegovina, heavily forested Plitvice Lakes National Park (a UNESCO World Heritage site) is a sight for sore eyes, with 16 tumbling crystalline lakes and a series of cascades and waterfalls of mineral-rich water. 

</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Hike Machu Picchu in Peru</h3>
              <p>This Incan citadel set high in the Andes Mountains was built in the 15th century and later abandoned. Today, it presents a fierce challenge for hikers, offering incredible panoramic views as a reward.</p>
            </div>
          </div>

        </div>

      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
          <h4 class="mb-5" id="why" style="padding-top: 8%;">“Some of the most important moments in history have been recorded on film or written down by travellers. Make sure you take your camera and pen everywhere.”</h4>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Travel blogs encourage travel – and that broadens the mind</h3>
              <p>Next time you’re sitting around a dinner table with friends listening to some bloke rabbit on about how people in the third world are hopeless and how we shouldn’t spend any money trying to assist, go ahead and politely inquire how many times they’ve visited those countries.</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Travel blogs document historical events</h3>
              <p>In the future we’re going to be able to look back at all those travel blogs – websites, Tumblrs and Twitter feeds – and see trends unravel and events take place.</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Travel can give meaning to a lifetime</h3>
              <p>experiences add things to your life that last a very long time. They can get you through the shittiest things that will happen to you at home.

              But a lot of people wouldn’t hear about that unless they read it on a blog or saw a photo of some mountain or Buddhist lama and felt a connection and an itching to go and search it out</p>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Travel blogs encourage travel – and that broadens the mind</h3>
              <p>Next time you’re sitting around a dinner table with friends listening to some bloke rabbit on about how people in the third world are hopeless and how we shouldn’t spend any money trying to assist, go ahead and politely inquire how many times they’ve visited those countries.</p>
            </div>
          </div>
        </div>
      </section>

      
      <hr class="m-0">
<?php $id=$_SESSION['id']['id'];?>
      <section class=" p-3 p-lg-5 d-flex flex-column" >
        <div class="my-auto" >
          <h2 class="mb-5" id="help" style="padding-top: 6%;">Found Answer ?
            <small>if not contact us</small>
          </h2>
          <ul class="fa-ul mb-0 list-unstyled">
            <li>
              <p class="collapsible">WHAT TO BLOG</p>
              <div class="content">
              <p>If you are new to our website then most welcome.you can write blogs like others.only you have to do that give a good header according to your post and a short description that can be easy to find for readers .now write a blog in blog body as per your experiences you can choose 4 photo at a time but that not necessary . you can edit it letter<br><?php if(isset($_SESSION['id'])) { ?><a href="profile.php">start writing</a><?php }else{?><a href="index.php"> Register start writing</a><?php }?><br>
                #1 Be unique<br>

“Do interesting things. Your content is your travel. Go and do the interesting things that most people will never get a chance to do.”<br>

#2 Stay human<br>

“So many big companies are looking to humanise their brand with a relatable voice, and we as bloggers have a distinct advantage of already being human, and having a personality-based brand. Don’t be afraid to embrace all of who ‘you’ are as a blogger. By this I mean tweeting, posting and sharing information you are passionate about and trust, be it inside the travel sphere or outside of it. This will enable you to become a resource for your followers.”<br>

#3 Be honest<br>

“My number one piece of advice to a new blogger is to aim to dig deeper than the usual blog – go beyond the usual superficial articles about a destination. And most of all, be honest. That honesty is going to be what makes your reader trust you, and the vulnerability of that honesty is going to be what makes people connect with you on a personal level. It is that personal connection that has made blogs so popular and powerful over the past few years.”<br>
#4 Break rules<br>

“Break rules. The biggest bloggers got big by innovating and standing out. They did something different. You can’t beat them at their own game so beat them at *yours*. When the rules feel wrong, overturn them. See what happens. You may find something uniquely you that people love. And wouldn’t *that* be cool?”<br>

#5 Stick with one idea<br>

“Post only when you have something valuable to share. Be yourself, honest, personal, and try not to ‘sell’. Be aware that people are busy so every post should be brief and focused to the subject, typically one main idea at a time. My best advice is to be real, offer great content that will help your readers, and have fun with it.”<br>

#6 Keep the faith<br>

“Stick to your vision, but allow it to evolve. Just as you would plan a trip, do the same for your career as a travel blogger. Have a roadmap, but be open to changing your direction as new opportunities arise.”<br>
#7 Use your knowledge<br>

“Given the plethora of travel blogs, become an expert in a niche to differentiate yourself and get noticed. I travel full-time in a financially sustainable way, and as a former financial planner, I specialise in the finance of travel.”<br>

#8 Write well<br>

“You can travel to outer space, but it is your writing that is the most powerful tool for a successful travel blog. Infuse your writing with your personality and story. Don’t just list out your travels. Create your experience for the reader and you will have their attention. Good writing travels the world even without a plane ticket.”<br>

#9 Use your voice<br>

“Anyone can craft a sterile travel blog with a few tips and photos. You might be able to capture some early traffic with such a blog, but if you want an engaged audience that will stick with you, your blog needs to be driven by your personality and voice.”<br>

</p></div>
              </li>
              <?php if(isset($_SESSION['id'])) { ?>
            <li>
              <p class="collapsible">I want to change my password</p>
              <div class="content">
              <p>if you want to change password or you want to recover your password <a href="searchpass.php?id=<?php echo base64_encode($id)?>">click here</a> <br>we suggest that you should change your password after few month <br>choose a strong password that contain letter number spacial character .choose a complicated password and stay secure.</p></div></li><?php }?>
            <li>
              <p class="collapsible" >My Bog Was Deleted Without Notification</p>
              <div class="content">
              <p >1.If any blogger's post any post that not related to travel  or destination the post will be deleted  as  we noticed .<br>2.If a post contain violence  to people or religion that post will be deleted as per community guideline.<br>3.If we found any fake news or information the post will be deleted .<br>4.If any one report to your post then your post may be delete after analyze .if more then 10 people report then your post will be blocked <br>If it not satisfy those reason contact us    <a href="#contact">click here</a></p></div>
            </li>
             <?php if(isset($_SESSION['id'])) { ?>
            <li>
              <p class="collapsible">I Want To Delete My Account</p>
              <div class="content" id="delete" >
                <p>We are sorry for your bad experience ,tell us how we can improve our performance .If you still want to delete please put your login password bellow </p>
              <p ><form action="" method="post" >
            <div class="input-group" style="width: 50%;margin-top: 3%;margin-left: 22%;">
              <input type="text" name="search" class="form-control" placeholder="Search for..." style="width: 50%;" autofocus="">
              <span class="input-group-btn" style="">
                <a href="aboutus.php"><button class="btn btn-secondary " type="submit" name="submit">Go!</button></a>
              </span>
            </div>
            </form> 
          </p>
                    <?php
  if(isset($_POST['submit'])){
           $search=$_POST['search'];
           header('location:aboutus.php?id='.$search);
    }
     else {
   // echo  "<script>alert('Please enter a search query');</script>";
    }
 
          ?>
        </div>

              </li>
              <?php }

           $search1=$_REQUEST['id'];
           $id=$_SESSION['id']['id'];

                  $sql001="select * from user_login where password='$search1' AND id='$id'";
                 $req001=mysqli_query($con,$sql001);
                   $row01= mysqli_num_rows($req001);
                 if ($row01==1) { ?>
                 <div class="contener" style="background-color: #FF000074;padding: 4px;">
                  <p><b> Hi <?php echo $_SESSION['id']['name'];?></b> are you confirm that you want to delete your account. once you delete tour account you can't  recover it .think again..<br>to delete
                   <a href="aboutus.php?action=del&id=<?php echo base64_encode($id)?>">click here</a> </p>
                 </div>
           
                 
        <?php  // $getid=base64_encode($arr0['id']);
          //header('location:logout.php?id='.$getid);
            } 
            else if(!empty($search1)){
           echo '<p class="mt-5 mb-3  text-center" style="color:red;">Your Password Does Not Satisfy</p>';
                 }
              
?>
            <li>
               <p class="collapsible" >How To Edit My Blog </p>
              <div class="content">
              <p >In our blog a user can upload 4 photo and blog head ,blog summery and blog .Once you uploaded you get a edit button to go to the blog edit page where you can update your post.Hover the mouse pointer on photo add button to know which button contain photo and which one is blank .bloger  can also upload  photos in non empty place .then click the test areas to edit or change then click on update  button to save the changes  </p></div>
            <li>
             <p class="collapsible" >How To contact </p>
              <div class="content">
              <p ><a href="#contact">Click Here</a> or go to our about page and click on contact.if you are register user then you already have dedicated button to go to the contact page. in a contact form fill your name and e-mail address and submit your message in a message box (for register user they only need to submit message). we will reply via your e-mail address that you provided </p></div>

             </li>
             <li>
             <p class="collapsible" >Report Us </p>
              <div class="content">
              <p >If any user find any kind of suspicious post or link report us </p></div>

             </li>
          </ul>
        </div>
      </section>

    </div>
    <hr class="m-0">
<?php $id=$_SESSION['id']['id'];?>
      <section class=" p-3 p-lg-5 d-flex flex-column" >
        <div class="my-auto" >
          <h2 class="mb-5" id="contact" style="padding-top: %;">
            <small> contact us</small>
          </h2>
          <ul class="fa-ul mb-0 list-unstyled">
             <li>
             <p class="collapsible" >Contact With Direct Mail </p>
              <div class="content">
          <h4 class="jumbotron-heading">If You Want To Contact With Direct Mail Then 
          <p class="lead text-muted"><a href="mailto:ps597924@gmail.com?subject=Contact With TravelBlog">
Click Here</a></p></h4>
      </div>

             </li>
             <li>
             <p class="collapsible" >You Can Leav a Message Here </p>
              <div class="content">
              <div class="card my-4 text-center" style="background-color: #4C002537;">
          <h5 class="card-header"><small> Leave a Message:</small> </h5>
          <div class="card-body">
            <?php 
                      $ip=$_SERVER['REMOTE_ADDR'];
            if(isset($_REQUEST['subb1'])) {
            $name= $_REQUEST['name'];
            $email= $_REQUEST['email'];
            $ask= $_REQUEST['ask'];
            $finalask=str_replace('<', ' ',$ask);
            $time = time();
            $sqll = "insert into contact(name,email,ask,time,ip) values('$name','$email','$finalask','$time','$ip')";
            mysqli_query($con,$sqll);
            header("location:aboutus.php#contact");
            }
            ?>
            <?php if(!isset($_SESSION['id']))
            {
            ?>
            <form accept="" method="post">
              <div class="form-group">
                <input type="text" name="name" placeholder="enter your name" pattern="[a-zA-Z0-9]+" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder=" enter your E-mail" style=" width: 100%; height:50px;" pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,63}$" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="ask" rows="3" placeholder='enter your message' style=" width: 100%; height:150px;resize: none;" required></textarea>
              </div>
              <button type="submit" name='subb1' class="btn btn-primary">Submit</button>
            </form>
            <?php   } else{?>
            <form accept="" method="post">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="ask" placeholder='enter YOUR QUSTION' style=" width: 100%; height:150px;resize: none;" required></textarea>
              </div>
              <button type="submit" name="subb2" class="btn btn-primary">Submit</button>
            </form>
            <?php }?>
            <?php
            $name=$_SESSION['id']['name']."&nbsp".$_SESSION['id']['last_name'];
            $email=$_SESSION['id']['email'];
            $id=$_SESSION['id']['id'];
            $com_logo=$_SESSION['id']['p_photo'];
            if(isset($_REQUEST['subb2'])) {
            $ask= $_REQUEST['ask'];
            $finalask=str_replace('<', ' ',$ask);
            $time = time();
            $sqll1 = "insert into contact(name,email,ask,time,ip,photos,u_id) values('$name','$email','$finalask','$time','$ip','$com_logo','$id')";
            mysqli_query($con,$sqll1);
            header("location:aboutus.php#contact");
            } ?>
          </div>
        </div>
           

            </div>

             </li>
          </ul>
        </div>
      </section>

    
    <?php require('slice/footer.php');?>
    
<!-- Bootstrap core JavaScript -->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    
  </body></html>