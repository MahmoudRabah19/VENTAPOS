
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home text-white"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="index.php?page=sales" class="nav-item nav-sales text-white"><span class='icon-field'><i class="fa fa-clipboard-list "></i></span> Sales</a>
				<a href="pos/index.php" class="nav-item nav-pos text-white"><span class='icon-field'><i class="fa fa-file-invoice "></i></span> POS</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=inventory" class="nav-item nav-inventory text-white"><span class='icon-field'><i class="fa fa-list "></i></span> Inventory</a>
				<a href="index.php?page=products" class="nav-item nav-products text-white"><span class='icon-field'><i class="fa fa-tshirt "></i></span> Products</a>
				<?php endif; ?>
				<a href="index.php?page=sales_report" class="nav-item nav-sales_report text-white"><span class='icon-field'><i class="fa fa-th-list"></i></span> Sales Report</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users text-white"><span class='icon-field'><i class="fa fa-users "></i></span> Users</a>
				<!-- <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> System Settings</a> -->
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
