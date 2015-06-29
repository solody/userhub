<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Install for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Install\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Install\Form\InstallForm;
use Zend\Db\Adapter\Adapter;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $headTitle = $this->getServiceLocator()->get('viewHelperManager')->get('headTitle');
        $translator = $this->getServiceLocator()->get('translator');
        
        $headTitle->append($translator->translate('Installing The UserHub System'));
        
        $form = new InstallForm();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            
            // Test the account by form submited.
            $adapter = new Adapter(array(
                'driver' => 'Mysqli',
                'database' => 'userhub',
                'username' => 'root',
                'password' => 'abc123'
            ));
            
            $adapter->query('use userhub');
            
        }
        
        return array('form'=>$form);
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
