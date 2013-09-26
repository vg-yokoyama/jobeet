<?php

/**
 * Subclass for performing query and update operations on the 'jobeet_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class JobeetCategoryPeer extends BaseJobeetCategoryPeer
{
  static public function getWithJobs()
  {
    $criteria = new Criteria();
    $criteria->addJoin(self::ID, JobeetJobPeer::CATEGORY_ID);
    $criteria->add(JobeetJobPeer::EXPIRES_AT, time(), Criteria::GREATER_THAN);
    $criteria->setDistinct();

    return self::doSelect($criteria);
  }
}
