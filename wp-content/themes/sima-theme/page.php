<?php

$pageid = get_the_ID();

include(locate_template('components/shared/header.php'));
?>
<div class="site-content">
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