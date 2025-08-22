<?php
// Module descriptor for Pin Hello placed in core/modules to be discovered
class modpinhello extends DolibarrModules
{
    public $name = 'pin_hello';
    public $numero = 300001;
    public $family = 'other';
    public $version = 'development';
    public $picto = 'pin_hello@pin_hello';

    public function __construct($db)
    {
        $this->db = $db;
        $this->module_position = 50001;
    }

    public function init($options = '')
    {
        $sql = array();
    global $conf;
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
