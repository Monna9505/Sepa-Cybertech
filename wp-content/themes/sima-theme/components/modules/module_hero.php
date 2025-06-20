<?php
/**
 * Module Hero
 */
if (!isset($module)) { return; }

$hero_title = (isset($module['hero_title'])) ? $module['hero_title'] : false;
$hero_description = (isset($module['hero_description'])) ? $module['hero_description'] : false;
$register_button = (isset($module['register'])) ? $module['register'] : false;
$cta_button = (isset($module['cta_button'])) ? $module['cta_button'] : false;
$hero_image = (isset($module['hero_image'])) ? $module['hero_image'] : false;
?>

<div class="hero">
    <div class="container">
        <div class="hero__wrapper main-grid">
            <div class="hero__content">
                <?php if (!empty($hero_title)) { ?>
                    <h1 class="hero__title"><?php echo $hero_title; ?></h1>
                <?php } ?>
                <?php if (!empty($hero_description)) { ?>
                    <div class="hero__description"><?php echo $hero_description; ?></div>
                <?php } ?>
                <div class="buttons main-grid">
                    <?php if (isset($register_button['url']) && !empty($register_button['url'])) { ?>
                        <a href="<?php echo $register_button['url']; ?>" class="register main-button">
                            <?php echo $register_button['title']; ?>
                        </a>
                    <?php } ?>
                    <?php if (isset($cta_button['url']) && !empty($cta_button['url'])) { ?>
                        <a href="<?php echo $cta_button['url']; ?>" class="cta main-button">
                            <?php echo $cta_button['title']; ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset($hero_image['url']) && !empty($hero_image['url'])) { ?>
                <div class="hero__image">
                    <img src="<?php echo $hero_image['url']; ?>" alt="">
                    <div class="tear__shape__dark__blue"></div>
                    <div class="tear__shape__white"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>