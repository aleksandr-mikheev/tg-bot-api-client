EXEC=@docker compose exec -it php

up:
	docker compose up --detach --remove-orphans

down:
	docker compose down --remove-orphans

start:
	docker compose start

stop:
	docker compose stop

sh:
	$(EXEC) sh

fixcs:
	$(EXEC) vendor/bin/php-cs-fixer fix --diff --verbose

lint:
	$(EXEC) vendor/bin/php-cs-fixer fix --diff --verbose --dry-run

phpstan:
	$(EXEC) vendor/bin/phpstan

rector-fix:
	$(EXEC) vendor/bin/rector process

rector:
	$(EXEC) vendor/bin/rector process --dry-run
