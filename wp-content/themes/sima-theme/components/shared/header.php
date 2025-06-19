<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<?php
$site_logo = get_field('site_logo', 'option') ?: false;
$header_links = get_field('header_links', 'option') ?: false;
$register = get_field('register_button', 'option') ?: false
?>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="container">
            <div class="header__wrapper main-grid">
                <?php if (isset($site_logo['url']) && !empty($site_logo['url'])) { ?>
                    <a href="/" class="site__logo">
                        <img src="<?php echo $site_logo['url']; ?>" alt="">
                    </a>
                <?php } ?>
                <div class="desktop__header">
                    <?php include(locate_template('components/shared/desktop-header.php')); ?>
                </div>
                <div class="mobile__header">
                    <?php include(locate_template('components/shared/mobile-header.php')); ?>
                </div>
            </div>
        </div>
    </header>
</html>