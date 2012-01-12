<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (function_exists('is_tag') && is_tag()) { echo 'Posts tagged &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="description" content="<?php get_bloginfo('description'); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
          	<ul class="nav"><?php wp_list_pages('title_li=&depth=1&number=5'); ?></ul>

          	<form method="get" id="searchForm" action="<?php echo home_url(); ?>/" class="pull-right">
            	<input class="input-medium" type="text" value="" name="s" id="s" placeholder="Search">
            	<button class="btn" type="submit">Search</button>
          	</form>

        </div>
      </div>
    </div>


    <div class="container">