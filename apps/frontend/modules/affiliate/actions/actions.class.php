<?php

/**
 * affiliate actions.
 *
 * @package    jobeet
 * @subpackage affiliate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class affiliateActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->jobeet_affiliates = Doctrine_Core::getTable('JobeetAffiliate')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetAffiliateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new JobeetAffiliateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($jobeet_affiliate = Doctrine_Core::getTable('JobeetAffiliate')->find(array($request->getParameter('id'))), sprintf('Object jobeet_affiliate does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetAffiliateForm($jobeet_affiliate);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($jobeet_affiliate = Doctrine_Core::getTable('JobeetAffiliate')->find(array($request->getParameter('id'))), sprintf('Object jobeet_affiliate does not exist (%s).', $request->getParameter('id')));
    $this->form = new JobeetAffiliateForm($jobeet_affiliate);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($jobeet_affiliate = Doctrine_Core::getTable('JobeetAffiliate')->find(array($request->getParameter('id'))), sprintf('Object jobeet_affiliate does not exist (%s).', $request->getParameter('id')));
    $jobeet_affiliate->delete();

    $this->redirect('affiliate/index');
  }
  public function executeWait(sfWebRequest $request)
  {
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $jobeet_affiliate = $form->save();
      $this->redirect($this->generateUrl('affiliate_wait', $jobeet_affiliate));
    }
  }
}
