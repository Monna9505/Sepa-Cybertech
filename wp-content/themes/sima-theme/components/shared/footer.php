<?php
    $footer_links = get_field('footer_links', 'option') ?: false;
    $legal_links = get_field('legal_links', 'option') ?: false;
    $copyright_text = get_field('copyright_text', 'option') ?: false;
?>
<footer>
    <div class="container">
        <?php if (!empty($footer_links) && is_array($footer_links)) { ?>
            <div class="footer__links main-grid">
                <?php foreach ($footer_links as $key=>$f_link) { ?>
                    <div class="footer__column">
                        <?php if (isset($f_link['column_heading']) && !empty($f_link['column_heading'])) { ?>
                            <h4 class="col__heading">
                                <?php echo $f_link['column_heading']; ?>
                            </h4>
                        <?php } ?>
                        <?php if (isset($f_link['footer_links']) && !empty($f_link['footer_links']) && is_array($f_link['footer_links'])) { ?>
                            <ul class="links">
                                <?php foreach ($f_link['footer_links'] as $link) { ?>
                                    <?php if (isset($link['link']['url']) && !empty($link['link']['url'])) { ?>
                                        <li class="link">
                                            <a href="<?php echo $link['link']['url']; ?>">
                                                <?php echo $link['link']['title']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="legal">
            <?php if (!empty($legal_links) && is_array($legal_links)) { ?>
                <ul class="legal__links main-grid">
                    <?php foreach ($legal_links as $l_link) { ?>
                        <?php if (isset($l_link['legal_link']['url']) && !empty($l_link['legal_link']['url'])) { ?>
                            <li class="legal__link">
                                <a href="<?php echo $l_link['legal_link']['url']; ?>">
                                    <?php echo $l_link['legal_link']['title']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            <?php } ?>
            <?php if (!empty($copyright_text)) { ?>
                <p class="copyright__text"><?php echo $copyright_text; ?></p>
            <?php } ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>