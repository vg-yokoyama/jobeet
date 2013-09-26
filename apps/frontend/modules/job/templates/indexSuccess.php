<?php use_stylesheet('jobs') ?>

<div id="jobs">
<?php foreach ($catetories as $catetory): ?>
<div class="category_<?php echo Jobeet::slugify($catetory->getName()) ?>">
<div class="category">
<div class="feed">
<a href="">FEED</a>
</div>
<h1><?php echo $catetory ?>
</div>

<table class="jobs">
<?php foreach ($catetory->getActiveJobs(sfConfig::get('app_max_jobs_on_homepage')) as $i => $job): ?>
<tr class="<?php echo fmod($i, 2) ? 'even' : 'oda' ?>">
<td class="location">
<?php echo $job->getLocation() ?>
</td>
<td class="position">
<a href="<?php echo url_for(
'job/show?id='.$job->getId().
'&company=' . $job->getCompany().
'&location=' . $job->getLocation().
'&position=' . $job->getPosition()
) ?>">
<?php echo $job->getPosition() ?>
</a>
</td>
<td class="company">
<?php echo $job->getCompany() ?>
</td>
</tr>
<?php endforeach ?>
</table>
</div>
<?php endforeach ?>
</div>
