say_hello:
	echo "Hello World"
update:
	git pull
down:
	docker-compose down
up:
	docker-compose up --build -d
restart:
	make update && make down && make up
auto1:
	docker exec portfolio php artisan schedule:work
migrate:
	docker exec portfolio php artisan migrate:fresh --seed --force

