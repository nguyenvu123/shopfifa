<div class="header-cart header-dropdown">
    <?php 
        global $woocommerce;
                $items = $woocommerce->cart->get_cart();
                foreach($items as $item => $values) { 
                $_product =  wc_get_product( $values['data']->get_id());  
                $getProductDetail = wc_get_product( $values['product_id'] );
                $image = get_the_post_thumbnail_url($values['product_id'], ITEM_PRODUCT_MINICART);
                $quantity = $values['quantity'];
                $price = get_post_meta($values['product_id'] , '_price', true); 
                ?>
                 <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="<?=$image ?>" alt="acc fifa">
                    </div> 
                   
                    <div class="header-cart-item-txt">
                        <a href="<?= get_permalink($values['product_id']) ?>" class="header-cart-item-name">
                            <?= $_product->get_title() ?>
                        </a>
                     <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove remove_mini_cart" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $item ) ), esc_html__( 'Remove this item', 'wpdance' ) ), $item ); ?>

                        <span class="header-cart-item-info">
                            <?=$quantity ?>x<?= number_format($price) ?>đ
                        </span>
                    </div>
                </li>
            </ul>
            <?php } ?>
            <div class="header-cart-total">
                Tổng: <?=$woocommerce->cart->get_cart_total();?>
            </div>

            <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                    <!-- Button -->
                    <a href="/custom-checkout/" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Giỏ hàng
                    </a>
                </div>

                <div class="header-cart-wrapbtn">
                    <!-- Button -->
                    <a href="/cart-custom/" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Thanh toán
                    </a>
                </div>
            </div>
        </div>