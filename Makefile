# ------- Dolibarr Custom Makefile -------

# Variables
DEV_ENV=.env
STAGING_ENV=.env.staging
COMPOSE=docker-compose

# ------- Commands -------
up-dev:
	$(COMPOSE) --env-file $(DEV_ENV) up -d

up-staging:
	$(COMPOSE) --env-file $(STAGING_ENV) up -d

down:
	$(COMPOSE) down

logs:
	$(COMPOSE) logs -f

ps:
	$(COMPOSE) ps

restart-dev: down up-dev

restart-staging: down up-staging

# ------- Database -------
db-shell-dev:
	docker exec -it dolibarr_db mysql -u$$DB_USER -p$$DB_PASSWORD $$DB_NAME

db-shell-staging:
	docker exec -it dolibarr_db mysql -u$$DB_USER -p$$DB_PASSWORD $$DB_NAME

seed-dev:
	@export $$(grep -v '^#' .env | xargs) && \
	docker exec -i dolibarr_db mysql -u$$DB_USER -p$$DB_PASSWORD $$DB_NAME < ./seed/dev.sql

seed-staging:
	@export $$(grep -v '^#' .env.staging | xargs) && \
	docker exec -i dolibarr_db mysql -u$$DB_USER -p$$DB_PASSWORD $$DB_NAME < ./seed/staging.sql
