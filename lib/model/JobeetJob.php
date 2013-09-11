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
}
