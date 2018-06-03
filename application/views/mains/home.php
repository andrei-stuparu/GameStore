<marquee direction="right", speed=2, loop=3><h1 class="text-info" style="text-align:center;">WELCOME TO <em>WORLD-SIEGE</em> STORE</h1></marquee>

<div class="container-fluid" style="text-align: center;">
	<p class="text-info" >This is the <?=$title?> section</p>
    <?php if(!isset($_COOKIE['loginCustomer'])&&!isset($_COOKIE['loginManager'])):?>
	<p class="text-info">Would you like to:</p>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>games">Continue as guest</a></button>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>login">Login As Customer</a></button>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>login2">Login As Manager</a></button>
	<?php endif; ?>

	<?php if(isset($_COOKIE['loginCustomer'])):?>
	<p class="text-info">Would you like to:</p>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>shop">Check the Shop</a></button>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>cart">View Your Cart</a></button>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>orders">View Your Orders</a></button>
	<?php endif; ?>
	<?php if(isset($_COOKIE['loginManager'])):?>
	<p class="text-info">Would you like to:</p>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>shop">Check the Shop</a></button>
	<button style="align=center;" type="button" class="btn btn-info"><a href="<?php echo base_url(); ?>allOrders">View All Orders</a></button>
	
	<?php endif; ?>
</div>