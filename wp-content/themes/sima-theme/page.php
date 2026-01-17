<?php

$pageid = get_the_ID();

include(locate_template('components/shared/header.php'));
include(locate_template('components/modules/_modules.php'));
?>
<div class="site-content">
    <?php if (is_front_page()) { ?>
        <?php include(locate_template('components/shared/subscription-form.php')); ?>
    <?php } ?>
    <div class="container">
        <?php if ( have_posts() ) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        } ?>
    </div>
</div>
<?php include(locate_template('components/shared/footer.php'));