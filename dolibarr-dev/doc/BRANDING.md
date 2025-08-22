Digital PIN — Branding Guidelines

Purpose
-------
This document captures the initial branding rules used in the Digital PIN Dolibarr
fork. It is intentionally concise and pragmatic to help devs and designers keep
consistency.

Colors
------
- Primary: #2ecc71 (Emerald Green)
- Bright / Accent: #3498db (Bright Blue)
- Background: #f9f9f9 (Off-White)
- Dark: #1a2a3a (Dark Navy)
- Accent Gold: #f1c40f

Typography
----------
Primary UI font: Montserrat (Google Fonts)
Use font weights: 300, 400, 600, 700

Logo
----
Keep logos in `dolibarr-dev/htdocs/theme/logo/` and prefer SVG source. Provide
square and horizontal variants.

Favicon
-------
- Source SVG: `theme/favicon.svg`
- PNG fallbacks: `favicon-16.png`, `favicon-32.png`, `favicon-64.png`

Accessibility
-------------
Aim for WCAG AA contrast ratios for text and important UI elements. Use visible
focus styles and avoid relying on color alone to convey state.

Files changed in branch `deploy/docker-clean`
--------------------------------------------
- `dolibarr-dev/htdocs/theme/custom.css.php` — added branding tokens, Montserrat, and UI improvements.
- `dolibarr-dev/htdocs/theme/favicon.svg`, `favicon-16.png`, `favicon-32.png`, `favicon-64.png` — branding icons.
- `dolibarr-dev/custom/pin_hello` — demo module + admin page + dev helper moved to `dolibarr-dev/dev-scripts/`.

Next steps
----------
- Review visual changes on login and dashboard pages; iterate padding/typography.
- Consider hosting Montserrat locally for privacy/performance.
- Prepare a small set of UI components (buttons, cards) as template includes.
