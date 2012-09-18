<?php
App::uses('AppController', 'Controller');
/**
 * MediaAlertCategories Controller
 *
 * @property MediaAlertCategory $MediaAlertCategory
 */
class MediaAlertCategoriesController extends AppController {

	public $actionsList = array(
		'all' => array(
			'Retour aux media' => array('controller' => 'media', 'action' => 'index', 'admin'=>false),
			'Retour aux alertes' => array('controller' => 'mediaAlerts', 'action' => 'index', 'admin'=>false),
			'Catégories d\'alertes' => array('controller' => 'mediaAlertCategories', 'action' => 'index', 'admin'=>false),
			'Ajouter une catégorie' => array('controller' => 'mediaAlertCategories', 'action' => 'add', 'admin'=>true)
		),
		'view' => array(
			'Editer' => array('controller' => 'mediaAlertCategories', 'action' => 'edit', 'admin'=>true, 'objectSpecific'=>true)
		),
	);

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaAlertCategory->recursive = 0;
		$this->set('mediaAlertCategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediaAlertCategory->id = $id;
		if (!$this->MediaAlertCategory->exists()) {
			throw new NotFoundException(__('Invalid media alert category'));
		}
		$this->set('mediaAlertCategory', $this->MediaAlertCategory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MediaAlertCategory->create();
			if ($this->MediaAlertCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The media alert category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media alert category could not be saved. Please, try again.'));
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
		$this->MediaAlertCategory->id = $id;
		if (!$this->MediaAlertCategory->exists()) {
			throw new NotFoundException(__('Invalid media alert category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaAlertCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The media alert category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media alert category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaAlertCategory->read(null, $id);
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
		$this->MediaAlertCategory->id = $id;
		if (!$this->MediaAlertCategory->exists()) {
			throw new NotFoundException(__('Invalid media alert category'));
		}
		if ($this->MediaAlertCategory->delete()) {
			$this->Session->setFlash(__('Media alert category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media alert category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
