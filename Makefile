build:
	cd docker && docker-compose build


composer-install:
	cd docker && docker exec docker_php_1 composer install


start:
	$(MAKE) build
	cd docker && docker-compose up -d
	$(MAKE) composer-install

test:
	cd docker && docker exec docker_php_1 ./bin/phpunit