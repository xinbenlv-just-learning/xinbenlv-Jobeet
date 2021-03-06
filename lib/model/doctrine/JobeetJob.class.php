<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class JobeetJob extends BaseJobeetJob
{
  public function publish()
  {
    $this->setIsActivated(true);
    $this->save();
  }

  public function save(Doctrine_Connection $conn = null)
  {
    if ($this->isNew() && !$this->getExpiresAt())
    {
      $now = $this->getCreatedAt() ? strtotime($this->getCreatedAt()) : time();
      $this->setExpiresAt(date('Y-m-d h:i:s', $now + 86400 * sfConfig::get('app_active_days')));
    }
    if (!$this->getToken())
    {
      $this->setToken(sha1($this->getEmail().rand(11111, 99999)));
    }
    return parent::save($conn);
  }

  public function getCompanySlug()
  {
    return Jobeet::slugify($this->getCompany());
  }

  public function getPositionSlug()
  {
    return Jobeet::slugify($this->getPosition());
  }

  public function getLocationSlug()
  {
    return Jobeet::slugify($this->getLocation());
  }

  public function __toString()
  {
    return sprintf('%s at %s (%s)', $this->getPosition(), $this->getCompany(), $this->getLocation());
  }

  public function getTypeName()
  {
    $types = Doctrine_Core::getTable('JobeetJob')->getTypes();
    return $this->getType() ? $types[$this->getType()] : '';
  }
   
  public function isExpired()
  {
    return $this->getDaysBeforeExpires() < 0;
  }
   
  public function expiresSoon()
  {
    return $this->getDaysBeforeExpires() < 5;
  }
   
  public function getDaysBeforeExpires()
  {
    return ceil(($this->getDateTimeObject('expires_at')->format('U') - time()) / 86400);
  }

  public function extend ( $force = false)
  {
    if (!$force && !$this->expiresSoon())
    {
      return false;
    }
 
    $this->setExpiresAt(date('Y-m-d', time() + 86400 * sfConfig::get('app_active_days')));
 
    $this->save();
 
    return true;
  }
  public function asArray($host)
  {
    return array(
      'category'     => $this->getJobeetCategory()->getName(),
      'type'         => $this->getType(),
      'company'      => $this->getCompany(),
      'logo'         => $this->getLogo() ? 'http://'.$host.'/uploads/jobs/'.$this->getLogo() : null,
      'url'          => $this->getUrl(),
      'position'     => $this->getPosition(),
      'location'     => $this->getLocation(),
      'description'  => $this->getDescription(),
      'how_to_apply' => $this->getHowToApply(),
      'expires_at'   => $this->getCreatedAt(),
    );
  }
}
