<table class="jobs">
<?php foreach ($jobs as $i => $job): ?>
<tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
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
<?php endforeach; ?>
</table>

