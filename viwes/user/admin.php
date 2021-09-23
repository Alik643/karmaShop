<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/header.php"; ?>


	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Administration</h1>
					<nav class="d-flex align-items-center">
						<a href="../../index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="../../index.php">Administration</a>
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
				<div class="col-lg-6 create_prod" style="margin: 0 auto; text-align: center">
                    <a href="/admin/orders">Show Orders</a>
					<div class="login_form_inner">
						<?php
						if($errors){
							foreach ($errors as $err){
								echo "<p style='color: red; margin: 5px auto'>" . $err . "</p>" . "<br/>";
							}
						}
						?>


						<h3>create a new product</h3>


						<form class="row login_form" action="/admin/add" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
							<div class="col-md-12 form-group">
								<input type="file" class="form-control" name="image">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="name" placeholder="name" >
							</div>
							<div class="col-md-12 form-group">
								<input type="number" min="1" class="form-control" name="price" placeholder="Price" >
							</div>
							<div class="col-md-12 form-group">
                                <textarea type="number" min="1" value="1" class="form-control" name="description" placeholder="description"></textarea>
							</div>
                            <div class="col-md-12 form-group">
                                <input type="number" min="1" value="1" class="form-control" name="width" placeholder="width">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" min="1" value="1" class="form-control" name="height" placeholder="height">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" min="1" value="1" class="form-control" name="depth" placeholder="depth">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" min="1" value="1" class="form-control" name="Weight" placeholder="Weight">
                            </div>

                            <div class="col-md-12 ">
                                <label class="label"> is top? <input type="checkbox" value="1" class="form-control" name="is_top" id="top"></label>
                            </div>
                            <div class="col-md-12">
                                <label class="label">comming soon?<input type="checkbox" value="1" class="form-control" name="is_soon" id="soon"></label>
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


<style>
    .label{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    .label input{
        width: 20px;
        outline: 0;
        border: 0;
    }
    .label input:focus{
        border: 0;
        outline: 0;
    }
</style>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/footer.php";