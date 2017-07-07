<?php 
    
    $msg = "";
    
   
 require 'phpmailer/PHPMailerAutoload.php';
    if (isset($_POST['submit'])) {
   

    function sendemail($to, $from, $fromName, $body, $phone){

        $mail = new PHPMailer();  

        $mail->isSMTP();

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        // $mail->Port = 465;
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        // $mail->SMTPSecure = 'ssl';
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "shivanshu.iiit@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "gamwebdev";
        $mail->setFrom($from, $fromName);
        $mail->addAddress($to);
        $mail->isHTML(true);
        
        $mail->Subject = 'Regarding Contact Information';

        $mail->Body = '<h3  style="display:inline;"> Message :    </h3>' . '<p style="display:inline;">'  . $body         .
                      '</p> <br><br>' 

                    . '<h2  style="display:inline;"> Name :       </h2>' . '<h3  style="display:inline;">' . $fromName    . 
                      '</h3> <br><br>'

                    . '<h2  style="display:inline;"> Email :      </h2>' . '<h3  style="display:inline;">' . $from        . 
                      '</h3> <br><br>'  

                    . '<h2  style="display:inline;"> Phone No. :  </h2>' . '<h3  style="display:inline;">' . $phone       . 
                      '</h3> <br><br>';
        
        


        return $mail->send();

       
    }

    $name  = $_POST['name'];
    $phone  = $_POST['phone'];
    $email = $_POST['email'];
    $body  = $_POST['body'];    


    if (sendemail('ubajpai1aa@gmail.com', $email, $name, $body, $phone)) {
        $msg = 'Email sent!';
    }else{
        $msg = 'Email not sent' ;
    }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/common.css" rel="stylesheet" />
    <link href="assets/css/parsley.css" rel="stylesheet" />    

</head>
<body>
    <header class="header">
        <div class="container clearfix">
            <div class="col-sm-4 col-xs-4 text-left">
                <span class="phone-icon"><i class="fa fa-phone"></i></span>
                <span>Questions?</span><br />
                <span>802 645-4567</span>
            </div>
            <div class="col-sm-4 col-xs-4 text-center">
                <div class="mt-10">
                    <a href="javascript:void(0);" class="my-travel"  >My Travel</a>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4 text-right">
                <ul class="social-links">
                    <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </header>

    <section class="pos-rel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="slide-heading">
                <h2>BEST PLACES TO TRAVEL</h2>
                <h4>EXPLORE THE PLANET</h4>
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="assets/images/slide1.jpg" class="img-responsive" />
                </div>
                <div class="item">
                    <img src="assets/images/slide2.jpg" class="img-responsive" />
                </div>
                <div class="item">
                    <img src="assets/images/slide3.jpg" class="img-responsive" />
                </div>
                <div class="item">
                    <img src="assets/images/slide4.jpg" class="img-responsive" />
                </div>
                <div class="item">
                    <img src="assets/images/slide5.jpg" class="img-responsive" />
                </div>
                <div class="item">
                    <img src="assets/images/slide6.jpg" class="img-responsive" />
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="login_form">
            <p class="" style="color:black">Get Started Now</p>

           <form method="POST" action="index.php" data-parsley-validate>

                <div class="form-group">
                    <input id="name" name="name" placeholder="name" class="form-control" data-parsley-maxlength="20" required>
                </div>

                <div class="form-group">
                    <input id="phone" name="phone" placeholder="phone" class="form-control" data-parsley-type="number" required>
                </div>

                <div class="form-group">    
                    <input id="email" name="email" placeholder="email" class="form-control" type="email" required>
                </div>

                <div class="form-group">
                    <textarea id="body" name="body" placeholder="body" class="form-control" required></textarea>
                </div>

                <input type="submit" name="submit" value="Send Message" class="btn btn-success">
             </form>  
                <br>
    
        <?php 
        echo $msg;
        ?>         
              
            

        </div>
    </section>
    <div class="container">
        <section class="text-center p-15">
            <h2>Our greatest advantages of travel</h2>
            <p>It's an opportunity to cultivate mindfulness</p>
        </section>
        <section class="text-center">
            <div class="col-sm-3">
                <div class="feature-circle icon-plane">
                    <i class="fa fa-plane"></i>
                </div>
                <h4>Hot Tours</h4>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
            </div>
            <div class="col-sm-3">
                <div class="feature-circle icon-hotel">
                    <i class="fa fa-file"></i>
                </div>
                <h4>Hotel Info</h4>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
            </div>
            <div class="col-sm-3">
                <div class="feature-circle icon-user">
                    <i class="fa fa-users"></i>
                </div>
                <h4>Honeymoons</h4>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
            </div>
            <div class="col-sm-3">
                <div class="feature-circle icon-marker">
                    <i class="fa fa-map-marker"></i>
                </div>
                <h4>Destinations</h4>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
            </div>
            <div class="clearfix"></div>
            <br /><br /><br /><br /><br />
        </section>
    </div>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/parsley.min.js"></script>
</body>
</html>
