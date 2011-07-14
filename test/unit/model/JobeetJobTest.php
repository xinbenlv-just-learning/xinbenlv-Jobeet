<?php

$t->comment('->getForLuceneQuery()');
$job = create_job(array('position' => 'foobar', 'is_activated' => false));
$job->save();
$jobs = Doctrine_Core::getTable('JobeetJob')->getForLuceneQuery('position:foobar');
$t->is(count($jobs), 0, '::getForLuceneQuery() does not return non activated jobs');
 
$job = create_job(array('position' => 'foobar', 'is_activated' => true));
$job->save();
$jobs = Doctrine_Core::getTable('JobeetJob')->getForLuceneQuery('position:foobar');
$t->is(count($jobs), 1, '::getForLuceneQuery() returns jobs matching the criteria');
$t->is($jobs[0]->getId(), $job->getId(), '::getForLuceneQuery() returns jobs matching the criteria');
 
$job->delete();
$jobs = Doctrine_Core::getTable('JobeetJob')->getForLuceneQuery('position:foobar');
$t->is(count($jobs), 0, '::getForLuceneQuery() does not return deleted jobs');
