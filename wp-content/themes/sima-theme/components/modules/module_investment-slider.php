<?php
/**
 * Module Investment slider
 */
if (!isset($module)) { return; }

$investment_slider = (isset($module['investment_slider'])) ? $module['investment_slider'] : false;
?>
<div class="investment__slider">
    <div class="container">
        <?php if (!empty($investment_slider) && is_array($investment_slider)) { ?>
            <div class="<?php echo (count($investment_slider) > 4) ? 'slider' : 'columns'; ?>">
                <?php foreach ($investment_slider as $slide) { ?>
                    <div class="slide">
                        <?php if (isset($slide['slider_image']['url']) && !empty($slide['slider_image']['url'])) { ?>
                            <div class="slide__img">
                                <img src="<?php echo $slide['slider_image']['url']; ?>" alt="">
                            </div>
                        <?php } ?>
                        <?php if (isset($slide['slide_title']) && !empty($slide['slide_title'])) { ?>
                            <h3 class="slide__title">
                                <?php echo $slide['slide_title']; ?>
                            </h3>
                        <?php } ?>
                        <?php if (isset($slide['slide_description']) && !empty($slide['slide_description'])) { ?>
                            <div class="slide__descr">
                                <?php echo $slide['slide_description']; ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($slide['slide_button']['url']) && !empty($slide['slide_button']['url'])) { ?>
                            <div class="slide__button">
                                <a href="#" class="main-button">
                                    <?php echo $slide['slide_button']['title']?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>