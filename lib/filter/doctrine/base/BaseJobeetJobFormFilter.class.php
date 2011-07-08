<?php

/**
 * JobeetJob filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJobeetJobFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JobeetCategory'), 'add_empty' => true)),
      'type'         => new sfWidgetFormFilterInput(),
      'company'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logo'         => new sfWidgetFormFilterInput(),
      'url'          => new sfWidgetFormFilterInput(),
      'position'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'location'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'how_to_apply' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_public'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_activated' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'email'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expires_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('JobeetCategory'), 'column' => 'id')),
      'type'         => new sfValidatorPass(array('required' => false)),
      'company'      => new sfValidatorPass(array('required' => false)),
      'logo'         => new sfValidatorPass(array('required' => false)),
      'url'          => new sfValidatorPass(array('required' => false)),
      'position'     => new sfValidatorPass(array('required' => false)),
      'location'     => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'how_to_apply' => new sfValidatorPass(array('required' => false)),
      'token'        => new sfValidatorPass(array('required' => false)),
      'is_public'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_activated' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'email'        => new sfValidatorPass(array('required' => false)),
      'expires_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('jobeet_job_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobeetJob';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'category_id'  => 'ForeignKey',
      'type'         => 'Text',
      'company'      => 'Text',
      'logo'         => 'Text',
      'url'          => 'Text',
      'position'     => 'Text',
      'location'     => 'Text',
      'description'  => 'Text',
      'how_to_apply' => 'Text',
      'token'        => 'Text',
      'is_public'    => 'Boolean',
      'is_activated' => 'Boolean',
      'email'        => 'Text',
      'expires_at'   => 'Date',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
