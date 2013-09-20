<?php use_stylesheet('jobs') ?>

<div id="jobs">
<table class="jobs">
<?php foreach ($jobeet_jobList as $i => $job): ?>
<tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
<td class="location"><?php echo $job->getLocation() ?></td>
<td class="position">
<!-- この設定だとうごかない -->
<!--
<a href="<?php echo url_for(
array('@job_show_user', $job)
) ?>">
-->
<!-- この設定だとうごかない -->
<!--
<a href="<?php echo url_for(
array('sf_route' => '@job_show_user', 'sf_subject' => $job)
) ?>">
-->
<a href="<?php echo url_for(
'job/show?id='.$job->getId().
'&company=' . $job->getCompany().
'&location=' . $job->getLocation().
'&position=' . $job->getPosition()
) ?>">
<?php echo $job->getPosition() ?>
</a>
</td>
<td class="company"><?php echo $job->getCompany() ?></td>
</tr>
<?php endforeach ?>
</table>
</div>
