fresh:
	docker-compose run --rm php-cli php artisan migrate:fresh --seed

com:
	docker-compose run --rm php-cli php artisan commandi:name
