<?php

/**
 * Subclass for representing a row from the 'jobeet_category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class JobeetCategory extends BaseJobeetCategory
{
  public function __toString()
  {
    return $this->getName();
  }

  public function getActiveJobs($max = 10)
  {
    $criteria = new Criteria();
    $criteria->add(JobeetJobPeer::CATEGORY_ID, $this->getId());
    $criteria->setLimit($max);

    return JobeetJobPeer::getActiveJobs($criteria);
  }
}
