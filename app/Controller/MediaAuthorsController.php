<?php
App::uses('AppController', 'Controller');
/**
 * MediaAuthors Controller
 *
 * @property MediaAuthor $MediaAuthor
 */
class MediaAuthorsController extends AppController {

	public $actionsList = array(
		'all' => array(
			'Accueil media' => array('controller' => 'media', 'action' => 'index', 'admin'=>false),
			'Administration Media' => array('controller' => 'media', 'action' => 'index', 'admin'=>true)
		),
		'admin_index' => array(
			'Ajouter' => array('controller' => 'mediaAuthors', 'action' => 'add', 'admin'=>true)
		),
		'admin_add' => array(
			'<- Auteurs' => array('controller' => 'mediaAuthors', 'action' => 'index', 'admin'=>true)
		),
		'admin_edit' => array(
			'<- Auteurs' => array('controller' => 'mediaAuthors', 'action' => 'index', 'admin'=>true)
		),
		'admin_view' => array(
			'<- Auteurs' => array('controller' => 'mediaAuthors', 'action' => 'index', 'admin'=>true),
			'Editer' => array('controller' => 'mediaAuthors', 'action' => 'edit', 'admin'=>true, 'objectSpecific'=>true),
		)
		
	);

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaAuthor->recursive = 0;
		$this->set('mediaAuthors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediaAuthor->id = $id;
		if (!$this->MediaAuthor->exists()) {
			throw new NotFoundException(__('Invalid media author'));
		}
		$this->set('mediaAuthor', $this->MediaAuthor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MediaAuthor->create();
			if ($this->MediaAuthor->save($this->request->data)) {
				$this->Session->setFlash(__('The media author has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media author could not be saved. Please, try again.'));
			}
		}
		$media = $this->MediaAuthor->Media->find('list');
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
		$this->MediaAuthor->id = $id;
		if (!$this->MediaAuthor->exists()) {
			throw new NotFoundException(__('Invalid media author'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaAuthor->save($this->request->data)) {
				$this->Session->setFlash(__('The media author has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media author could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaAuthor->read(null, $id);
		}
		$media = $this->MediaAuthor->Media->find('list');
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
		$this->MediaAuthor->id = $id;
		if (!$this->MediaAuthor->exists()) {
			throw new NotFoundException(__('Invalid media author'));
		}
		if ($this->MediaAuthor->delete()) {
			$this->Session->setFlash(__('Media author deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media author was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
