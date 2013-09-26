<?php use_stylesheet('jobs') ?>

<div id="jobs">
<?php foreach ($categories as $category): ?>
<div class="category_<?php echo Jobeet::slugify($category->getName()) ?>">
<div class="category">
<div class="feed">
<a href="">FEED</a>
</div>
<h1>
<?php echo link_to($category, 'category/show?id='.$category->getId()) ?>
</h1>
</div>

<?php include_partial('job/list', array(
  'jobs' => $category->getActiveJobs(sfConfig::get(sfConfig::get('app_max_jobs_on_homepage')))))
?>

<!-- pager -->
<?php if (($count = $category->countActiveJobs() - sfConfig::get('app_max_jobs_on_homepage')) > 0): ?>
<div class="more_jobs">
and<?php echo link_to($count, 'category/show?id='.$category->getId()) ?>
more...
</div>
<?php endif ?>
<!-- pager end -->

</div>
<?php endforeach ?>
</div>
