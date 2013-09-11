<?php $jobeet_job = $form->getObject() ?>
<h1><?php echo $jobeet_job->isNew() ? 'New' : 'Edit' ?> Job</h1>

<form action="<?php echo url_for('job/update'.(!$jobeet_job->isNew() ? '?id='.$jobeet_job->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('job/index') ?>">Cancel</a>
          <?php if (!$jobeet_job->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'job/delete?id='.$jobeet_job->getId(), array('post' => true, 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
