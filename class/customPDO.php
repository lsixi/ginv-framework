<?php
class customPDO extends \PDO
{

    public function __construct($config)
    {
        $dns = $config['driver'] .
            ':host=' . $config['host'] .
            ((!empty($config['port'])) ? (';port=' . $config['port']) : '') .
            ';dbname=' . $config['database'].';charset='.$config['charset'];
        parent::__construct($dns, $config['username'], $config['password'], [
            parent::ATTR_EMULATE_PREPARES => false,
        ]);
        parent::setAttribute(parent::ATTR_ERRMODE, parent::ERRMODE_EXCEPTION);
    }
}