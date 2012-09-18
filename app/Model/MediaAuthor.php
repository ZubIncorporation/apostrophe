<?php
App::uses('AppModel', 'Model');
/**
 * MediaAuthor Model
 *
 * @property Media $Media
 */
class MediaAuthor extends AppModel {

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
				'message' => 'Merci de saisir un nom pour cet auteur.',
				'allowEmpty' => false,
				'required' => true
			),
		),
		'promotion' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'La promotion de l\'auteur doit être un nombre',
				'allowEmpty' => true,
			),
/*
			'between' => array(
				'rule' => array('between', 1914, année actuelle),
				'message' => 'La promotion de l\'auteur doit être comprise entre 1914 et l\'année actuelle.',
				'allowEmpty' => true,
			),
*/
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
			'joinTable' => 'media_media_authors',
			'foreignKey' => 'media_author_id',
			'associationForeignKey' => 'media_id',
			'unique' => 'keepExisting',
		)
	);

}
