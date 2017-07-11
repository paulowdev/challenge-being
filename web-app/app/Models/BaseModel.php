<?php
namespace App\Models;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class BaseModel
{
    protected $setup;
    protected $conn;
    public $em;

    public function __construct()
    {
        $this->setup = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . $GLOBALS['path_models']), $GLOBALS['doctrine_dev_mode']);
        $this->conn = array(
            'driver' => $GLOBALS['db_driver'],
            'user' => $GLOBALS['db_user'],
            'password' => $GLOBALS['db_password'],
            'dbname' => $GLOBALS['db_name'],
        );
        $this->em = EntityManager::create($this->conn, $this->setup);
    }

}