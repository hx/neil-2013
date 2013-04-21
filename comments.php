<?php

class Neil2013_Comments {

    private static $count = null;

    public static function count() {
        if(self::$count === null) {
            self::$count = intval(get_comments_number(get_the_ID()));
        }
        return self::$count;
    }

    public static function renderComment($comment) {
        if(!$comment->comment_approved) {
            return;
        }
        echo '<li>';
        printf('<blockquote class="comment-content">“%s”</blockquote>', nl2br($comment->comment_content));
        printf('<cite class="comment-by-line">- <span class="comment-author">%s</span> on <span class="comment-date">%s</span></cite>',
                $comment->comment_author,
                date(get_option('date_format'), strtotime($comment->comment_date))
                );
        echo '</li>';
    }

}
$commentCount = Neil2013_Comments::count() ?>
<div class="n13-comments">
    <h5><?php
        if(!$commentCount) {
            echo 'Comments';
        } else {
            printf('%s comment%s', $commentCount, $commentCount === 1 ? '' : 's');
        }
        ?></h5>

    <?php if($commentCount) : ?>
        <ul><?php wp_list_comments(array('callback' => array('Neil2013_Comments', 'renderComment'))) ?></ul>
    <?php endif ?>

    <?php comment_form(array(
        'comment_notes_after'   => '',
        'comment_notes_before'  => '',
        'logged_in_as'          => '',
        'title_reply'           => '',
        'fields' => array(
            'author' => '<input placeholder="Name" id="author" name="author" type="text" value="'
                . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
            'email' => '<input placeholder="Email" id="email" name="email" type="text" value="'
                . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'
        ),
        'comment_field' => '<p class="comment-form-comment"><textarea placeholder="Your comment" id="comment" name="comment"
                aria-required="true"></textarea></p>'
    )) ?>

</div>