<?php echo head(array('bodyid'=>'home')); ?>

<aside id="intro" role="introduction">
    <p><?php echo option('description'); ?></p>
</aside>

<?php if (get_theme_option('Homepage Text')): ?>
<p><?php echo get_theme_option('Homepage Text'); ?></p>
<?php endif; ?>

<?php if ((get_theme_option('Display Featured Exhibit') !== '0')
        && plugin_is_active('ExhibitBuilder')
        && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
<!-- Featured Exhibit -->
<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>



<?php echo foot(); ?>
