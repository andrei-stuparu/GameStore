<html>
	<head>
		<title>Poject Web</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
	</head>
	<body style="background-image: url('http://msgpluslive.fr/wp-content/uploads/2016/10/gamer.jpg'); background-repeat: no-repeat; background-position:center top; background-attachment: fixed;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="navbar-header" style="text-align:center">
          <p class="text-info">Game Store World-Siege</p>
          <p class="text-info">World's Largest Archive of Games for Sale</p>
        </div>
        <div id="navbar">
          <ul class="navbar-nav mr-auto">
            <li class="btn btn-info"  style="padding-left:13px"><a href="<?php echo base_url(); ?>home">Home</a></li>
            <?php if(!isset($_COOKIE['loginCustomer'])&&!isset($_COOKIE['loginManager'])):?>
            <li class="btn btn-info"  style="padding-left:13px"><a href="<?php echo base_url(); ?>catego">Game Categories</a></li>
            <li class="btn btn-info"  style="padding-left:13px"><a href="<?php echo base_url(); ?>games">Games</a></li>
          <?php endif; ?>
          <?php if(isset($_COOKIE['loginCustomer'])&&!isset($_COOKIE['loginManager'])):?>
            <li class="btn btn-info"  style="padding-left:13px"><a href="<?php echo base_url(); ?>pages/logout">Log Out</a></li>
            <li class="btn btn-info" style="color: black;"><img src='https://cdn0.iconfinder.com/data/icons/users-android-l-lollipop-icon-pack/24/user-512.png' style='width:30px;length:30px'> Welcome, <?=$_COOKIE['loginCustomer']?></li>
          <?php endif; ?>
          <?php if(isset($_COOKIE['loginManager'])):?>
            <li class="btn btn-info"  style="padding-left:13px"><a href="<?php echo base_url(); ?>pages/logout2">Log Out</a></li>
            <li class="btn btn-info" style="color: black;"> <img src='https://cdn0.iconfinder.com/data/icons/users-android-l-lollipop-icon-pack/24/user-512.png' style='width:30px;length:30px'>Welcome Administrator</li>
              
          <?php endif; ?>
          </ul>
         </div>
       </div>
      </nav>
      <div id="container">
        <?php if(isset($_COOKIE['userSuccess'])):?>
          <p class="alert alert-success">You have successfully created a customer account!</p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['loginCustomerSuccess'])):?>
          <p class="alert alert-success"> You have successfully logged in your customer account! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['loginCustomerFail'])):?>
          <p class="alert alert-danger"> You have failed to log in your customer account! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['logoutCustomer'])):?>
          <p class="alert alert-success"> You have successfully logged out of your customer account! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['loginManagerSuccess'])):?>
          <p class="alert alert-success"> You have successfully logged in your administrator account! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['loginManagerFail'])):?>
          <p class="alert alert-danger"> You have failed to log in your administrator account! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['logoutManager'])):?>
          <p class="alert alert-success"> You have successfully logged out of your administrator account! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['gameDeleted'])):?>
          <p class="alert alert-success"> You have successfully deleted a game! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['gameUpdated'])):?>
          <p class="alert alert-success"> You have successfully updated a game! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['gameCreated'])):?>
          <p class="alert alert-success"> You have successfully created a game! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['gameAdded'])):?>
          <p class="alert alert-success"> You have added a game to your cart! </p>
        <?php endif; ?>

         <?php if(isset($_COOKIE['gameRemoved'])):?>
          <p class="alert alert-success"> You have removed a game from your cart! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['orderPassed'])):?>
          <p class="alert alert-success"> You have passed an order successfully! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['orderFinished'])):?>
          <p class="alert alert-success"> You have finished an order! </p>
        <?php endif; ?>

        <?php if(isset($_COOKIE['gameDeleteFail'])):?>
          <p class="alert alert-danger"> You cannot erase this game, someone added it to his cart! </p>
        <?php endif; ?>