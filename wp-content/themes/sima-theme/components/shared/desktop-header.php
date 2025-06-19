<div class="desktop__header__wrapper main-grid">
    <?php if (!empty($header_links) && is_array($header_links)) { ?>
        <div class="links">
            <?php foreach ($header_links as $link) { ?>
                <?php if (isset($link['link']['url']) && !empty($link['link']['url'])) { ?>
                    <a href="<?php echo $link['link']['url']; ?>" class="link">
                        <?php echo $link['link']['title']; ?>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
    <?php if (isset($register['url']) && !empty($register['url'])) { ?>
        <a href="<?php echo $register['url']; ?>" class="register main-button">
            <?php echo $register['title']; ?>
        </a>
    <?php } ?>
</div>