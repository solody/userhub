<?php
/**
 * The class for maintain database structure.
 */
namespace Install\Model;
use Zend\Db\Metadata\Metadata;
use Zend\Db\Adapter\Adapter;

class DB extends Metadata
{
    public $name = NULL;

    function __construct(Adapter $adapter, $name)
    {
        parent::__construct($adapter);
        $this->name = $name;
    }
    
    /**
     * Where start to install database structure.
     */
    public function install(){
        
        $this->create_database();
        
        $this->create_tables();
        
    }
    
    private function create_database() {

        // Try to create a database named by $post_data->database
        try {
        
            $createDatabse_stament = $this->adapter->createStatement('CREATE DATABASE IF NOT EXISTS `'.$this->name.'` CHARACTER SET = utf8 COLLATE = utf8_general_ci');
            $rs = $createDatabse_stament->execute();
        
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    private function create_tables() {
        ;
    }
}

?>