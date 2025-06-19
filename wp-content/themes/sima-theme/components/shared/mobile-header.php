<div class="mobile__header__wrapper">
    <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <?php if (!empty($header_links) && is_array($header_links)) { ?>
        <div class="mobile__links">
            <?php foreach ($header_links as $link) { ?>
                <?php if (isset($link['link']['url']) && !empty($link['link']['url'])) { ?>
                    <a href="<?php echo $link['link']['url']; ?>" class="link">
                        <?php echo $link['link']['title']; ?>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
</div>