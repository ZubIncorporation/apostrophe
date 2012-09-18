<?php
App::uses('AppModel', 'Model');
/**
 * MediaVideo Model
 *
 * @property Media $Media
 */
class MediaVideo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'url';

/**
 * Validation rules
 *
 * @var array
 */
/*
	public $validate = array(
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'La vidéo doit avoir une url valide',
				'required' => false,
			),
		),
	);
*/

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
			'type' => 'inner', // ?
		)
	);
}
