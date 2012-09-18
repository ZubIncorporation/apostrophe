<?php
App::uses('AppModel', 'Model');
/**
 * MediaAlertsCategory Model
 *
 * @property MediaAlert $MediaAlert
 */
class MediaAlertCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le nom ne peut être vide.',
				'allowEmpty' => false,
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength', 50),
				'message' => 'Le nom ne doit pas dépasser 50 caractères.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MediaAlert' => array(
			'className' => 'MediaAlert',
			'foreignKey' => 'media_alert_category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
