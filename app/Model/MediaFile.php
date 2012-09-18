<?php
App::uses('AppModel', 'Model');
/**
 * MediaFile Model
 *
 * @property Media $Media
 */
class MediaFile extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'path';

/**
 * Validation rules
 *
 * @var array
 */
/*
	public $validate = array(
		'media_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Le fichier doit correspondre à un media.',
				'allowEmpty' => false,
				'required' => true
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
		)
	);
	
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'fileName' => array(
				'name'		=> 'formatFileName',	// Name of the function to use to format filenames
				'baseDir'	=> '',			// See UploaderComponent::$baseDir
				'uploadDir'	=> '/media_files/',			// See UploaderComponent::$uploadDir
				'dbColumn'	=> 'path',	// The database column name to save the path to
				'importFrom'	=> '',			// Path or URL to import file
				'defaultPath'	=> '',			// Default file path if no upload present
				'maxNameLength'	=> 30,			// Max file name length
				'overwrite'	=> true,		// Overwrite file with same name if it exists
				'stopSave'	=> true,		// Stop the model save() if upload fails
				'allowEmpty'	=> false,		// Allow an empty file upload to continue
				'transforms'	=> array(),		// What transformations to do on images: scale, resize, etc
				's3'		=> array(),		// Array of Amazon S3 settings
				'metaColumns'	=> array(		// Mapping of meta data to database fields
					'ext' => '',
					'type' => '',
					'size' => '',
					'group' => '',
					'width' => '',
					'height' => '',
					'filesize' => ''
				)
			)
		), 
		'Uploader.FileValidation' => array(
			'fileName' => array(
				'extension' => array(
					'value' => array('pdf'),
					'error' => 'Type de fichier incorrect (PDF uniquement)',
				),
				'filesize' => array(
					'value' => 5242880,
					'error' => 'Fichier trop volumineux'
				),
				'required' => array(
					'value' => true,
					'error' => 'Fichier requis'
				)
			)
		)
	);
	
}
