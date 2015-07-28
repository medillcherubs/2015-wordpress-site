<div id="mugshots" >
  <?php
    //get all users, iterate through users, query for one post for the user, if there is a post then display posts title, author, content info
    $blogusers = get_users(array('fields' => 'all_with_meta'));
    if ($blogusers) {
      foreach ($blogusers as $bloguser) {
        $author = get_userdata($bloguser->ID); ?>
        <div style="clear: both; width: 100%;">
      <!-- <img src="data:image/gif;base64,R0lGODlhCgAKAIAAAB8fHwAAACH5BAEAAAAALAAAAAAKAAoAAAIIhI+py+0PYysAOw==" class="author-image" />-->
        <img src="http://cherubs.medill.northwestern.edu/2014/wp-content/uploads/sites/5/2014/07/<?php echo $author->last_name . str_replace(' ', '', $author->first_name) ?>.jpg" class="author-image" />
      <?php echo $author->display_name; ?>
        </div>
        <?php

        // print_r($author);
      }
    }
  ?>
</div>