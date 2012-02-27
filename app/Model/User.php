<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';
	public $displayField = 'full_name';
	
/**
 * Validation rules
 *
 * @var array
 */

    var $validate = array(
        'full_name' => array(
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Full Name is Required',
            ),
        ),
        'phone' => array(
            'length' => array(
                'rule'      => array('numeric'),
                'message'   => 'Only numbers is Allowed',
                'required'  => false,
            ),
        ),
        'user_name' => array(
            'length' => array(
                'rule'      => array('minLength', 5),
                'message'   => 'Must be more than 5 characters',
                'required'  => true,
                'message'   => 'Username is Required',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Already taken',
            ),
        ),
        'email' => array(
            'email' => array(
                'rule'      => 'email',
                'message'   => 'Must be a valid email address',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Already taken',
            ),
        ),
          'password' => array(
              'identicalFieldValues' => array(
                    'rule' => array('identicalFieldValues', 'password_confirm' ),
                    'message' => 'The password you entered does not match',
                 ),
                    'empty' => array(
                    'rule'      => 'notEmpty',
                    'message'   => 'Password is Required',
                ),
            ),
       'passwdord_confirm' => array(
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Password Confirm is Required',
            ),
        )
    );
    
    function identicalFieldValues($field=array(), $compare_field=null) 
    {
        foreach($field as $key => $value){
            $v1 = $value;
            $v2 = $this->data[$this->name][$compare_field];                  
            if($v1 !== $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    } 
    
    
}
