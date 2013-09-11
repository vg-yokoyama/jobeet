<?php

/**
 * job actions.
 *
 * @package    jobeet
 * @subpackage job
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class jobActions extends sfActions
{
  public function executeIndex()
  {
    $this->jobeet_jobList = JobeetJobPeer::doSelect(new Criteria());
  }

  public function executeShow($request)
  {
    $this->jobeet_job = JobeetJobPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->jobeet_job);
  }

  public function executeCreate()
  {
    $this->form = new JobeetJobForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = new JobeetJobForm(JobeetJobPeer::retrieveByPk($request->getParameter('id')));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new JobeetJobForm(JobeetJobPeer::retrieveByPk($request->getParameter('id')));

    $this->form->bind($request->getParameter('jobeet_job'));
    if ($this->form->isValid())
    {
      $jobeet_job = $this->form->save();

      $this->redirect('job/edit?id='.$jobeet_job->getId());
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($jobeet_job = JobeetJobPeer::retrieveByPk($request->getParameter('id')));

    $jobeet_job->delete();

    $this->redirect('job/index');
  }
}
