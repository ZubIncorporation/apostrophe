<?php
App::uses('AppController', 'Controller');
 
/**
 * MediaFiles Controller
 *
 * @property MediaFile $MediaFile
 */
class MediaFilesController extends AppController {

	public $actionsList = array(
		'all' => array(
			'Liste des Fichiers Media' => array('controller' => 'mediaFiles', 'action' => 'index', 'admin'=>true),
		),
		'admin_edit' => array(
			'<- Retour Media' => array('controller' => 'mediaFiles', 'action' => 'back_edit', 'admin'=>true, 'objectSpecific'=>true)
		)
	);
	
	
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MediaFile->recursive = 0;
		$this->set('mediaFiles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media file'));
		}
		$this->set('mediaFile', $this->MediaFile->read(null, $id));
	}

/**
 * edit method
 *
 * @return void
 */
	public function admin_edit($id = null) {
		$this->MediaFile->id = $id;
		
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException('Le fichier n\'est pas présent dans la base de données.');
		}
		
		$this->Uploader = new Uploader();
		
		if (!empty($this->data)) {
			$this->MediaFile->set($this->data);
	 
			if ($this->MediaFile->validates()) {
			
			$path = $this->MediaFile->findById($id, 'path');
			
				if ($data = $this->Uploader->upload('fileName')) {
					// Upload successful
					
					$this->Uploader->move($data['path'], $path['MediaFile']['path'], true);

					$this->Session->setFlash('Le fichier "'.$path['MediaFile']['path'].'" a été mis à jour.');
				}
			}
		}	
	}
	
	public function admin_back_edit($id = null) {
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		else {
			$id = $this->MediaFile->findById($id, 'Media.id');
			if(!empty($id['Media']['id'])){
				$this->redirect(array('controller' => 'media', 'action' => 'view', 'admin'=>false, $id['Media']['id']));
			}
			else {
				throw new NotFoundException(__('Pas de media associé.'));
			}
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
/*
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media file'));
		}
		$this->Uploader = new Uploader();
		$path = $this->MediaFile->field('path');
		if ($this->MediaFile->delete()) {
			$this->Uploader->delete($path);
			$this->Session->setFlash(__('Media file deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media file was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
*/

}
