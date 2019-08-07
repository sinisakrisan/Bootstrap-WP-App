<?php 
/* 
 *
 *Template Name: No Title
 *
 */ ?>

<?php get_header(); ?>
    <div id="wrapper">
        <?php get_sidebar(); ?>
            <div id="main">
                <?php get_template_part('navbar'); ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm my-3">
        	                   <?php get_template_part('loops/page-peepso'); ?>
                            </div>

        	                   <?php get_template_part('sidebar-right'); ?>
                            
                        </div>
                    </div>

<?php get_footer(); ?>