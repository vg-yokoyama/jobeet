<?php

/**
 * category actions.
 *
 * @package    jobeet
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class categoryActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    $this->forward('default', 'module');
  }

  public function executeShow($request)
  {
    $this->category = JobeetCategoryPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->category);

    $this->pager = new sfPropelPager(
      'JobeetJob',
      sfConfig::get('app_max_jobs_on_category')
    );
    $this->pager->setCriteria($this->category->getActiveJobsCriteria());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
}
