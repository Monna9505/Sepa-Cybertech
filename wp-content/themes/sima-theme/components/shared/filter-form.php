<?php
/**
 * Filter form for financial products
 */
$country        = isset($_POST['country']) ? sanitize_text_field($_POST['country']) : '';
$amount_min     = isset($_POST['amount_min']) ? floatval($_POST['amount_min']) : '';
$duration_table = get_field('duration_table', 'option') ?: false;
$interest_min   = isset($_POST['interest_min']) ? floatval($_POST['interest_min']) : '';

/**
 * Getting all the countries from my 'country' taxonomy
 */
$countries = get_terms(array(
    'taxonomy'   => 'country',
    'hide_empty' => false,
));
?>

<form method="POST" id="bonds-filter-form" class="main-grid">
    <div class="countries">
        <p class="select__country"><?php echo __('Country', 'sima-theme'); ?></p>
        <select name="country">
            <?php if (!is_wp_error($countries) && !empty($countries)) {
                foreach ($countries as $c) { ?>
                    <option value="<?php echo esc_attr($c->slug); ?>" <?php selected($country, $c->slug); ?>>
                        <?php echo esc_html($c->name); ?>
                    </option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
    <div class="investment__amount__select">
        <label for="amount_min"><?php echo __('Investment amount', 'sima-theme'); ?></label>
        <input type="number" name="amount_min" value="<?php echo esc_attr($amount_min); ?>">
    </div>
    <?php if (!empty($duration_table) && is_array($duration_table)) { ?>
        <div class="duration__wrapper">
            <p class="duration__text__select">
                <?php echo __('Duration', 'sima-theme'); ?>
            </p>
            <div class="duration">
                <input type="number" name="duration_number" placeholder="<?php echo __('Duration value', 'sima-theme'); ?>" min="1">
                <select name="duration_unit">
                    <option value=""><?php echo __('Duration', 'sima-theme'); ?></option>
                    <?php foreach ($duration_table as $unit) { ?>
                        <?php if (isset($unit['duration_unit']) && !empty($unit['duration_unit'])) { ?>
                            <option value="<?php echo esc_attr($unit['duration_unit']); ?>" <?php selected(isset($_POST['duration_value']) ? $_POST['duration_value'] : '', $unit['duration_unit']); ?>>
                                <?php echo esc_html($unit['duration_unit']); ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
    <?php } ?>
    <div class="interest__rate">
        <p class="interest__rate__text__select">
            <?php echo __('Interest rate', 'sima-theme'); ?>
        </p>
        <select name="interest_min">
            <option value=""><?php echo __('Interest rate', 'sima-theme'); ?></option>
            <option value="0.2" <?php selected($interest_min, 1); ?>>Over 0.2%</option>
            <option value="2.5" <?php selected($interest_min, 2.5); ?>>Over 2.5%</option>
            <option value="3" <?php selected($interest_min, 3); ?>>Over 3%</option>
        </select>
    </div>
    <div class="filter__products">
        <button type="submit"><?php echo __('Filter', 'sima-theme'); ?></button>
    </div>
</form>