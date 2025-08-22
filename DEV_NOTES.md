Dolibarr Custom — Dev Notes

This repo runs a local demo via Docker Compose. Use these notes to start, seed, and develop.

Quick start
1. Ensure Docker is installed and running.
2. Edit `.env` if needed (defaults provided).
3. Start services:

```
cd /home/pin2/digital-pin-llc/dolibarr-custom
docker-compose up -d
```

Seed development DB:
```
make seed-dev
```

Branding
- Logo stored at: `dolibarr-dev/htdocs/custom/logo/digital-pin-bridge-trust-lockup.svg`
- To apply it in Dolibarr admin UI: go to Setup → Other → Display and upload or reference the custom logo file.

Notes
- The demo image is pulled from Docker Hub: `digital4pin/dolibarr-custom:latest`.
- For production, replace the image with a pinned digest and configure a proper persistent DB and backups.
