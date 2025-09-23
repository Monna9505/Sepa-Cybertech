<?php
/**
 * Form for interested users to fill out
 */
?>
<div id="invest-modal" class="invest-modal">
    <div class="investment__form__wrapper">
        <div class="invest-modal-content">
            <span class="close-modal">&times;</span>
            <h3><?php echo __('I am interested in this bond', 'sima-theme'); ?></h3>
            <form id="invest-now-form">
                <input type="hidden" name="invest_nonce" value="<?php echo wp_create_nonce('invest_form_nonce'); ?>">
                <input type="hidden" name="product_name" id="product_name">
                <input type="text" name="full_name" placeholder="<?php echo __('Your Name', 'sima-theme'); ?>" required>
                <input type="email" name="email" placeholder="<?php echo __('Your Email', 'sima-theme'); ?>" required>
                <input type="text" name="country" placeholder="<?php echo __('Your Country', 'sima-theme'); ?>" required>
                <div class="form-checkbox">
                    <label>
                        <input type="checkbox" name="terms" required>
                        <?php echo __('I agree to the', 'sima-theme'); ?> 
                        <a href="<?php echo get_permalink(get_page_by_path('terms-and-conditions')); ?>" target="_blank">
                            <?php echo __('Terms and Conditions', 'sima-theme'); ?>
                        </a> 
                        <?php echo __('and', 'sima-theme'); ?> 
                        <a href="<?php echo get_permalink(get_page_by_path('privacy-policy')); ?>" target="_blank">
                            <?php echo __('Privacy Policy', 'sima-theme'); ?>
                        </a>.
                    </label>
                </div>
                <div class="submit__invest__form">
                    <button type="submit"><?php echo __('Submit', 'sima-theme'); ?></button>
                </div>
            </form>
            <div id="invest-response" style="display:none;"></div>
        </div>
    </div>
</div>