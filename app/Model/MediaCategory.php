<?php
App::uses('AppModel', 'Model');
/**
 * MediaCategory Model
 *
 * @property Media $Media
 */
class MediaCategory extends AppModel {

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
			'maxlength' => array(
				'rule' => array('maxlength', 30),
				'message' => 'La catégorie doit avoir un nom de moins de 30 caractères',
				'allowEmpty' => false,
				'required' => true,
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
		'Media' => array(
			'className' => 'Media',
			'foreignKey' => 'media_category_id',
			'dependent' => false,
		)
	);

}
