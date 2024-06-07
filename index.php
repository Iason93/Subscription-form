<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Subscription Form</title>
 <link rel="stylesheet" href="style.css">
 <script src="https://kit.fontawesome.com/c46d1e780c.js" crossorigin="anonymous"></script>
</head>
<body>
 <input type="checkbox" id="toggle">
 <label for="toggle" class="show-btn">Show Modal</label>
 <div class="wrapper">
  <label for="toggle" class="cancel-btn"><i class="fas fa-times"></i></label>
  <div class="icon"><i class="far fa-envelope"></i></div>
  <div class="content">
   <header>Become a Subscriber</header>
   <p>Subscribe to our blog and get the latest updates straight to your inbox.</p>
  </div>
  <form action="index.php" method="POST">
   <?php
   $userEmail = "";
    if(isset($_POST['subscribe'])){ // if subscribe button clicks

     $userEmail = $_POST['email']; // getting user email
     if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user entered email
       $subject = "Thanks for subscribing us.";
       $message = "Thanks for subscribing to our blog. You will always receive the latest updates from us. We will not share or sell your information.";
       $sender = "From:";

       if(mail($userEmail, $subject, $message, $sender)){ //php function to send mail
       ?>
       <!-- show a success message if mail sent succesfully -->
        <div class="alert success">Thanks for subscribing us.</div>
       <?php
       $userEmail = "";
       }else{
        ?>
       <!-- show an serro message if mail can't be sent -->
        <div class="alert error">Failed while sending your email!</div>
       <?php

       }
     }else{
      ?>
      <!-- show an error message if user email is not valid -->
       <div class="alert error"><?php echo $userEmail ?> is not a valid email!</div>
      <?php
     }
    }
   ?>
   <div class="field">
    <input type="text" name="email" placeholder="Email Address" required value="<?php echo $userEmail?>">
   </div>
   <div class="field btn">
    <input type="submit" name="subscribe" value="Subscribe">
   </div>
   <div class="text">We do not share your information.</div>
  </form>
 </div>
</body>
</html>