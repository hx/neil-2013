                <div class="n13-copyright">
                    &copy; <?php echo date('Y') . ' ' . $_SERVER['SERVER_NAME'] ?>
                </div>
            </div>
            <div class="n13-sidebar-bg">
                <div class="n13-shadow"></div>
            </div>
            <footer class="n13-footer">
                <?php if($img = get_theme_mod('n13_footer_image')): ?>
                    <img src="<?php echo $img ?>" alt="<?php bloginfo('title') ?>" class="n13-footer-image">
                <?php endif ?>
                <ul class="n13-widgets">
                    <?php if($tweet = Neil2013::latestTweet()) : ?>
                        <li class="n13-widget tweet">
                            <h6 class="n13-widget-title">
                                <a href="//twitter.com/<?php echo $tweet->screenName ?>"
                                   title="@<?php echo $tweet->screenName ?> on Twitter.com">
                                    @<?php echo $tweet->screenName ?>
                                </a>
                            </h6>
                            <div class="tweet-content">“<?php echo Neil2013::detectUrls($tweet->description) ?>”</div>
                            <div class="tweet-date">
                                <a href="<?php echo $tweet->link ?>" title="View this tweet on Twitter.com">
                                    Tweeted on <?php echo date(get_option('date_format'), $tweet->pubDate) ?>
                                </a>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php dynamic_sidebar('n13_footer_widgets') ?>
                </ul>
            </footer>
        </div>
    </div>
    <?php wp_footer() ?>
</body>
</html>
