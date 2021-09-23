<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/header.php"?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Registeration</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Registeration</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6" style="margin: 0 auto;">
					<div class="login_form_inner">
                        <?php
                        if($errors){
                            foreach ($errors as $err){
                                echo "<p style='color: red; margin: 5px auto'>" . $err . "</p>" . "<br/>";
                            }
                        }
                        ?>
						<h3>create a new accaunt</h3>


						<form class="row login_form" action="/user/new" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="login" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="country" placeholder="Country" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Create</button>
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<? require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/footer.php"?>