<?php
App::uses('AppModel', 'Model');
/**
 * MediaAlert Model
 *
 * @property Media $Media
 * @property MediaAlertCategory $MediaAlertCategory
 */
class MediaAlert extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'media_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'media_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'L\'alerte doit correspondre à un media.',
				'required' => true,
			),
		),
		'media_alert_category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'L\'alerte doit appartenir à une catégorie.',
				'required' => true,
			),
		),
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Veuillez saisir une description pour l\'alerte.',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Media' => array(
			'className' => 'Media',
			'foreignKey' => 'media_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MediaAlertCategory' => array(
			'className' => 'MediaAlertCategory',
			'foreignKey' => 'media_alert_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
