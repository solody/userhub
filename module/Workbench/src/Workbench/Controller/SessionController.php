<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Workbench for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Workbench\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class SessionController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /session/session/foo
        return array();
    }
    
    public function loginAction() {
        ;
    }
    
    public function logoutAction() {
        // 删除session数据，然后跳转到登录界面
        
        echo '=========';
        $this->redirect('login');
    }
}
