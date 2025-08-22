<?php
/**
 * Simple admin page for pin_hello module (development/demo).
 */
require '../../../main.inc.php';

if (empty($user) || empty($user->admin)) {
    accessforbidden();
}

$langs->load('admin');

llxHeader('', 'Pin Hello - Admin');

print '<div class="center">';
print '<h1>Pin Hello — صفحة الإدارة</h1>';

$isEnabled = (!empty($conf->global->MAIN_MODULE_PINHELLO) && $conf->global->MAIN_MODULE_PINHELLO == '1') ? 'مفعل' : 'غير مفعل';
print '<p>حالة الموديول: <strong>' . $isEnabled . '</strong></p>';

print '<p><a class="button" href="/admin/pin_activate.php">تشغيل أداة تهيئة الموديول (dev)</a></p>';

print '</div>';

llxFooter();

?>
