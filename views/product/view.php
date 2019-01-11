<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                       <div class="col-sm-6">
                            <!-- <div class="single-products">
                                <div class="view-product"> -->
                                    <div class="photoProduct"><a rel="img_group" class="s_b_photo" href="<?php echo Product::getImage($product['id']); ?>"><img src="<?php echo Product::getImage($product['id']); ?>"></a></div>
                                    <!-- <img src="<?php echo Product::getImage($product['id']); ?>" alt="" /> -->
                                <!-- </div>
                            </div> -->
                        </div>

                        <div class="col-sm-6">
                            <div class="product-information"><!--/product-information-->
                                
                                
                                <h2><?php echo $product['name'];?></h2>
                                <p>Код товара: <?php echo $product['code']; print_r($product);?></p>
                                <span>
                                    <span><?php echo Product::getPrice($product['price']);?></span>

                                    <button type="button" class="btn btn-fefault cart add-to-cart" data-id="<?php echo $product['id'];?>">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </button>
                                </span>
                                <p><b>Бренд:</b> <?php echo $product['brand'];?></p>
                                <p><b>Наличие:</b> <?php echo Product::getAvaibility($product['availability']);?></p>
                                <p><b>Состояние:</b> Новое</p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <?php echo $product['description'];?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>