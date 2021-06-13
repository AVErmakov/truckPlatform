fresh:
	docker-compose run --rm php-cli php artisan migrate:fresh --seed


rollback:
	docker-compose run --rm php-cli php artisan migrate:rollback
