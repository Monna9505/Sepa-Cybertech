<?php
/**
 * AJAX Callback for filtering investment products
 */
add_action('wp_ajax_filter_investment_bonds', 'filter_investment_bonds_callback');
add_action('wp_ajax_nopriv_filter_investment_bonds', 'filter_investment_bonds_callback');

function filter_investment_bonds_callback() {
    check_ajax_referer('investment_bonds_filter_nonce', 'nonce');

    // --- Reading the data from the form ---
    $country         = isset($_POST['country']) ? sanitize_text_field($_POST['country']) : '';
    $user_amount     = isset($_POST['amount_min']) ? floatval($_POST['amount_min']) : 0;
    $duration_number = isset($_POST['duration_number']) ? floatval($_POST['duration_number']) : 1; // default 1
    $duration_unit   = isset($_POST['duration_unit']) ? strtolower(sanitize_text_field($_POST['duration_unit'])) : 'months';
    $interest_min    = isset($_POST['interest_min']) ? floatval($_POST['interest_min']) : 0;

    // --- Convert duration to fraction of year ---
    switch($duration_unit) {
        case 'days':
            $duration_in_years = $duration_number / 365.25;
            break;
        case 'months':
            $duration_in_years = $duration_number / 12;
            break;
        case 'years':
        default:
            $duration_in_years = $duration_number;
            break;
    }

    // --- WP Query ---
    $args = [
        'post_type'      => 'investment_bonds_cpt',
        'posts_per_page' => -1,
        'tax_query'      => [],
        'meta_query'     => [],
    ];

    if (!empty($country)) {
        $args['tax_query'][] = [
            'taxonomy' => 'country',
            'field'    => 'slug',
            'terms'    => $country
        ];
    }

    if ($interest_min > 0) {
        $args['meta_query'][] = [
            'key'     => 'interest_rate',
            'value'   => $interest_min,
            'compare' => '>=',
            'type'    => 'NUMERIC'
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) { ?>
        <div class="filtered-products">
            <table>
                <thead>
                    <tr>
                        <th class="interest__rate__text"><?php echo __('Interest rate', 'sima-theme'); ?></th>
                        <th class="duration__text"><?php echo __('Duration', 'sima-theme'); ?></th>
                        <th class="bank__text"><?php echo __('Bank', 'sima-theme'); ?></th>
                        <th class="country"><?php echo __('Country', 'sima-theme'); ?></th>
                        <th class="investment__income__text"><?php echo __('Investment income', 'sima-theme'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($query->have_posts()) {
                        $query->the_post();
                        $post_id = get_the_ID();
                        $featured_image = get_the_post_thumbnail_url($post_id, 'medium');

                        // --- Getting the ACF fields ---
                        $ratings       = get_field('credit_rating', $post_id);
                        $interest_rate = floatval(get_field('interest_rate', $post_id));
                        $min_inv       = floatval(get_field('minimal_investment', $post_id));
                        $bank_name     = get_field('bank_name', $post_id) ?: get_the_title();

                        // --- Principal = user input or minimal investment ---
                        $principal = ($user_amount > 0) ? $user_amount : $min_inv;

                        // --- Calculating the yield ---
                        $income = $principal * ($interest_rate / 100) * $duration_in_years;

                        // --- Collecting the credit ratings (repeater) ---
                        $rating_list = [];
                        if ($ratings && is_array($ratings)) {
                            foreach ($ratings as $r) {
                                if (isset($r['rating'])) {
                                    $rating_list[] = $r['rating'];
                                }
                            }
                        }
                        ?>
                        <tr class="product__item" style="border: 1px solid #000;">
                            <td class="interest_rate">
                                <p><?php echo $interest_rate ? esc_html($interest_rate) . ' %' : '-'; ?></p>
                            </td>
                            <td class="duration">
                                <p><?php echo esc_html($duration_number) . ' ' . ucfirst($duration_unit); ?></p>
                            </td>
                            <td class="bank__img">
                                <?php if (!empty($featured_image)) : ?>
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($bank_name); ?>">
                                <?php else : ?>
                                    <?php echo esc_html($bank_name); ?>
                                <?php endif; ?>
                            </td>
                            <td class="country__and__rating__list">
                                <?php if (!empty($country)) : ?>
                                    <p class="country"><?php echo esc_html($country); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($rating_list)) : ?>
                                    <p class="rating">(<?php echo esc_html(implode(', ', $rating_list)); ?>)</p>
                                <?php endif; ?>
                            </td>
                            <td class="investment__income">
                                <p class="income"><?php echo $income > 0 ? '+' . number_format($income, 3) . ' €' : '-'; ?></p>
                                <button class="invest-now-btn main-button" data-product="<?php echo esc_attr(get_the_title()); ?>">
                                    <?php echo __('Invest Now', 'sima-theme'); ?>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php wp_reset_postdata();
    } else { ?>
        <div class="no-products-found">
            <p><?php echo __('No products found for this filter.', 'sima-theme'); ?></p>
        </div>
    <?php }

    echo ob_get_clean();
    wp_die();
}