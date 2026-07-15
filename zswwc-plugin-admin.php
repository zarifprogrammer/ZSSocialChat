<?php

/**
 * Plugin Menu Option
 */
function zswwc_plugin_menu()
{
    add_menu_page('ZS Social Chat by ZS Software Studio',  'ZS Social Chat', 'manage_options', 'zs-social-chat', 'zswwc_admin_page', plugins_url('img/logo.svg', __FILE__), 101);
}

add_action('admin_menu', 'zswwc_plugin_menu');

/** 
 * Plugin Page Related Works
 */

// Page CSS Enqueue
function zswwc_admin_enqueue_styles()
{
    wp_enqueue_style('zswwc_admin_enqueue', plugins_url('css/zswwc-admin-styles.css', __FILE__), false, '1.0.0');
}

add_action('admin_enqueue_scripts', 'zswwc_admin_enqueue_styles');


// Page Content
function zswwc_admin_page()
{
?>
    <div class="zswwc__main">
        <img src="<?php echo esc_url(plugins_url('img/logo.png', __FILE__)); ?>" alt="ZS Social Chat by ZS Software Studio" class="zswwc__logo">
        <h1>
            ZS Social Chat
        </h1>
        <p><?php echo esc_html(__('ZS Social Chat will allow you to add chat button in the bottom of your site. Clicking the button will redirect your website users to your WhatsApp.', 'zswwc')); ?></p>

        <form action="options.php" method="post" class="zswwc__form">
            <?php wp_nonce_field('update-options'); ?>

            <div class="zswwc__input">
                <label for="zswwc-whatsapp-number">WhatsApp Number (With Country Code)</label>
                <input id="zswwc-whatsapp-number" name="zswwc-whatsapp-number" value="<?php print get_option('zswwc-whatsapp-number'); ?>" type="phone" required placeholder="Enter your WhatsApp Number">
            </div>

            <div class="zswwc__input">
                <label for="zswwc-text-message">Message (Customers will send you this message as a first message)</label>
                <input id="zswwc-text-message" name="zswwc-text-message" value="<?php print get_option('zswwc-text-message'); ?>" required type="text" placeholder="I need a Help">
            </div>

            <div class="zswwc__input">
                <label for="zswwc-icon-position">Icon Position in front end</label>
                <select id="zswwc-icon-position" name="zswwc-icon-position" required>
                    <option value="left" <?php if (get_option('zswwc-icon-position') == 'left') {
                                                echo esc_attr("selected");
                                            } ?>>Left</option>
                    <option value="right" <?php if (get_option('zswwc-icon-position') == 'right') {
                                                echo esc_attr("selected");
                                            } ?>>Right</option>
                </select>


            </div>

            <input type="hidden" name="action" value="update">
            <input type="hidden" name="page_options" value="zswwc-whatsapp-number, zswwc-icon-position, zswwc-text-message">

            <input type="submit" name="submit" class="button button-primary" value="<?php _e('Save Changes', 'zswwc'); ?>">
        </form>

        <p class="zswwc__copyright">ZS Social Chat is developed & maintained by <a href="https://studio.zarifprogrammer.com" target="_blank">ZS Software Studio</a></p>

        <!-- Donation Button -->
        <a class='zswwc__donate-button' href="https://buymeacoffee.com/zarifprogrammer" target="_blank">
            <img src="<?php echo esc_url(plugins_url('img/buymeacoffee.svg', __FILE__)); ?>" alt="Chat Button" />
        </a>
    </div>

<?php
}
?>