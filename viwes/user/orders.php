<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/header.php"; ?>

<h1>Orders</h1>
<table class="main_info" border="2px solid black">
	<th>
		User
	</th>
	<th>
		Product
	</th>
	<th>
		Price
	</th>
	<th>
		Answer
	</th>
	<? while($row = $orders->fetch()):?>
		<tr>
			<td>
				<?=$row['login']?>
			</td>
			<td>
				<?=$row['name']?>
			</td>
			<td>
				<?=$row['price']?>
			</td>
			<td class="answer" style="border-left: 0; border-right: 0; border-top: 0;">
				<?if($row['status_id'] == '4'):?>
					<a href="/admin/update/1/<?=$row['id']?>" style="border: 0">Delete <i class="fas fa-trash"></i></a>
					<a href="/admin/update/2/<?=$row['id']?>" style="color: green">sent <i class="fas fa-angle-double-up"></i></a>
					<a href="/admin/update/3/<?=$row['id']?>" style="color: green">delivered <i class="fas fa-angle-double-down"></i></a>
				<?elseif ($row['status_id'] == 2):?>
					<p style="margin: 0;">sent <i class="fas fa-angle-double-up"></i></p>
					<a href="/admin/update/3/<?=$row['id']?>" style="color: green">delivered <i class="fas fa-angle-double-down"></i></a>
				<?elseif ($row['status_id'] == 3):?>
					<p>Delivered <i class="fas fa-angle-double-down"></i></p> 
				<?else: echo 'Deleted';?>
				<?endif;?>
			</td>
		</tr>
	<?endwhile;?>
</table>







<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/footer.php" ?>
<style>
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
        align-items: center;
	}
</style>
