<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * 
 * ACL Directives
 * http://book.cakephp.org/2.0/en/tutorials-and-examples/simple-acl-controlled-application/simple-acl-controlled-application.html
 * 
 */

	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'login');//array('controller'=>'pages');
        $this->Auth->allow('actions');
        $this->Auth->allow('element_request');
        
        /*
        	Permet d'avoir un utilisateur par défaut
        	Attention à le laisser se relogger avec un autre compte
        */
        
        
        if(!$this->Auth->loggedIn()){
        	$this->loadModel('User');
        	$user = $this->User->findById($this->User->guestID);
        	$this->Auth->login($user['User']);
        }
        
    }
    
	public function actions(){
		$return = null;
		
		if(empty($this->request->params['requested'])){ 
			throw new ForbiddenException();
		}
		
		if(isset($this->actionsList)){
			foreach($this->actionsList as $action => $options){
				if($action == 'all' || $action == $this->request->params['pass'][0]){
					foreach($options as $key => $value){
					
						if(isset($value['objectSpecific'])){
							if(isset($this->request->params['pass'][1])){
								unset($value['objectSpecific']);
								array_push($value, $this->request->params['pass'][1]);
							}
							else {
								continue;
							}
						}
						
						$admin = $value['admin'] ? 'admin_' : null;
						if($this->Acl->check(array('User' => array('id'=>$this->Auth->user('id'))), $value['controller'].'/'.$admin.$value['action']))
							$return[$key] = $value;
					
					}
				}
			}
			
		}
		
		return $return;
	}
    
    

}
