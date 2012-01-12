<?php
/*
Template Name: Archive Index
*/
?>
<?php get_header(); ?>
<div class="content row">
	<div class="span12">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post-page">
			<?php
				// Declare some helper vars
				$previous_year = $year = 0;
				$previous_month = $month = 0;
				$ul_open = false;
				// Get the posts
				$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
				?>
				<?php foreach($myposts as $post) : ?>	
				<div class="archive-entry">
				<?php
				// Setup the post variables
				setup_postdata($post);
				$year = mysql2date('Y', $post->post_date);
				$month = mysql2date('n', $post->post_date);
				$day = mysql2date('j', $post->post_date);
				?>
				<?php if($year != $previous_year || $month != $previous_month) : ?>
				<?php if($ul_open == true) : ?>
				</ul>
				<?php endif; ?>
				<h2 class="year_archive"><?php the_time('Y'); ?></h2>
				<ul class="month_archive">
				<?php $ul_open = true; ?>
				<?php endif; ?>
				<?php $previous_year = $year; $previous_month = $month; ?>
				<li><span class="the_article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>  &mdash; </a></span>
				<span class="the_day"><?php the_time('F j'); ?></span> </li>
				<?php endforeach; ?>
				</ul>
				</div>
		</div>
		<?php endwhile; else: ?>
		<?php endif; ?>
	</div>
	<?php include (TEMPLATEPATH . '/side-column-post.php'); ?>
</div>
<?php get_footer(); ?>