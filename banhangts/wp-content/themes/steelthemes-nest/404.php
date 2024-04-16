<?php
/*
**==============================   
**Nest Ecommerce Search File
**==============================
*/
get_header();
$error_image = '';
if(!empty($nest_theme_mod['404_image'])):
    $error_image = get_theme_mod('404_image');
else:
    $error_image = get_template_directory_uri().'/assets/images/page-404.png'; 
endif;
?>
<main class="main page-404">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img src="<?php echo esc_url($error_image); ?>" alt="" class="hover-up"></p>
                        <h1 class="display-2 mb-30"><?php echo esc_html_e( 'Page Not Found', 'steelthemes-nest' ); ?> </h1>
                        <p class="font-lg text-grey-700 mb-30">
                        <?php echo esc_html_e( 'The page you are looking for was moved, removed, renamed or never existed.', 'steelthemes-nest' ); ?>
                    </p>
                    <div class="search-form">
                        <?php  do_action('nest_custom_search_setup'); ?>
                    </div>
                    <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="<?php echo esc_url(home_url()); ?>"><i class="fi-rs-home mr-5"></i> <?php esc_html_e('Back to home', 'steelthemes-nest'); ?></a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer();?>