<?php
App::uses('AppController', 'Controller');
/**
 * MediaCategories Controller
 *
 * @property MediaCategory $MediaCategory
 */
class MediaCategoriesController extends AppController {
	
	public $actionsList = array(
		'all' => array(
			'Accueil media' => array('controller' => 'media', 'action' => 'index', 'admin'=>false),
			'Administration Media' => array('controller' => 'media', 'action' => 'index', 'admin'=>true)
		),
		'admin_index' => array(
			'Ajouter' => array('controller' => 'mediaCategories', 'action' => 'add', 'admin'=>true)
		),
		'admin_add' => array(
			'<- Auteurs' => array('controller' => 'mediaCategories', 'action' => 'index', 'admin'=>true)
		),
		'admin_edit' => array(
			'<- Auteurs' => array('controller' => 'mediaCategories', 'action' => 'index', 'admin'=>true)
		),
		'admin_view' => array(
			'<- Auteurs' => array('controller' => 'mediaCategories', 'action' => 'index', 'admin'=>true),
			'Editer' => array('controller' => 'mediaCategories', 'action' => 'edit', 'admin'=>true, 'objectSpecific'=>true),
		)
		
	);

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaCategory->recursive = 0;
		$this->set('mediaCategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediaCategory->id = $id;
		if (!$this->MediaCategory->exists()) {
			throw new NotFoundException(__('Invalid media category'));
		}
		$this->set('mediaCategory', $this->MediaCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MediaCategory->create();
			if ($this->MediaCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The media category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media category could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->MediaCategory->id = $id;
		if (!$this->MediaCategory->exists()) {
			throw new NotFoundException(__('Invalid media category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The media category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaCategory->read(null, $id);
		}
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
		$this->MediaCategory->id = $id;
		if (!$this->MediaCategory->exists()) {
			throw new NotFoundException(__('Invalid media category'));
		}
		if ($this->MediaCategory->delete()) {
			$this->Session->setFlash(__('Media category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
