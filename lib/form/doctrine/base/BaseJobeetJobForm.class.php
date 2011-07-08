<?php

/**
 * JobeetJob form base class.
 *
 * @method JobeetJob getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJobeetJobForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JobeetCategory'), 'add_empty' => false)),
      'type'         => new sfWidgetFormInputText(),
      'company'      => new sfWidgetFormInputText(),
      'logo'         => new sfWidgetFormInputText(),
      'url'          => new sfWidgetFormInputText(),
      'position'     => new sfWidgetFormInputText(),
      'location'     => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'how_to_apply' => new sfWidgetFormTextarea(),
      'token'        => new sfWidgetFormInputText(),
      'is_public'    => new sfWidgetFormInputCheckbox(),
      'is_activated' => new sfWidgetFormInputCheckbox(),
      'email'        => new sfWidgetFormInputText(),
      'expires_at'   => new sfWidgetFormDateTime(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('JobeetCategory'))),
      'type'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company'      => new sfValidatorString(array('max_length' => 255)),
      'logo'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'position'     => new sfValidatorString(array('max_length' => 255)),
      'location'     => new sfValidatorString(array('max_length' => 255)),
      'description'  => new sfValidatorString(array('max_length' => 4000)),
      'how_to_apply' => new sfValidatorString(array('max_length' => 4000)),
      'token'        => new sfValidatorString(array('max_length' => 255)),
      'is_public'    => new sfValidatorBoolean(array('required' => false)),
      'is_activated' => new sfValidatorBoolean(array('required' => false)),
      'email'        => new sfValidatorString(array('max_length' => 255)),
      'expires_at'   => new sfValidatorDateTime(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'JobeetJob', 'column' => array('token')))
    );

    $this->widgetSchema->setNameFormat('jobeet_job[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobeetJob';
  }

}
