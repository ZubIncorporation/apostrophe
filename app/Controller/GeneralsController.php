<?php
App::uses('AppController', 'Controller');
/**
 * Generals Controller
 *
 * @property General $General
 */
class GeneralsController extends AppController {

	public function element_request($name){
		$content = $this->General->findByName($name);
		return $content['General']['content'];
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->General->recursive = 0;
		$this->set('generals', $this->paginate());
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->General->id = $id;
		if (!$this->General->exists()) {
			throw new NotFoundException(__('Invalid general'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->General->save($this->request->data)) {
				$this->Session->setFlash(__('The general setting has been saved'));
				$this->redirect(array('controller' => 'pages', 'action'=>'admin', 'admin'=>false));
			} else {
				$this->Session->setFlash(__('The general could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->General->read(null, $id);
		}
	}
	
}
