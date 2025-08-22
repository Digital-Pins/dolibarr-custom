<?php
/**
 * custom.css.php
 *
 * Copyright (c) 2023 Eric Seigne <eric.seigne@cap-rel.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

if (!defined('NOREQUIRESOC')) {
	define('NOREQUIRESOC', '1');
}
//if (! defined('NOREQUIRETRAN')) define('NOREQUIRETRAN','1');	// Not disabled because need to do translations
if (!defined('NOCSRFCHECK')) {
	define('NOCSRFCHECK', 1);
}
if (!defined('NOTOKENRENEWAL')) {
	define('NOTOKENRENEWAL', 1);
}
if (!defined('NOLOGIN')) {
	define('NOLOGIN', 1); // File must be accessed by logon page so without login.
}
if (!defined('NOREQUIREHTML')) {
	define('NOREQUIREHTML', 1);
}
if (!defined('NOREQUIREAJAX')) {
	define('NOREQUIREAJAX', '1');
}

session_cache_limiter('public');

require_once __DIR__.'/../main.inc.php'; // __DIR__ allow this script to be included in custom themes
require_once DOL_DOCUMENT_ROOT.'/core/lib/functions2.lib.php';

// Define css type
top_httphead('text/css');
// Important: Following code is to avoid page request by browser and PHP CPU at each Dolibarr page access.
if (empty($dolibarr_nocache)) {
	header('Cache-Control: max-age=10800, public, must-revalidate');
} else {
	header('Cache-Control: no-cache');
}


print '/* Here, the content of the common custom CSS defined into Home - Setup - Display - CSS'."*/\n";
print getDolGlobalString('MAIN_IHM_CUSTOM_CSS');

// --- Digital PIN branding overrides ---
// Colors chosen from the Digital PIN logo (primary teal, dark blue, accent orange)
print "\n/* Digital PIN branding */\n";
print ":root {\n";
// Color system per provided spec
print "  --dp-primary: #2ecc71; /* Emerald Green */\n";
print "  --dp-bright: #3498db; /* Bright Blue */\n";
print "  --dp-bg: #f9f9f9; /* Off-White */\n";
print "  --dp-dark: #1a2a3a; /* Dark Navy */\n";
print "  --dp-slate: #7f8c8d; /* Slate Gray */\n";
print "  --dp-accent: #f1c40f; /* Soft Gold */\n";
print "  --dp-success: #27ae60;\n";
print "  --dp-warning: #f39c12;\n";
print "  --dp-error: #e74c3c;\n";
print "}\n";

print "/* Header/logo sizing */\n";
print "#header .logo img, .demologo, .imglogoinstall {\n";
print "  max-height: 72px !important;\n";
print "  height: auto !important;\n";
print "}\n";

// Login form and visual polish to match Digital PIN identity
print "body.bodylogin { background: var(--dp-bg) !important; color: var(--dp-dark) !important; }\n";
print ".login_table_title a { color: var(--dp-bright) !important; font-weight: 700; }\n";
print ".button, .butAction { background-color: var(--dp-primary) !important; border-color: var(--dp-primary) !important; color: #fff !important; }\n";
print "a, .link_menu { color: var(--dp-bright) !important; }\n";
print "header, .topmenu, .menu { background-color: var(--dp-dark) !important; }\n";
print "#header .logo img { filter: none; }\n";
print "/* subtle box for login */\n";
print ".login_center { box-shadow: 0 6px 18px rgba(26,42,58,0.12); border-radius: 10px; }\n";

// Use ERP icons in theme assets as needed (example favicon fallback)
print "/* ERP icons available at /theme/assets/erp-icons/ */\n";

print "/* Navbar and primary buttons */\n";
print ".menu, .topmenu, .butAction {\n";
print "  background-color: var(--dp-primary) !important;\n";
print "  color: #fff !important;\n";
print "}\n";

print "/* Accent for links and highlights */\n";
print "a, .link_menu { color: var(--dp-accent) !important; }\n";

