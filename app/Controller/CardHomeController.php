<?php
App::uses('AppController', 'Controller');
/**
 * CardHome Controller
 *
 * @property Card $Card
 */
class CardHomeController extends AppController {
	
public $uses=array('Card');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Card->recursive = 0;
		$this->set('cards', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		$this->set('card', $this->Card->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Card->create();
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The card has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The card could not be saved. Please, try again.'));
			}
		}
		$setInfos = $this->Card->SetInfo->find('list');
		$cardWikiInfos = $this->Card->CardWikiInfo->find('list');
		$teams = $this->Card->Team->find('list');
		$this->set(compact('setInfos', 'cardWikiInfos', 'teams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The card has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The card could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Card->read(null, $id);
		}
		$setInfos = $this->Card->SetInfo->find('list');
		$cardWikiInfos = $this->Card->CardWikiInfo->find('list');
		$teams = $this->Card->Team->find('list');
		$this->set(compact('setInfos', 'cardWikiInfos', 'teams'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('Card deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Card was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
