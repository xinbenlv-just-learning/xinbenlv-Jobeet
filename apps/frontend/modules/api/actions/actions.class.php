<?php

/**
 * api actions.
 *
 * @package    jobeet
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  public function executeList(sfWebRequest $request)
  {
    $this->jobs = array();
    foreach ($this->getRoute()->getObjects() as $job)
    {
      $this->jobs[$this->generateUrl('job_show_user', $job, true)] = $job->asArray($request->getHost());
    }
 
    switch ($request->getRequestFormat())
    {
      case 'yaml':
        $this->setLayout(false);
        $this->getResponse()->setContentType('text/yaml');
        break;
    }
  } 


}
