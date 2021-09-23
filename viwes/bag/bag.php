<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/header.php"?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php
                        $ids = [];
                        if($products):
                        $items = (array)$_SESSION['products'];
                        foreach ($products as $item):

                            $ids[] = $item['id']?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img style="max-width: 200px;" src="/templates/img/upload/<?=$item['image']?>" alt="error">
                                        </div>
                                        <div class="media-body">
                                            <p><?=$item['name']?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$<?=$item['price']?></h5>
                                </td>
                                <td>
                                    <div class="product_count"> X   <?=$items[$item['id']]?></div>
                                </td>
                                <td>
                                    <h5><?php echo ((int)$items[$item['id']] * (int)$item['price'])?>$</h5>
                                </td>
                                <td>
                                    <a href="/bag/del/<?=$item['id']?>">&#x2715</a>
                                </td>
                            </tr>
						<?endforeach;
						else: echo "<p style='color: red;'>NO ITEMS</p>";
						endif;
						?>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5><?=$totalPrice?>$</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="primary-btn" href="/bag/buy/<?=$_SESSION['user']?>">Buy</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/layouts/footer.php"?>