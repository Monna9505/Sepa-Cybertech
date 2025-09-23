<?php
/**
 * Module Investment Bonds Products
 */
if (!isset($module)) { return; }

$ibp_title    = (isset($module['ibp_title'])) ? $module['ibp_title'] : false;
$country      = isset($_POST['country']) ? sanitize_text_field($_POST['country']) : '';
$amount_min   = isset($_POST['amount_min']) ? floatval($_POST['amount_min']) : '';
$duration_val = isset($_POST['duration_value']) ? sanitize_text_field($_POST['duration_value']) : '';
$interest_min = isset($_POST['interest_min']) ? floatval($_POST['interest_min']) : '';
?>

<div class="investment__bonds__products">
    <div class="container">
        <?php if (!empty($ibp_title)) { ?>
            <h2 class="ibp__title"><?php echo $ibp_title; ?></h2>
        <?php } ?>
    </div>
     <div class="filter__form">
        <?php include(locate_template('components/shared/filter-form.php')); ?>
    </div>
    <div class="container">
        <div id="filtered-products-container"></div>
        <div class="load-more-wrapper" style="display: none;">
            <button id="load-more-btn" data-paged="1">Load More</button>
        </div>
        <?php include(locate_template('components/shared/invest-form.php')); ?>
    </div>
</div>