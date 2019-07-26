# Project variables
PROJECT_NAME ?=
TARGET_MAX_CHAR_NUM=10

# Folder Directory
NGINX_DIR := ~/../../usr/local/etc/nginx/

.PHONY: help

## Show help
help:
	@echo ''
	@echo 'Usage:'
	@echo '${YELLOW} make ${RESET} ${GREEN}<target> [options]${RESET}'
	@echo ''
	@echo 'Targets:'
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		message = match(lastLine, /^## (.*)/); \
		if (message) { \
			command = substr($$1, 0, index($$1, ":")-1); \
			message = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} %s\n", command, message; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)
	@echo ''

## Sets up the nginx configurations
server-setup:
	@ ${INFO} "Setting up your nginx server ..."
	@ cp ${NGINX_DIR}nginx.conf ${NGINX_DIR}nginx.conf.backup
	@ sudo rm -rf ${NGINX_DIR}nginx.conf
	@ cp ./deployment/dev/nginx.conf ${NGINX_DIR} 
	@ ${INFO} "Setup successful!"
	@ echo " "

## Restores the default nginx configurations
server-restore:
	@ ${INFO} "Restoring your default nginx server configurations ..."
	@ sudo rm -rf ${NGINX_DIR}nginx.conf
	@ cp ${NGINX_DIR}nginx.conf.backup ${NGINX_DIR}nginx.conf
	@ sudo rm -rf ${NGINX_DIR}nginx.conf.backup
	@ ${INFO} "Restoration successful!"
	@ echo " "

## Reloads the nginx configurations and restarts the nginx server
server-refresh:
	@ ${INFO} "Refreshing your nginx server configurations ..."
	@ echo ''
	@ make server-restore && make server-setup
	@ sudo brew services restart nginx
	@ ${INFO} "Restoration successful!"
	@ echo " "

## Set local url on mac
set-url:
	@ ${INFO} "Updating hosts file"
	@ echo "127.0.0.1  yii-todo-dev.com" | sudo tee -a /etc/hosts
	@ ${INFO} "Update completed successfully"

  # COLORS
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
NC := "\e[0m"
RESET  := $(shell tput -Txterm sgr0)
# Shell Functions
INFO := @bash -c 'printf $(YELLOW); echo "===> $$1"; printf $(NC)' SOME_VALUE
SUCCESS := @bash -c 'printf $(GREEN); echo "===> $$1"; printf $(NC)' SOME_VALUE
