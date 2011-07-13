<?php

/**
 * job actions.
 *
 * @package    jobeet
 * @subpackage job
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class jobActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->categories = Doctrine::getTable('JobeetCategory')->getWithJobs();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->job = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm();
    $job = new JobeetJob();
    $job->setType('full-time');
 
    $this->form = new JobeetJobForm($job);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $job = $this->getRoute()->getObject();
    $this->forward404If($job->getIsActivated());

    $this->form = new JobeetJobForm($job);
 
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm($this->getRoute()->getObject());
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $job = $this->getRoute()->getObject();
    $job->delete();

    $this->redirect('job/index');
  }

  public function executePublish(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
   
    $job = $this->getRoute()->getObject();
    $job->publish();
   
    $this->getUser()->setFlash('notice', sprintf('Your job is now online for %s days.', sfConfig::get('app_active_days')));
   
    $this->redirect('job_show_user', $job);
  }  

  public function executeExtend(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
   
    $job = $this->getRoute()->getObject();
    $this->forward404Unless($job->extend());
   
    $this->getUser()->setFlash('notice', sprintf('Your job validity has been extended until %s.', $job->getDateTimeObject('expires_at')->format('m/d/Y')));
   
    $this->redirect('job_show_user', $job);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName()),
      $request->getFiles($form->getName())
    );
   
    if ($form->isValid())
    {
      $job = $form->save();
   
      $this->redirect('job_show', $job);
    }
  }
}
