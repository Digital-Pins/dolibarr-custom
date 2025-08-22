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

// Fetch the optional custom CSS stored in Dolibarr (it may come from the GUI)
// and sanitize a couple of common HTML wrappers that break CSS parsing when
// the value was entered via a WYSIWYG editor (HTML comments, <p> wrappers).
$raw_custom_css = getDolGlobalString('MAIN_IHM_CUSTOM_CSS');
if (!empty($raw_custom_css)) {
	// Robustly strip any leading/trailing HTML tags or comments that may have
	// been added by editors or copy/paste (examples: <!--DPBRAND-->, <p> wrappers).
	// We only remove tags/comments at the very start or end to avoid altering
	// legitimate CSS that may contain < or > inside strings (rare).
	$raw_custom_css = preg_replace('/^\s*(?:<!--.*?-->|<[^>]+>)+/s', '', $raw_custom_css);
	$raw_custom_css = preg_replace('/(?:<!--.*?-->|<[^>]+>)+\s*$/s', '', $raw_custom_css);

	// As an extra safety, convert any Windows CRLF to LF
	$raw_custom_css = str_replace("\r\n", "\n", $raw_custom_css);

	// Print cleaned CSS
	print $raw_custom_css."\n";
}

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
// Set a soft neutral overall page background; keep body text dark for contrast
print "body.bodylogin { background: #f4f6f8 !important; color: var(--dp-dark) !important; }\n";
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
print ".topmenu, .butAction {\n";
print "  background-color: var(--dp-primary) !important;\n";
print "  color: #fff !important;\n";
print "}\n";

// Sidebar (left menu) background: dark navy as requested (0a2540)
print "/* Sidebar background - increased specificity to override theme */\n";
print "body .left, body #left, body .menuLeft, body .menu, body #leftmenu, body .blockvmenustatic { background-color: #0a2540 !important; color: #ffffff !important; }\n";
print "body .left a, body #left a, body .menuLeft a, body .menu a, body .link_menu, body #left .link_menu { color: rgba(255,255,255,0.95) !important; }\n";
print "body .left .menu-link, body .menu .menu-link { color: rgba(255,255,255,0.95) !important; }\n";
print "/* Ensure icons in sidebar also contrast */\n";
print "body .menu i, body #left i { color: rgba(255,255,255,0.85) !important; }\n";

print "/* Accent for links and highlights */\n";
print "a, .link_menu { color: var(--dp-accent) !important; }\n";

print "/* Footer and small text */\n";
print "footer, .poweredbypublicpayment, .opacitymedium { color: var(--dp-dark) !important; }\n";

print "/* Make logo area a bit more prominent on desktop */\n";
print "@media (min-width: 768px) {\n";
print "  #header .logo { padding: 8px 12px !important; }\n";
print "}\n";

// NOTE: Favicon and apple-touch links were previously output here. That produced
// HTML inside a stylesheet which can break CSS parsing in some browsers. Favicon
// links should be emitted from the HTML head (see htdocs/main.inc.php). Keeping
// this file CSS-only.

// Add Montserrat font import and typography settings
print "\n/* Local fonts: Tajawal (Arabic) + Inter & Roboto Condensed (Latin) */\n";
// Tajawal (Arabic) - several weights
print "@font-face { font-family: 'Tajawal'; src: url('".DOL_URL_ROOT."/theme/fonts/Tajawal/Tajawal-Regular.ttf') format('truetype'); font-weight: 400; font-style: normal; font-display: swap; }\n";
print "@font-face { font-family: 'Tajawal'; src: url('".DOL_URL_ROOT."/theme/fonts/Tajawal/Tajawal-Medium.ttf') format('truetype'); font-weight: 500; font-style: normal; font-display: swap; }\n";
print "@font-face { font-family: 'Tajawal'; src: url('".DOL_URL_ROOT."/theme/fonts/Tajawal/Tajawal-Bold.ttf') format('truetype'); font-weight: 700; font-style: normal; font-display: swap; }\n";

// Inter (Latin) - variable/regular fallback
print "@font-face { font-family: 'Inter'; src: url('".DOL_URL_ROOT."/theme/fonts/Inter/Inter-VariableFont_opsz,wght.ttf') format('truetype'); font-weight: 100 900; font-style: normal; font-display: swap; }\n";

// Roboto Condensed as secondary Latin option
print "@font-face { font-family: 'Roboto Condensed'; src: url('".DOL_URL_ROOT."/theme/fonts/Roboto_Condensed/static/RobotoCondensed-Regular.ttf') format('truetype'); font-weight: 400; font-style: normal; font-display: swap; }\n";
print "@font-face { font-family: 'Roboto Condensed'; src: url('".DOL_URL_ROOT."/theme/fonts/Roboto_Condensed/static/RobotoCondensed-Bold.ttf') format('truetype'); font-weight: 700; font-style: normal; font-display: swap; }\n";

