<?php


class ThemeUtils
{
    /**
     * OPEN TAG <a>
     * Wrap content with Home page link
     * if it's not the Home page
     * @param string $class
     * @return string
     */
    public static function maybeHomeLinkStart($class = '')
    {
        if (!is_front_page()) : ?>
            <a href="<?= get_site_url(); ?>"<?= ($class) ? ' class="' . $class . '"' : ''; ?>>
        <?php endif;
    }

    /**
     * CLOSE TAG </a>
     * Wrap content with Home page link
     * if it's not the Home page
     * @return string
     */
    public static function maybeHomeLinkEnd()
    {
        if (!is_front_page()) : ?>
            </a>
        <?php endif;
    }
}
