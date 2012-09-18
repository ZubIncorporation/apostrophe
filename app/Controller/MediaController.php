<?php
App::uses('AppController', 'Controller');
/**
 * Media Controller
 *
 * @property Media $Media
 */
class MediaController extends AppController {

	public $actionsList = array(
		'all' => array(
			'Accueil media' => array('controller' => 'media', 'action' => 'index', 'admin'=>false),
			'Administration Media' => array('controller' => 'media', 'action' => 'index', 'admin'=>true)
		),
		'admin_index' => array(
			'Ajouter un Media' => array('controller' => 'media', 'action' => 'add', 'admin'=>true),
			'-> Auteurs' => array('controller' => 'mediaAuthors', 'action' => 'index', 'admin'=>true),
			'-> Tags' => array('controller' => 'mediaTags', 'action' => 'index', 'admin'=>true),
			'-> Catégories' => array('controller' => 'mediaCategories', 'action' => 'index', 'admin'=>true),
			'-> Catégories d\'Alertes' => array('controller' => 'mediaAlertCategories', 'action' => 'index', 'admin'=>true),
			'Voir les Alertes' => array('controller' => 'mediaAlerts', 'action' => 'index', 'admin'=>true),
		),
		'view' => array(
			'Éditer' => array('controller' => 'media', 'action' => 'edit', 'admin'=>true, 'objectSpecific'=>true),
			'Éditer PDF / Vidéo' => array('controller' => 'media', 'action' => 'edit_media', 'admin'=>true, 'objectSpecific'=>true),
			'Signaler' => array('controller' => 'mediaAlerts', 'action' => 'add', 'admin'=>false, 'objectSpecific'=>true)
		),
		'admin_edit' => array(
			'<- Retour Media' => array('controller' => 'media', 'action' => 'view', 'admin'=>false, 'objectSpecific'=>true),
			'Éditer PDF / Vidéo' => array('controller' => 'media', 'action' => 'edit_media', 'admin'=>true, 'objectSpecific'=>true)
		)
	);


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Media->recursive = 0;
		$this->set('media', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		$info = $this->Media->read(null, $id);
		
		if(preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $info['MediaVideo']['url'], $matches))
			$info['MediaVideo']['url'] = $matches[0];
			
		$this->set('media', $info);
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
	}


/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$this->Uploader = new Uploader();
		
		if (!empty($this->data)) {
		
			/*
				On valide d'abord les modèles.
			*/
			$this->Media->set($this->data);
			
			if($this->request->data['Media']['type'] == 'file'){
				
				$this->Media->MediaFile->set($this->data);
			
				if($this->Media->validates() && $this->Media->MediaFile->validates()){
				
					if ($this->Media->save($this->request->data)) {
						
						$this->request->data['MediaFile']['media_id'] = $this->Media->id;
			 
						if ($data = $this->Uploader->upload('fileName')) {
							
							$this->request->data['MediaFile']['path'] = $data['path'];
							unset($this->request->data['MediaFile']['fileName']);
							
							$this->Media->MediaFile->create();
							
							if ($this->Media->MediaFile->save($this->request->data)) {
								$this->Session->setFlash(__('The media file has been saved'));
								//$this->redirect(array('action' => 'index'));
							} else {
								$this->Session->setFlash(__('The media file could not be saved. Please, try again.'));
								$this->Uploader->delete($data['path']);
								$this->Media->delete();
							}
						}
						else {
							$this->Session->setFlash(__('The media file could not uploaded. Please, try again.'));
							$this->Media->delete();
						}
					}
				}
			}
			else{
			
				$this->Media->MediaVideo->set($this->data);
				
				if( $this->Media->validates() && $validMedia = $this->Media->MediaVideo->validates()){
				
					if ($this->Media->save($this->request->data)) {
						
						$this->request->data['MediaVideo']['media_id'] = $this->Media->id;
			 			
						$this->Media->MediaVideo->create();
						
						if ($this->Media->MediaVideo->save($this->request->data)) {
							$this->Session->setFlash(__('The media video has been saved'));
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The media video could not be saved. Please, try again.'));
							$this->Media->delete();
						}

					}
				}
				else{
					if(!$validMedia)
						$this->Session->setFlash('Le media n\'est pas valide');
					else
						$this->Session->setFlash('La vidéo n\'est pas valide');
				}
			}

		}
	
	
	
/*
		if ($this->request->is('post')) {
			$this->Media->create();
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('The media has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		}
*/
		$mediaCategories = $this->Media->MediaCategory->find('list');
		$mediaAuthors = $this->Media->MediaAuthor->find('list');
		$mediaTags = $this->Media->MediaTag->find('list');
		$this->set(compact('mediaCategories', 'mediaAuthors', 'mediaTags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('The media has been saved'));
				$this->redirect(array('action' => 'index', 'admin'=>false));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Media->read(null, $id);
		}
		$mediaCategories = $this->Media->MediaCategory->find('list');
		$mediaAuthors = $this->Media->MediaAuthor->find('list');
		$mediaTags = $this->Media->MediaTag->find('list');
		$this->set(compact('mediaCategories', 'mediaAuthors', 'mediaTags'));
	}
	
	public function admin_edit_media($id = null) {
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		else {
			$ids = $this->Media->findById($id, array('MediaFile.id', 'MediaVideo.id'));
			if(!empty($ids['MediaFile']['id'])){
				$this->redirect(array('controller' => 'mediaFiles', 'action' => 'edit', 'admin'=>true, $ids['MediaFile']['id']));
			}
			else if(!empty($ids['MediaVideo']['id'])){
				$this->redirect(array('controller' => 'mediaVideos', 'action' => 'edit', 'admin'=>true, $ids['MediaVideo']['id']));
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
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}

		if ($this->Media->delete()) {
			/*
				Delete related File if necessary
			*/
			if($path = $this->Media->MediaFile->findByMediaId($id, 'MediaFile.path')){
				$this->Uploader = new Uploader();
				$this->Uploader->delete($path['MediaFile']['path']);
			}
			
			$this->Session->setFlash(__('Media deleted'));
			$this->redirect(array('action' => 'index', 'admin'=>false));
		}
		$this->Session->setFlash(__('Media was not deleted'));

		$this->redirect(array('action' => 'index', 'admin'=>false));
	}

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
