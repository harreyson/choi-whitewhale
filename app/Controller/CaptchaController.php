<?php 
class CaptchaController extends AppController {
    function display() {
        if (!$this->Session->check('User.Captcha.code')) 
        {
            $this->Session->write('User.Captcha.code', "123456");
        }
        $this->layout="image";
        $this->Captcha->generate($this->Session->read('User.Captcha.code')); 
    }
}