<?php
/**
 * Module Zig Zag
 */
if (!isset($module)) { return; }

$zig_zag = (isset($module['zig_zag_repeater'])) ? $module['zig_zag_repeater'] : false; //Repeater
?>
<div class="zig_zag_component">
    <?php if (!empty($zig_zag) && is_array($zig_zag)) { ?>
        <?php foreach($zig_zag as $item) { ?>
            <div class="item <?php echo (isset($item['with_blue_background']) && !empty($item['with_blue_background'])) ? 'with-background' : ''; ?>">
                <div class="container">
                    <div class="item_wrapper <?php echo $item['select_position_image']; ?>">
                        <div class="img_wrapper">
                            <?php if (isset($item['image']) && !empty($item['image'])) { ?>
                                    <img src="<?php echo $item['image']['url']; ?>" 
                                        alt="<?php echo $item['image']['title']; ?>">
                                    <div class="tear__shape__dark__blue"></div>
                            <?php } ?>
                        </div>
                        <div class="text_wrapper">
                            <?php if (isset($item['main_title']) && !empty($item['main_title'])) { ?>
                                <div class="main_title">
                                    <h2><?php echo $item['main_title']; ?></h2>
                                </div>
                            <?php } ?>
                            <?php if (isset($item['description']) && !empty($item['description'])) { ?>
                                <div class="descr">
                                    <p><?php echo $item['description']; ?></p> 
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="extra-triangle"></div>
            </div>
        <?php } ?>
    <?php } ?>
</div>