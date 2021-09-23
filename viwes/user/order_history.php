<?php require_once $_SERVER['DOCUMENT_ROOT']  . "/templates/layouts/header.php";?>



<table>
	<th> Number </th>
	<th> Picture </th>
	<th> Title </th>
	<th> Count </th>
	<th> Price </th>
	<th> Status </th>
	<?php
	$i=1;
	while($row = $orders->fetch()):?>
	
	<tr>
		<td>
			<?=$i?>
		</td>
		<td>
			<img class="order_img" src="../../templates/img/upload/<?=$row['image']?>" alt="error">
		</td>
		<td>
			<?=$row['pr_name']?>
		</td>
		<td>
			X <?=$row['product_count']?>
		</td>
		<td>
			<?=$row['price']?>$
		</td>
		<td>
			<?=$row['name']?>
		</td>
	</tr>
	<?php
	$i++;
	endwhile;?>
</table>
<?php require_once $_SERVER['DOCUMENT_ROOT']  . "/templates/layouts/footer.php";?>
<style>
	table{
		width: 100%;
        margin-bottom: 50px;
	}
    table tr{
        margin: 5px 0;
    }
	.order_img{
		max-width: 150px;
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
        min-width: 100%;
    }
    .navbar{
        min-width: 100%;
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
	tr{
		border-bottom: 1px solid #ccc;
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
</style>