print "/* Footer and small text */\n";
print "footer, .poweredbypublicpayment, .opacitymedium { color: var(--dp-dark) !important; }\n";

print "/* Make logo area a bit more prominent on desktop */\n";
print "@media (min-width: 768px) {\n";
print "  #header .logo { padding: 8px 12px !important; }\n";
print "}\n";

// Print favicon and apple-touch icon links so they are present in the HTML head
print "\n/* Favicon links */\n";
print "<link rel=\"icon\" type=\"image/svg+xml\" href=\"".DOL_URL_ROOT."/theme/favicon.svg\">\n";
print "<link rel=\"icon\" type=\"image/png\" href=\"".DOL_URL_ROOT."/theme/dolibarr_256x256_color.png\">\n";
print "<link rel=\"icon\" type=\"image/png\" sizes=\"64x64\" href=\"".DOL_URL_ROOT."/theme/favicon-64.png\">\n";
print "<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"".DOL_URL_ROOT."/theme/favicon-32.png\">\n";
print "<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"".DOL_URL_ROOT."/theme/favicon-16.png\">\n";
print "<link rel=\"apple-touch-icon\" href=\"".DOL_URL_ROOT."/theme/apple-touch-icon.png\">\n";

// Add Montserrat font import and typography settings
print "\n/* Load Montserrat webfont */\n";
print "@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');\n";
print "/* Set Montserrat as primary UI font */\n";
print "body, button, input, select, textarea { font-family: 'Montserrat', Arial, sans-serif !important; }\n";
print "h1,h2,h3,h4 { font-weight: 700 !important; }\n";
// Design system tokens (typography scale, spacing, radii)
print "\n/* Design tokens */\n";
print ":root { --dp-font-base-size: 16px; --dp-line-height: 1.45; --dp-radius: 10px; --dp-card-padding: 18px; }\n";

// Global typography rhythm and sensible defaults
print "body { font-size: var(--dp-font-base-size) !important; line-height: var(--dp-line-height) !important; }\n";
print "h1 { font-size: 1.75rem; margin-bottom: 0.5rem; }\n";
print "h2 { font-size: 1.4rem; margin-bottom: 0.5rem; }\n";
print "h3 { font-size: 1.125rem; margin-bottom: 0.4rem; }\n";

// Refined button styles for a consistent, elevated CTA
print "\n/* Buttons: consistent shape, shadow and transitions */\n";
print ".button, .butAction { border-radius: var(--dp-radius) !important; padding: 10px 16px !important; box-shadow: 0 4px 14px rgba(26,42,58,0.08); transition: transform 120ms ease, box-shadow 120ms ease; }\n";
print ".button:hover, .butAction:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(26,42,58,0.12); }\n";
print ".button:focus, .butAction:focus { outline: 3px solid rgba(52,152,219,0.18); outline-offset: 2px; }\n";

// Card component to use in dashboards
print "\n/* Card component */\n";
print ".dp-card { background: #fff; border-radius: var(--dp-radius); padding: var(--dp-card-padding); box-shadow: 0 6px 18px rgba(26,42,58,0.06); }\n";

// Login improvements: centered content, spaced form controls
print "\n/* Login form polish */\n";
print ".login_table { padding: 24px !important; max-width: 520px; margin: 0 auto; }\n";
print ".login_table input[type=\"text\"], .login_table input[type=\"password\"] { padding: 12px !important; border-radius: 8px !important; border: 1px solid rgba(26,42,58,0.08); box-shadow: none !important; }\n";
print ".login_center { background: linear-gradient(4deg, rgba(249,249,249,0.9) 52%, rgba(60,70,100,0.02) 52.1%); padding: 24px; }\n";

// Accessibility: ensure link contrast and focus styles
print "\n/* Accessibility helpers */\n";
print "a { text-decoration: none; }\n";
print "a:focus { outline: 3px solid rgba(46,204,113,0.14); outline-offset: 2px; }\n";

// Small utility spacing
print "\n/* Utilities */\n";
print ".dp-row { display:flex; gap:12px; align-items:center; }\n";

