<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
                    if ($this->User->validates(array('fieldList' => array('User.full_name','User.phone','User.user_name','User.email')))) {
                       if ($this->request->data) {
                           
                                $this->User->read(null, $id);
                                //$this->User->set('full_name', $this->request->data['User']['full_name']);
                                //$this->User->save();
                                
                                /**$this->User->set(array(
                                    'full_name' => $this->request->data['User']['full_name'],
                                    'email' => $this->request->data['User']['email'],
                                    'user_name' => $this->request->data['User']['user_name'],
                                    'paypal_account_name' => $this->request->data['User']['paypal_account_name'],
                                    'address' => $this->request->data['User']['address'],
                                    'phone' => $this->request->data['User']['phone'],
                                    'status' => $this->request->data['User']['status'],
                                ));
                               
                                $this->User->save(); **/
                                $this->User->saveField('full_name', $this->request->data['User']['full_name']);
                                $this->User->saveField('email', $this->request->data['User']['email']);
                                $this->User->saveField('user_name', $this->request->data['User']['user_name']);
                                $this->User->saveField('paypal_account_name', $this->request->data['User']['paypal_account_name']);
                                $this->User->saveField('address', $this->request->data['User']['address']);
                                $this->User->saveField('phone', $this->request->data['User']['phone']);
                                $this->User->saveField('status', $this->request->data['User']['status']);
                                //$this->User->save($this->request->data);
				$this->Session->setFlash(__('The user has been updated'));
				$this->redirect(array('action' => 'index'));
                            
			} else {
				$this->Session->setFlash(__('The user could not be updated. Please, try again.'));
			}
                     }
		} else {
			$this->request->data = $this->User->read(null, $id);
                     
		} 
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
