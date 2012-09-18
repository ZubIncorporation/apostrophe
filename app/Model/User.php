<?php
App::uses('AppModel', 'Model', 'AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {
	
	public $guestID = 2;

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nickname';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'L\'identifiant du groupe doit être un nombre.',
				'allowEmpty' => false
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Il faut saisir un identifiant utilisateur.',
				'allowEmpty' => false
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Le pseudonyme ne peut être constitué que de chiffres et de lettres.'
			),
			'maxlength' => array(
				'rule' => array('maxLength', 15),
				'message' => 'Le pseudonyme ne peut pas excéder 15 caractères.'
			),
			'unique' => array(
		        'rule' => 'isUnique',
		        'message' => 'E-mail déjà présent dans nos bases de données.'
		    )
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Un mot de passe est requis.',
				'allowEmpty' => false
			),
			'maxlength' => array(
				'rule' => array('maxLength', 30),
				'message' => 'Le mot de passe ne peut pas excéder 30 caractères.'
			),
		),
		'nickname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'L\'utilisateur doit avoir un pseudonyme.',
				'allowEmpty' => false
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'L\'identifiant utilisateur doit être une adresse mail valide.'
			),
			'maxlength' => array(
				'rule' => array('maxLength', 320),
				'message' => 'La base de données ne peut contenir des adresses de plus de 320 caractères.'
			),
			'unique' => array(
		        'rule' => 'isUnique',
		        'message' => 'E-mail déjà présent dans nos bases de données.'
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
/**
 * 
 * ACL Directives
 * http://book.cakephp.org/2.0/en/tutorials-and-examples/simple-acl-controlled-application/simple-acl-controlled-application.html
 * 
 */

    public function beforeSave() {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
    
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
}