// Apply font stacks: Tajawal for Arabic, Inter/Roboto for Latin
print "html[lang^=ar] body, :lang(ar) { font-family: 'Tajawal', Arial, sans-serif !important; font-weight: 400 !important; }
";
print "body, button, input, select, textarea { font-family: 'Inter', 'Roboto Condensed', Arial, sans-serif !important; font-weight: 400 !important; }
";

// Explicit heading weights (stronger visual hierarchy)
print "h1 { font-weight: 800 !important; }
";
print "h2 { font-weight: 700 !important; }
";
print "h3 { font-weight: 600 !important; }
";
print "h4 { font-weight: 600 !important; }
";

// Emphasis, buttons and sidebar weight tuning
print "strong, b { font-weight: 700 !important; }
";
print ".button, .butAction { font-weight: 600 !important; }
";
print "body .left a, body #left a, body .menuLeft a, body .menu a, body .link_menu, body #left .link_menu { font-weight: 600 !important; }
";

// For variable Inter font, prefer numeric weights to access the variable axis
print "@supports (font-variation-settings: normal) { body { font-variation-settings: 'wght' 400; } }
";

// Ensure headings also use appropriate font-variation when available
print "@supports (font-variation-settings: normal) {
  h1 { font-variation-settings: 'wght' 800; }
  h2 { font-variation-settings: 'wght' 700; }
  h3 { font-variation-settings: 'wght' 600; }
}
";

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

// TEMP VISUAL TEST: make login panel clearly visible to confirm CSS injection
// TEMP VISUAL TEST removed after visual confirmation.

// Small utility spacing
print "\n/* Utilities */\n";
print ".dp-row { display:flex; gap:12px; align-items:center; }\n";

// UX & micro-interaction improvements to reduce cognitive load for routine work
print "\n/* UX improvements: readable text, subtle motion, table rhythm, and clearer active state */\n";
print "html, body { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; text-rendering: optimizeLegibility; }\n";
print "p { margin-bottom: 0.9rem; color: rgba(10,37,64,0.88); }\n";
print ".muted, .opacitymedium { color: rgba(10,37,64,0.6) !important; }\n";

print "/* Cards: lift on hover to indicate interactivity (subtle) */\n";
print ".dp-card { transition: transform 180ms ease, box-shadow 180ms ease; will-change: transform; }\n";
print ".dp-card:hover { transform: translateY(-6px); box-shadow: 0 22px 48px rgba(10,37,64,0.12); }\n";

print "/* Tables: improved row rhythm and hover focus for scanning lists */\n";
print "table.listing tbody tr:nth-child(even) { background: rgba(10,37,64,0.02); }\n";
print "table.listing tbody tr:hover { background: rgba(46,204,113,0.03) !important; }\n";

print "/* Sidebar links: clearer active state and gentle hover */\n";
print "body .left a, body .left .link_menu, body .menu a, body .link_menu { transition: background-color 120ms ease, color 120ms ease, padding-left 120ms ease; }\n";
print "body .left a.active, body .left a:focus, body .left a:hover, body .left .link_menu.active, body .left .link_menu:focus, body .left .link_menu:hover { background: linear-gradient(90deg, rgba(255,255,255,0.02), rgba(255,255,255,0.006)) !important; border-left: 4px solid var(--dp-primary) !important; padding-left: calc(12px - 4px) !important; }\n";

print "/* Headings: small accent bar for quick scan */\n";
print ".dp-card h3, .dp-card h2 { position: relative; padding-left: 10px; }\n";
print ".dp-card h3::before, .dp-card h2::before { content: ''; position: absolute; left: 0; top: 10px; width: 4px; height: calc(100% - 20px); background: linear-gradient(180deg, var(--dp-primary), var(--dp-bright)); border-radius: 2px; opacity: 0.95; }\n";

print "/* Button micro-interaction: slight scale on hover for clarity */\n";
print ".button, .butAction { transition: transform 120ms cubic-bezier(.2,.9,.2,1), box-shadow 120ms ease; }\n";
print ".button:hover, .butAction:hover { transform: translateY(-3px); }\n";

print "/* Form focus: visible yet soft */\n";
print "input:focus, select:focus, textarea:focus { box-shadow: 0 6px 22px rgba(46,204,113,0.08); border-color: rgba(46,204,113,0.14); }\n";

print "/* Respect reduced motion preferences */\n";
print "@media (prefers-reduced-motion: reduce) { .dp-card, .button, .butAction, body .left a { transition: none !important; transform: none !important; } }\n";

