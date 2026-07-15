<?php

/** 
 * Home Page Related Works
 */

// Page CSS Enqueue
function zswwc_enqueue_styles()
{
    wp_enqueue_style('zswwc_css', plugins_url('css/zswwc-styles.css', __FILE__), false, '1.0.0');
}

add_action('wp_enqueue_scripts', 'zswwc_enqueue_styles');

function zswwc_chat_button()
{
    if (!post_password_required()) {

        $chat_class = "zswwc__chat-box-";

        if (get_option('zswwc-icon-position')) {
            $chat_class .= get_option('zswwc-icon-position');
        } else {
            $chat_class = 'zswwc__chat-box-right';
        }
?>

        <!-- ZS Social Chat Button by ZS Software Studio -->
        <div class="<?php echo esc_attr($chat_class); ?>">
            <p><?php echo esc_html(get_option('zswwc-text-message')) ?></p>
            <img src="<?php echo esc_url(plugins_url('img/whatsapp.png', __FILE__)); ?>" alt="Chat Button" id="zswwc__chat-button" />
        </div>

        <!-- ZS Social Chat Button Script by ZS Software Studio -->
        <script>
            function redirectToWhatsApp() {
                const message = document.querySelector('.<?php echo esc_attr($chat_class) ?> p');
                message.classList.add('selected');

                setTimeout(() => {
                    window.open('https://api.whatsapp.com/send/?phone=<?php echo esc_html(get_option('zswwc-whatsapp-number')) ?>&text=<?php echo esc_html(get_option('zswwc-text-message')) ?>&type=phone_number')
                    message.classList.remove('selected')
                }, 3000)
            }

            const chatButton = document.querySelector('#zswwc__chat-button');

            chatButton.addEventListener('click', redirectToWhatsApp);
        </script>

<?php
    }
}

add_action('wp_footer', 'zswwc_chat_button');
