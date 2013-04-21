            </div>
            <div class="n13-sidebar-bg">
                <div class="n13-shadow"></div>
            </div>
            <footer class="n13-footer">
                <?php if($img = get_theme_mod('n13_footer_image')): ?>
                    <img src="<?php echo $img ?>" alt="<?php bloginfo('title') ?>" class="n13-footer-image">
                <?php endif ?>
            </footer>
        </div>
    </div>
    <?php wp_footer() ?>
</body>
</html>
