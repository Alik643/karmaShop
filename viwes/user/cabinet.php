<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/header.php" ?>

	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row cabinet">
			<a href="/user/orders/<?=$_SESSION['user']?>">Show history of orders</a>
				<div class="col-lg-6 " >
					<div class="login_form_inner">
						<?php
						if($errors){
							foreach ($errors as $err){
								echo "<p style='color: red; margin: 5px auto; font-size: 18px;'>" . $err . "</p>" . "<br/>";
							}
						}elseif ($ok){
						    echo "<p style='color: lightgreen; margin: 5px auto; font-size: 18px;'>Datas were changed!</p> <br/>";
                        }
						?>
						<h3>Change dates</h3>


						<form class="row login_form" action="/user/change" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="login" name="login" placeholder="Username">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="oldPassword" placeholder="Old password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="newPassword" placeholder="New password">
							</div>
							<div class="col-md-12 form-group">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/footer.php" ?>
<style>
	.login_box_area{
		width: 100%;
	}
    body{
        height: 100vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
    }
    .header_area{
        position: static;
    }
    .sticky-wrapper{
        position: static;
    }
    .footer-area{
        width: 100%;
        padding: 25px 0;
    }
    footer{
        padding: 25px 0;
    }
	.main_info{
		width: 80%;
		margin: 0 auto;
	}
	td, th{
		text-align: center;
		padding: 5px;
	}
	.footer-text{
		padding: 0;
	}
	.answer{
        display: flex;
        justify-content: space-around;
	}
	.cabinet{
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
</style>