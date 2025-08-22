<?php
// Temporary CLI helper to init pin_hello module for test. Removes itself after run.
chdir(__DIR__ . '/dolibarr-dev/htdocs');
require 'main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/modules/DolibarrModules.class.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
// Ensure $user is admin for the init
if (empty($user)) $user = new stdClass();
$user->admin = true;
$modfile = DOL_DOCUMENT_ROOT.'/custom/pin_hello/core/modules/modpinhello.class.php';
if (!is_readable($modfile)) {
    echo "ERROR: descriptor missing: $modfile\n";
    exit(1);
}
require_once $modfile;
$mod = new modpinhello($db);
if (!is_object($mod)) {
    echo "ERROR: failed to instantiate module\n";
    exit(1);
}
$res = $mod->init('');
if ($res === false) {
    echo "INIT_FAILED\n";
} else {
    echo "INIT_OK\n";
}
// cleanup
@unlink(__FILE__);
exit(0);
