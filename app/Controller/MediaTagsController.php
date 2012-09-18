<?php
App::uses('AppController', 'Controller');
/**
 * MediaTags Controller
 *
 * @property MediaTag $MediaTag
 */
class MediaTagsController extends AppController {

	public $actionsList = array(
		'all' => array(
			'Accueil media' => array('controller' => 'media', 'action' => 'index', 'admin'=>false),
			'Administration Media' => array('controller' => 'media', 'action' => 'index', 'admin'=>true)
		),
		'admin_index' => array(
			'Ajouter' => array('controller' => 'mediaTags', 'action' => 'add', 'admin'=>true)
		),
		'admin_add' => array(
			'<- Tags' => array('controller' => 'mediaTags', 'action' => 'index', 'admin'=>true)
		),
		'admin_edit' => array(
			'<- Tags' => array('controller' => 'mediaTags', 'action' => 'index', 'admin'=>true)
		),
		'admin_view' => array(
			'<- Tags' => array('controller' => 'mediaTags', 'action' => 'index', 'admin'=>true),
			'Editer' => array('controller' => 'mediaTags', 'action' => 'edit', 'admin'=>true, 'objectSpecific'=>true),
		)
		
	);

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaTag->recursive = 0;
		$this->set('mediaTags', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediaTag->id = $id;
		if (!$this->MediaTag->exists()) {
			throw new NotFoundException(__('Invalid media tag'));
		}
		$this->set('mediaTag', $this->MediaTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MediaTag->create();
			if ($this->MediaTag->save($this->request->data)) {
				$this->Session->setFlash(__('The media tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media tag could not be saved. Please, try again.'));
			}
		}
		$media = $this->MediaTag->Media->find('list');
		$this->set(compact('media'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->MediaTag->id = $id;
		if (!$this->MediaTag->exists()) {
			throw new NotFoundException(__('Invalid media tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaTag->save($this->request->data)) {
				$this->Session->setFlash(__('The media tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaTag->read(null, $id);
		}
		$media = $this->MediaTag->Media->find('list');
		$this->set(compact('media'));
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
		$this->MediaTag->id = $id;
		if (!$this->MediaTag->exists()) {
			throw new NotFoundException(__('Invalid media tag'));
		}
		if ($this->MediaTag->delete()) {
			$this->Session->setFlash(__('Media tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
