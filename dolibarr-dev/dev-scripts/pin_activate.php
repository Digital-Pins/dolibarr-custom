<?php
// Quick admin helper to init the pin_hello module. Development only.
require '../main.inc.php';
// Ensure base module class and admin helpers are loaded before requiring custom module descriptors
require_once DOL_DOCUMENT_ROOT.'/core/modules/DolibarrModules.class.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
global $db, $user, $conf;
if (empty($user) || empty($user->admin)) {
    echo "ERROR: not admin or not logged in";
    exit;
}
// Include module descriptor
$modfile = DOL_DOCUMENT_ROOT.'/custom/pin_hello/core/modules/modpinhello.class.php';
if (!is_readable($modfile)) {
    echo "ERROR: descriptor missing: $modfile";
    exit;
}
$require_ok = @require_once $modfile;
if (!$require_ok) {
    echo "ERROR: failed to include module descriptor: $modfile";
    exit;
}
$mod = new modpinhello($db);
if (!is_object($mod)) {
    echo "ERROR: failed to instantiate module";
    exit;
}
// run init with global context
$res = $mod->init('');
if ($res === false) {
    echo "INIT_FAILED";
} else {
    echo "INIT_OK\n";
}
?>
