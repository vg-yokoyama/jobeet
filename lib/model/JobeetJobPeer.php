<?php

/**
 * Subclass for performing query and update operations on the 'jobeet_job' table.
 *
 * 
 *
 * @package lib.model
 */ 
class JobeetJobPeer extends BaseJobeetJobPeer
{
  static public function getActiveJobs($criteria = null)
  {
    if (is_null($criteria)) {
      $criteria = new Criteria();
    }
    $criteria->add(self::EXPIRES_AT, time(), Criteria::GREATER_THAN);
    $criteria->addDescendingOrderByColumn(self::EXPIRES_AT);

    return self::doSelect($criteria);
  }

  static public function countActiveJobs($criteria = null)
  {
    return self::doCount(self::addActiveJobsCriteria($criteria));
  }

  static public function addActiveJobsCriteria($criteria = null)
  {
    if (is_null($criteria)) {
      $criteria = new Criteria();
    }
    $criteria->add(self::EXPIRES_AT, time(), Criteria::GREATER_THAN);
    $criteria->addDescendingOrderByColumn(self::CREATED_AT);

    return $criteria;
  }

  static public function doSelectActive($criteria) {
    return self::doSelectOne(self::addActiveJobsCriteria($criteria));
  }
}
