<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');
        var $components = array('Auth','Security','Session');
        
        //public $components = array('RecaptchaPlugin.Recaptcha');
	//public $helpers = array('RecaptchaPlugin.Recaptcha');
        
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
        /**
     * Runs automatically before the controller action is called
         */
        function beforeFilter()
        {
            $this->Auth->allow('register');
            parent::beforeFilter();
        }

	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

        //Registration

        function register(){
            
           if ($this->request->is('post')) {
            $this->User->create();
            
            /** $save_data = array(
                            'full_name' => $this->data['User']['full_name'],
                            'email' => $this->data['User']['email'],
                            'user_name' => $this->data['User']['user_name'],
                            'password' => $this->data['User']['password'],
                            'paypal_account_name' => $this->data['User']['paypal_account_name'],
                            'address' => $this->data['User']['address'],
                            'phone' => $this->data['User']['phone'],
                            'status' => 'active',
                        ); 
        
            $insert = $this->User->save($save_data); **/
            $insert = $this->User->save($this->request->data);
            if ($insert) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => '/register'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }

        }
        
  
   
}
