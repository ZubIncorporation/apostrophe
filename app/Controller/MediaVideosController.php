<?php
App::uses('AppController', 'Controller');
/**
 * MediaVideos Controller
 *
 * @property MediaVideo $MediaVideo
 */
class MediaVideosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaVideo->recursive = 0;
		$this->set('mediaVideos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediaVideo->id = $id;
		if (!$this->MediaVideo->exists()) {
			throw new NotFoundException(__('Invalid media video'));
		}
		$this->set('mediaVideo', $this->MediaVideo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MediaVideo->create();
			if ($this->MediaVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The media video has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media video could not be saved. Please, try again.'));
			}
		}
		$media = $this->MediaVideo->Media->find('list');
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
		$this->MediaVideo->id = $id;
		if (!$this->MediaVideo->exists()) {
			throw new NotFoundException(__('Invalid media video'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The media video has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media video could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaVideo->read(null, $id);
		}
		$media = $this->MediaVideo->Media->find('list');
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
		$this->MediaVideo->id = $id;
		if (!$this->MediaVideo->exists()) {
			throw new NotFoundException(__('Invalid media video'));
		}
		if ($this->MediaVideo->delete()) {
			$this->Session->setFlash(__('Media video deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media video was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
