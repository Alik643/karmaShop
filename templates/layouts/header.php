<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?$_SERVER['DOCUMENT_ROOT']?>/templates/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
          integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/linearicons.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/themify-icons.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/bootstrap.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/owl.carousel.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/nice-select.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/nouislider.min.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/magnific-popup.css">
	<link rel="stylesheet" href="<?$_SERVER["DOCUMENT_ROOT"]?>/templates/css/main.css">
</head>

<body>
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="/"><img src="<?$_SERVER['DOCUMENT_ROOT']?>/templates/img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							   aria-expanded="false">Shop</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
								<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
								<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
								<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
								<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							   aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
								<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							   aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li class="nav-item" <?if(isset($_SESSION['user'])){?> style='display: none' <?}?>><a class="nav-link" href="/user">Login</a></li>
								<?if(!empty($_SESSION['user']) and $_SESSION['user'] != 'root'){?>
								    <li class="nav-item">
                                        <a class="nav-link" href="/user/cabinet">Cabinet</a>
                                    </li>
                                <?}?>
								<li class="nav-item" <?if(!isset($_SESSION['user'])){?> style='display: none' <?}?>><a class="nav-link" href="/out">LogOut</a></li>
								<?if($_SESSION['user'] == 'root'){ echo '<li class="nav-item" ><a class="nav-link" href="/admin">Administration</a></li>'; }?>
								<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
								<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						<?if (isset($_SESSION['user'])):?>
                            <li class="nav-item"><a class="nav-link" href="contact.html"><?=user::getLogin($_SESSION['user'])?></a></li>
						<?endif;?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
                            <a href="/bag" class="cart" style="color: #000;">
                                (<span class="countOfProds"><?=Bag::countOfProductsInBag()?></span>)
                                <span class="ti-bag"></span>
                            </a>
                        </li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>
