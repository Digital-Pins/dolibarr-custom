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

print '<p>أداة تهيئة التطوير الآن في: <code>dolibarr-dev/dev-scripts/pin_activate.php</code> (خارج webroot).</p>';
print '<p>لتشغيلها بأمان من جهاز التطوير أو داخل الحاوية (مؤقتاً):</p>';
print '<pre style="background:#f6f8fa;padding:10px;border-radius:4px"># من المضيف (نسخ الملف إلى الحاوية ثم تشغيله):\n';
print 'docker cp dolibarr-dev/dev-scripts/pin_activate.php dolibarr_php:/var/www/html/pin_activate.php && docker exec -i dolibarr_php php /var/www/html/pin_activate.php\n\n';
print '# مباشرة داخل الحاوية إذا كان الملف موجوداً في webroot:\n';
print 'docker exec -i dolibarr_php php /var/www/html/pin_activate.php</pre>';

print '</div>';

llxFooter();

?>
