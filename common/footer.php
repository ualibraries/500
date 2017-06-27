</article>

        <footer>
                <?php echo get_theme_option('Footer Text'); ?>

            <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

        </footer>
</body>
</html>