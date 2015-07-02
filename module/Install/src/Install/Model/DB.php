<?php
/**
 * The class for maintain database structure.
 */
namespace Install\Model;
use Zend\Db\Metadata\Metadata;
use Zend\Db\Adapter\Adapter;
use Zend\Config\Config;


class DB extends Metadata
{
    public $config = NULL;

    function __construct($config)
    {
        $this->config = $config;
        parent::__construct(new Adapter(array(
            'driver' => $config['driver'],
            'hostname'=>$config['hostname'],
            'username' => $config['username'],
            'password' => $config['password'],
        )));
        
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
        
            $createDatabse_stament = $this->adapter->createStatement('CREATE DATABASE IF NOT EXISTS `'.$this->config['database'].'` CHARACTER SET = utf8 COLLATE = utf8_general_ci');
            $rs = $createDatabse_stament->execute();
            
            parent::__construct(new Adapter($this->config));
            
            if ( $this->adapter->getCurrentSchema() == $this->config['database'] ){
                
                $local_db_config = new Config(array('db'=>$this->config), true);
                $writer = new \Zend\Config\Writer\PhpArray();
                $writer->toFile('config/autoload/local.php', $local_db_config);
                
            }
        
        } catch (\Exception $e) {
            throw $e;
        }
        
        
    }
    
    private function generateConfigFile(){
        
    }
    
    private function create_tables() {
        echo $this->adapter->getCurrentSchema();
    }
}

?>