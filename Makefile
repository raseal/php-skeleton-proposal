all: help
.PHONY: help status build composer-install build-container start stop down destroy shell test hooks run-tests

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

help: Makefile
	@sed -n 's/^##//p' $<

## status:	Show containers status
status:
	@docker-compose ps

## build:		Start container and install packages
build: build-container start hooks composer-install

## build-container:Rebuild a container
build-container:
	@docker-compose up --build --force-recreate --no-deps -d

## start:		Start container
start:
	@docker-compose up -d

## stop:		Stop containers
stop:
	@docker-compose stop

## down:		Stop containers and remove stopped containers and any network created
down:
	@docker-compose down

## destroy:	Stop containers and remove its volumes (all information inside volumes will be lost)
destroy:
	@docker-compose down -v

## shell:		Interactive shell inside docker
shell:
	@docker-compose exec php_container sh

## install:	Install packages
composer-install:
	docker-compose exec php_container composer install

## test:		Run all tests inside Docker
test:
	@docker-compose exec php_container make run-unit-tests

run-unit-tests:
	XDEBUG_MODE=coverage ./vendor/bin/phpunit --exclude-group='disabled' --coverage-html build --testsuite myProject
