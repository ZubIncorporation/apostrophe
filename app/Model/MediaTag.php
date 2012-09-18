<?php
App::uses('AppModel', 'Model');
/**
 * MediaTag Model
 *
 * @property Media $Media
 */
class MediaTag extends AppModel {

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
				'rule' => array('maxlength', 20),
				'message' => 'Le tag doit avoir un nom, de maximum 20 caractères',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Media' => array(
			'className' => 'Media',
			'joinTable' => 'media_media_tags',
			'foreignKey' => 'media_tag_id',
			'associationForeignKey' => 'media_id',
			'unique' => 'keepExisting',
		)
	);

}
