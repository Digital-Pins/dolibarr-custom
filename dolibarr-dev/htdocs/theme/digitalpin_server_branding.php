<?php
// Robust server-side branding filter for Digital PIN
// No DOL_URL_ROOT guard: allow inclusion as early as possible during bootstrap.
// Log inclusion for debugging (written inside container /tmp)
@file_put_contents('/tmp/digitalpin_branding.log', date('Y-m-d H:i:s') . " - included\n", FILE_APPEND);
if (!defined('DIGITALPIN_BRANDING_BUFFER_STARTED')) {
	define('DIGITALPIN_BRANDING_BUFFER_STARTED', 1);
	ob_start(function ($buffer) {
			@file_put_contents('/tmp/digitalpin_branding.log', date('Y-m-d H:i:s') . " - callback start, buffer_len=" . strlen($buffer) . "\n", FILE_APPEND);
		// Avoid processing for known non-HTML endpoints (CSS endpoint, font files, etc.)
		if (!empty($_SERVER['REQUEST_URI']) && (strpos($_SERVER['REQUEST_URI'], '/theme/custom.css.php') !== false || preg_match('#/theme/fonts/#', $_SERVER['REQUEST_URI']))) {
			// Return original buffer untouched for binary/text assets
			return $buffer;
		}

		// Debug marker will be prepended only for HTML outputs after successful
		// processing to avoid injecting comments into stylesheets or other
		// non-HTML responses.

		// Try DOM-based replacement
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
			$ok = $doc->loadHTML('<?xml encoding="utf-8" ?>' . $buffer, LIBXML_HTML_NODEFDTD | LIBXML_HTML_NOIMPLIED);
			@file_put_contents('/tmp/digitalpin_branding.log', date('Y-m-d H:i:s') . " - dom_load_ok=" . ($ok ? '1' : '0') . "\n", FILE_APPEND);
		if ($ok) {
			$xpath = new DOMXPath($doc);
			$nodes = $xpath->query('//text()[not(ancestor::script) and not(ancestor::style) and not(ancestor::noscript) and normalize-space(.) != ""]');
			$replacements = [
				'Dolibarr 22.0.0' => 'Digital PIN ERP Project v 0.0.2',
				'Dolibarr' => 'Digital PIN ERP Project'
			];
			foreach ($nodes as $textNode) {
				$orig = $textNode->nodeValue;
				$new = $orig;
				foreach ($replacements as $from => $to) {
					$new = preg_replace('/\b'.preg_quote($from, '/').'\b/u', $to, $new);
				}
				if ($new !== $orig) $textNode->nodeValue = $new;
			}
			$html = $doc->saveHTML();
				@file_put_contents('/tmp/digitalpin_branding.log', date('Y-m-d H:i:s') . " - saveHTML_len=" . strlen($html) . "\n", FILE_APPEND);
			$html = preg_replace('/^<\?xml.*?\?>/','',$html);
			// Fallback regex for title and anchor texts that might be generated after DOM parsing
				$html = preg_replace('/\bDolibarr 22\.0\.0\b/u', 'Digital PIN ERP Project v 0.0.2', $html);
			$html = preg_replace('/\bDolibarr\b/u', 'Digital PIN ERP Project', $html);
				// Targeted replacement for the <title>Login @ 22.0.0</title>
				$html = str_replace('<title>Login @ 22.0.0</title>', '<title>Login @ Digital PIN ERP Project v 0.0.2</title>', $html);
			// Ensure login title anchor and title attribute are replaced exactly
			$html = str_replace('<div class="login_table_title center" tabindex="-1" title="Dolibarr 22.0.0">', '<div class="login_table_title center" tabindex="-1" title="Digital PIN ERP Project v 0.0.2">', $html);
			$html = str_replace('>Dolibarr 22.0.0</a>', '>Digital PIN ERP Project v 0.0.2</a>', $html);
			// Prepend debug marker for HTML responses and return
			return "<!--DPBRAND-->" . $html;
		}
		// fallback plain replace
		$out = str_replace(
			array('Dolibarr 22.0.0', 'Dolibarr'),
			array('Digital PIN ERP Project v 0.0.2', 'Digital PIN ERP Project'),
			$buffer
		);
		// If the result looks like HTML, prepend debug marker; otherwise return as-is
		if (stripos($out, '<html') !== false || stripos($out, '<body') !== false || stripos($out, '<div') !== false) {
			return "<!--DPBRAND-->" . $out;
		}
		return $out;
	});
}

