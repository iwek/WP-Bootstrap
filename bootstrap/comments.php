<?php
  // Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
      die('Please do not load this page directly. Thanks!');
  
  if (post_password_required()) {
?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
  <?php
      return;
  }
?>

<!-- You can start editing here. -->

<?php
  if (have_comments())
      :
?>
  <h3 id="comments"><?php
      comments_number('No Comments', 'One Comment', '% Comments');
?></h3>
  <ul class="comment-list unstyled">
  <?php
  //wp_list_comments();
  wp_list_comments(array('avatar_size' => '64'));
?>
  </ul>
  <div class="navigation">
    <div class="alignleft"><span><?php
  previous_comments_link()
?></span></div>
    <div class="alignright"><span><?php
  next_comments_link()
?></span></div>
  </div>
  <?php
  else
      : // this is displayed if there are no comments so far 
?>
  <?php
      if ('open' == $post->comment_status)
          :
?>
  <!-- If comments are open, but there are no comments. -->
  <?php
          else
              : // comments are closed 
?>
  <!-- If comments are closed. -->
  <p class="nocomments">Comments are closed.</p>
  <?php
              endif;
?>
<?php
  endif;
?>

<?php
  if ('open' == $post->comment_status)
      :
?>

<div id="respond">

<h3 id="respond-title"><span class="hook"><?php
      comment_form_title('Leave a Reply', 'Leave a Reply to %s');
?> <span class="cancel-comment-reply"><?php
  cancel_comment_reply_link('&times;&nbsp;Cancel reply');
?></span></span></h3>

<?php
  if (get_option('comment_registration') && !$user_ID)
      :
?>
<p>You must be <a href="<?php
      echo get_option('siteurl');
?>/wp-login.php?redirect_to=<?php
  echo urlencode(get_permalink());
?>">logged in</a> to post a comment.</p>
<?php
  else
      :
?>

<form action="<?php
      echo get_option('siteurl');
?>/wp-comments-post.php" method="post" id="commentform">

<?php
  if ($user_ID)
      :
?>

<p>Logged in as <a href="<?php
      echo get_option('siteurl');
?>/wp-admin/profile.php"><?php
  echo $user_identity;
?></a>. <a href="<?php
  echo wp_logout_url(get_permalink());
?>" title="Log out of this account">Log out &raquo;</a></p>

<?php
  else
      :
?>

<div class="clearfix">
  <label for="author">Name <?php
  if ($req)
      echo "(required)";
?></label>
  <div class="input">
  <input type="text" class="xlarge" name="author" id="author" value="<?php
      echo $comment_author;
?>" size="22" tabindex="1" <?php
  if ($req)
      echo "aria-required='true'";
?> />
  </div>
</div>

<div class="clearfix">
  <label for="email">Mail <?php
  if ($req)
      echo "(required)";
?></label>
  <div class="input">
  <input type="text" class="xlarge" name="email" id="email" value="<?php
  echo $comment_author_email;
?>" size="22" tabindex="2" <?php
  if ($req)
      echo "aria-required='true'";
?> />
  </div>
</div>



<div class="clearfix">
  <label for="url">Website</label>
  <div class="input">
    <input type="text" class="xlarge" name="url" id="url" value="<?php
  echo $comment_author_url;
?>" size="22" tabindex="3" />
    </div>
</div>
<?php
  endif;
?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php
  echo allowed_tags();
?></code></small></p>-->

<div class="clearfix">
  <label for="textarea">Comment</label>
  <div class="input">
    <textarea class="xxlarge" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
  </div>
</div>

<div class="actions">
  <input name="submit" type="submit" id="submit" tabindex="5" class="btn primary" value="Submit Comment" />
</div>

<?php
  comment_id_fields();
?>

<?php
  do_action('comment_form', $post->ID);
?>

</form>


<?php
  endif;
  // If registration required and not logged in 
?>
</div>
<?php
  endif;
  // if you delete this the sky will fall on your head 
?>
