<div id="comments">
<?php if ( post_password_required() ) : ?>
        <p class="nopassword"><?php echo 'This post is password protected. Enter the password to view any comments.'; ?></p>
      </div><!-- #comments -->
<?php
    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
  endif;
?>

<?php
  // You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
  <h3 id="comments"><?php
      comments_number('No Comments', 'One Comment', '% Comments');
?></h3>
  <ul class="comment-list unstyled">
  <?php
  //wp_list_comments();
  wp_list_comments(array('avatar_size' => '64'));
?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <div class="navigation">
        <div class="nav-previous"><?php previous_comments_link(); ?></div>
        <div class="nav-next"><?php next_comments_link(); ?></div>
      </div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

  /* If there are no comments and comments are closed,
   * let's leave a little note, shall we?
   */
  if ( ! comments_open() ) :
?>
  <p class="nocomments"><?php echo 'Comments are closed.'; ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->