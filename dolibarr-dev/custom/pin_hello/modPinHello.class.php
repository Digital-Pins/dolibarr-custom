<?php
/* Minimal demo module for Digital PIN */
class modPinHello extends DolibarrModules
{
    public $name = 'pin_hello';
    public $numero = 300000; // high number to avoid conflicts
    public $family = 'other';
    public $version = 'development';
    public $picto = 'pin_hello@pin_hello';

    public function __construct($db)
    {
        $this->db = $db;
        $this->rights = array();
        $this->familyinfo = array();
        $this->module_position = 50000;
    }

    public function init($options = '')
    {
        $sql = array();
        // create constant to mark module enabled
        dolibarr_set_const($this->db, 'MAIN_MODULE_PINHELLO', '1', 'chaine', 0, '', $conf->entity ?? 1);
        return $this->_init($sql, $options);
    }

    public function remove($options = '')
    {
        $sql = array();
        dolibarr_del_const($this->db, 'MAIN_MODULE_PINHELLO', 0);
        return $this->_remove($sql, $options);
    }

    public function getName()
    {
        return 'Pin Hello';
    }

    public function getDesc()
    {
        return 'Demo module to validate Digital PIN module pipeline.';
    }
}
