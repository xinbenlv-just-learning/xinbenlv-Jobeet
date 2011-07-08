<?php

/**
 * JobeetAffiliate form base class.
 *
 * @method JobeetAffiliate getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJobeetAffiliateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'url'                    => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'token'                  => new sfWidgetFormInputText(),
      'is_active'              => new sfWidgetFormInputCheckbox(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'jobeet_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JobeetCategory')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'url'                    => new sfValidatorString(array('max_length' => 255)),
      'email'                  => new sfValidatorString(array('max_length' => 255)),
      'token'                  => new sfValidatorString(array('max_length' => 255)),
      'is_active'              => new sfValidatorBoolean(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'jobeet_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JobeetCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'JobeetAffiliate', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('jobeet_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobeetAffiliate';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['jobeet_categories_list']))
    {
      $this->setDefault('jobeet_categories_list', $this->object->JobeetCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveJobeetCategoriesList($con);

    parent::doSave($con);
  }

  public function saveJobeetCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['jobeet_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->JobeetCategories->getPrimaryKeys();
    $values = $this->getValue('jobeet_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('JobeetCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('JobeetCategories', array_values($link));
    }
  }

}
