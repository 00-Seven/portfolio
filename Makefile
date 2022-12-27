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


