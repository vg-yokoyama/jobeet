<?php

/**
 * Subclass for representing a row from the 'jobeet_job' table.
 *
 * 
 *
 * @package lib.model
 */ 
class JobeetJob extends BaseJobeetJob
{
  public function __toString() {
    return sprintf("%s %s(%s)", $this->getPosition(), $this->getCompany, $this->getLocation);
  }

  public function getCompanySlug() {
    return Jobeet::slugify($this->getCompany());
  }

  //public function save(PropelPDO $con = null)
  public function save($con=null)
  {
    if ($this->isNew() && !$this->getExpiresAt()) {
      $now = $this->getCreatedAt() ? $this->getCreatedAt('U') : time();
      $this->setExpiresAt($now + 86400 * sfConfig::get('app_active_days'));
    }

    return parent::save($con);
  }
}
