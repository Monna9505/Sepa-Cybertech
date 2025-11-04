<?php
/**
 * Module Latest Products
 */
if (!isset($module)) { return; }

$latest_products_title = (isset($module['latest_products_title'])) ? $module['latest_products_title'] : false;
$choose_latest_products = (isset($module['choose_latest_products'])) ? $module['choose_latest_products'] : false;
$invest_button = (isset($module['invest_button'])) ? $module['invest_button'] : false;
?>

<div class="latest__products">
    <div class="triangle"></div>
    <div class="container">
        <?php if (!empty($latest_products_title)) { ?>
            <h2 class="latest__products__title">
                <?php echo $latest_products_title; ?>
            </h2>
        <?php } ?>
        <?php if (!empty($choose_latest_products) && is_array($choose_latest_products)) { ?>
            <div class="products main-grid">
                <?php foreach ($choose_latest_products as $product_info) { 
                    $product_interest_rate = get_field('interest_rate', $product_info->ID) ?: false;
                    $product_image = get_the_post_thumbnail_url($product_info->ID, 'full');
                    $credit_rating = get_field('credit_rating', $product_info->ID);
                    $tax = get_field('witholding_tax', $product_info->ID) ?: false;
                    $country = wp_get_post_terms($product_info->ID, 'country')[0]; 
                    ?>
                    <div class="investment__bond">
                        <?php if (!empty($product_image)) { ?>
                            <div class="product__image">
                                <img src="<?php echo $product_image; ?>" alt="">
                            </div>
                        <?php } ?>
                        <div class="product__content">
                            <?php if (!empty($product_interest_rate)) { ?>
                                <p class="product__interest__rate">
                                    <?php echo $product_interest_rate . '%'; ?>
                                </p>
                            <?php } ?>
                            <?php if (!empty($credit_rating) && is_array($credit_rating)) { ?>
                                <div class="ratings">
                                    <?php foreach ($credit_rating as $rating) { ?>
                                        <?php if (isset($rating['rating']) && !empty($rating['rating'])) { ?>
                                            <div class="latest-products__country-and-rating main-grid">
                                                <p class="country"><?php echo $country->name; ?></p>
                                                <p class="rating">(<?php echo $rating['rating']; ?>)</p>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tax">
                            <p class="<?php echo $tax ? 'no-tax' : 'simplified'; ?>">
                                <?php echo $tax ? __('no withholding tax', 'sima-theme') : __('Simplified tax payment', 'sima-theme'); ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if (isset($invest_button['url']) && !empty($invest_button['url'])) { ?>
            <div class="invest__button">
                <a href="<?php echo $invest_button['url']; ?>" class="main-button">
                    <?php echo $invest_button['title']; ?>
                </a>
            </div>
        <?php } ?>
    </div>
</div>