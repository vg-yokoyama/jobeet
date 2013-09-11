<?php

/**
 * Subclass for representing a row from the 'jobeet_affiliate' table.
 *
 * 
 *
 * @package lib.model
 */ 
class JobeetAffiliate extends BaseJobeetAffiliate
{
  public function __toString() {
    return $this->getUrl();
  }
}
