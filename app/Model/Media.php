<?php
App::uses('AppModel', 'Model');
/**
 * Media Model
 *
 * @property MediaFile $MediaFile
 * @property MediaVideo $MediaVideo
 * @property MediaCategory $MediaCategory
 * @property MediaAlert $MediaAlert
 * @property MediaAuthor $MediaAuthor
 * @property MediaTag $MediaTag
 */
class Media extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'media_category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'La catégorie doit être un nombre.',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le média doit avoir un titre',
				'required' => true,
			),
			'maxlength' => array(
				'rule' => array('maxlength', 50),
			),
		),

		'publication' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Le date de publication doit être valide.',
				'allowEmpty' => false,
				'required' => true,
			),
		),

		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Le media doit posséder une description',
				'allowEmpty' => false,
				'required' => true,
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'MediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'media_id',
			'dependent' => true,
		),
		'MediaVideo' => array(
			'className' => 'MediaVideo',
			'foreignKey' => 'media_id',
			'dependent' => true
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MediaCategory' => array(
			'className' => 'MediaCategory',
			'foreignKey' => 'media_category_id'
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MediaAlert' => array(
			'className' => 'MediaAlert',
			'foreignKey' => 'media_id',
			'dependent' => false
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'MediaAuthor' => array(
			'className' => 'MediaAuthor',
			'joinTable' => 'media_media_authors',
			'foreignKey' => 'media_id',
			'associationForeignKey' => 'media_author_id',
			'unique' => 'keepExisting'
		),
		'MediaTag' => array(
			'className' => 'MediaTag',
			'joinTable' => 'media_media_tags',
			'foreignKey' => 'media_id',
			'associationForeignKey' => 'media_tag_id',
			'unique' => 'keepExisting'
		)
	);

}
