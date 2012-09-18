<?php
App::uses('AppController', 'Controller');
/**
 * MediaAlerts Controller
 *
 * @property MediaAlert $MediaAlert
 */
class MediaAlertsController extends AppController {

	public $actionsList = array(
		'all' => array(
			'Accueil media' => array('controller' => 'media', 'action' => 'index', 'admin'=>false),
			'Administration Media' => array('controller' => 'media', 'action' => 'index', 'admin'=>true)
		),
		'add' => array(
			'<- Retour Media' => array('controller' => 'media', 'action' => 'view', 'admin'=>false, 'objectSpecific'=>true)
		)
	);

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaAlert->recursive = 0;
		$this->set('mediaAlerts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MediaAlert->id = $id;
		if (!$this->MediaAlert->exists()) {
			throw new NotFoundException(__('Invalid media alert'));
		}
		$this->set('mediaAlert', $this->MediaAlert->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($media_id = null) {
	
		$this->MediaAlert->Media->id = $media_id;
		if (!$this->MediaAlert->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		
		$this->set('media_id', $media_id);
		$this->set('media_title', $this->MediaAlert->Media->field('title'));
	
		if ($this->request->is('post')) {
			$this->MediaAlert->create();
			if ($this->MediaAlert->save($this->request->data)) {
				$this->Session->setFlash(__('The media alert has been saved'));
				$this->redirect(array('controller' => 'media', 'action' => 'view', $this->request->data['MediaAlert']['media_id']));
			} else {
				$this->Session->setFlash(__('The media alert could not be saved. Please, try again.'));
			}
		}
		
		$mediaAlertCategories = $this->MediaAlert->MediaAlertCategory->find('list');
		$this->set(compact('mediaAlertCategories'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->MediaAlert->id = $id;
		if (!$this->MediaAlert->exists()) {
			throw new NotFoundException(__('Invalid media alert'));
		}
		if ($this->MediaAlert->delete()) {
			$this->Session->setFlash(__('Media alert deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media alert was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
