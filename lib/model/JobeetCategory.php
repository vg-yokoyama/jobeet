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
}
