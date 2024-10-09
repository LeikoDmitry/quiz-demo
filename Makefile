SHELL := /bin/bash
.DEFAULT_GOAL := help
.PHONY: *

help: ## Список доступных команд
	@printf "\033[0;36mДоступные команды:\033[0m\n"
	@IFS=$$'\n' ; \
	help_lines=(`fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//'`); \
	for help_line in $${help_lines[@]}; do \
		IFS=$$'#' ; \
		help_split=($$help_line) ; \
		help_command=`echo $${help_split[0]} | sed -e 's/^ *//' -e 's/ *$$//' -e 's/:.*//' -e 's/://'` ; \
		help_info=`echo $${help_split[2]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
		printf "\033[0;32m  %-15s \033[0m \t %s\n" $$help_command $$help_info ; \
	done

start: ## Запуск проекта
	@printf "\033[0;36mStarting environment ...\033[0m\n"
	@[[ -f .env ]] || (echo ".env not found" && exit 1)
	@cd docker && docker-compose up -d --build

install: ## Загрузка нужных зависимостей
	@printf "\033[0;36mRun install all dependencies: \033[0m\n"
	@cd docker && docker-compose exec php composer install

migration: ## Запуск миграций
	@printf "\033[0;36mRun migration: \033[0m\n"
	@cd docker && docker-compose exec php php bin/console doctrine:migrations:migrate


fixtures: ## Запуск фикстур
	@printf "\033[0;36mRun fixtures: \033[0m\n"
	@cd docker && docker-compose exec php bin/console doctrine:fixtures:load --purge-with-truncate -n

tests: ## Запуск тестов
	@printf "\033[0;36mRun tests: \033[0m\n"
	@cd docker && docker-compose exec php php vendor/bin/phpunit

cs-fix: ## Правка кода
	@printf "\033[0;36mPHP CS Fixer FIX: \033[0m"
	@cd docker && docker-compose exec php php vendor/bin/php-cs-fixer fix src

environments: ## Добавление env переменных
	@printf "\033[0;36mRun env: \033[0m"
	cp -n .env.example .env && cd docker && cp -n .env.example .env

