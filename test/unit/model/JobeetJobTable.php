<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');
 
$t = new lime_test(1);
$t->comment('->getCompanySlug()');
$job = Doctrine_Core::getTable('JobeetJob')->createQuery()->fetchOne();
$t->is($job->getCompanySlug(), Jobeet::slugify($job->getCompany()), '->getCompanySlug() return the slug for the company');

$t->comment('->save()');
$job = create_job();
$job->save();
$expiresAt = date('Y-m-d', time() + 86400 * sfConfig::get('app_active_days'));
$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), $expiresAt, '->save() updates expires_at if not set');
 
$job = create_job(array('expires_at' => '2008-08-08'));
$job->save();
$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), '2008-08-08', '->save() does not update expires_at if set');
 
function create_job($defaults = array())
{
  static $category = null;
 
  if (is_null($category))
  {
    $category = Doctrine_Core::getTable('JobeetCategory')
      ->createQuery()
      ->limit(1)
      ->fetchOne();
  }
 
  $job = new JobeetJob();
  $job->fromArray(array_merge(array(
    'category_id'  => $category->getId(),
    'company'      => 'Sensio Labs',
    'position'     => 'Senior Tester',
    'location'     => 'Paris, France',
    'description'  => 'Testing is fun',
    'how_to_apply' => 'Send e-Mail',
    'email'        => 'job@example.com',
    'token'        => rand(1111, 9999),
    'is_activated' => true,
  ), $defaults));
 
  return $job;
}

