<?php
class JobeetTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    Doctrine::loadData(sfConfig::get('sf_test_dir').'/fixtures');
 
    return $this;
  }
 
  public function getMostRecentProgrammingJob()
  {
    $q = Doctrine_Query::create()
      ->select('j.*')
      ->from('JobeetJob j')
      ->leftJoin('j.JobeetCategory c')
      ->where('c.slug = ?', 'programming');
    $q = Doctrine::getTable('JobeetJob')->addActiveJobsQuery($q);
 
    return $q->fetchOne();
  }
 
  public function getExpiredJob()
  {
    $q = Doctrine_Query::create()
      ->from('JobeetJob j')
      ->where('j.expires_at < ?', date('Y-m-d', time()));
 
    return $q->fetchOne();
  }
}