<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
  <?php include_partial('job/list', array('jobs' => $jobs)) ?>
</div>
