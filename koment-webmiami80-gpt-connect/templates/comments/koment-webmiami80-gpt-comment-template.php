<?php
// templates/comments/koment-webmiami80-gpt-comment-template.php

/**
 * Szablon komentarza dla wtyczki Koment WebMiami80 GPT Connect.
 *
 * @package Koment_WebMiami80_GPT_Connect
 */

if (!defined('WPINC')) {
    die;
}

/**
 * Funkcja do wyświetlania szablonu komentarza.
 *
 * @param object $comment Obiekt komentarza.
 * @param array  $args    Tablica argumentów przekazanych do funkcji wp_list_comments().
 * @param int    $depth   Głębokość komentarza.
 */
function koment_webmiami80_gpt_comment_template($comment, $args, $depth) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php echo get_avatar($comment, 48); ?>
                    <?php printf('<b class="fn">%s</b>', get_comment_author_link()); ?>
                    <span class="says"><?php esc_html_e('says:', 'koment-webmiami80-gpt-connect'); ?></span>
                </div><!-- .comment-author -->

                <div class="comment-metadata">
                    <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
                        </time>
                    </a>
                    <?php edit_comment_link(esc_html__('Edit', 'koment-webmiami80-gpt-connect'), '<span class="edit-link">', '</span>'); ?>
                </div><!-- .comment-metadata -->

                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'koment-webmiami80-gpt-connect'); ?></p>
                <?php endif; ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <div class="reply">
                <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<span class="reply">',
                            'after'     => '</span>',
                        )
                    )
                );
                ?>
            </div><!-- .reply -->
        </article><!-- .comment-body -->
    </<?php echo $tag; ?>>
<?php
}
