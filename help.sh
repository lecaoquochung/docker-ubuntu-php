#!/bin/bash

readonly NAME="lihoubun"
readonly REPO="https://github.com/lecaoquochung/liho-ubun"
readonly LIHOUBUN_PATH="/home/ubuntu/lihoubun"
readonly LIHOUBUN_PUBLIC_PATH="/home/ubuntu/lihoubun/public_html"
readonly API_V1="/home/ubuntu/lihoubun/api-v1/fuel"
readonly API_V2="/home/ubuntu/lihoubun/api-v2"
readonly LOCALHOST="127.0.0.1"

helps() {
	case $1 in
		all|*) allhelps ;;
	esac
}

allhelps() {
cat <<EOF
	help: Show help
	usage: Show simple usage
	
    [Containers]
	build: Build docker service
	init: Initialize development environment; including install composer dependencies
	up or start: Run docker-compose as daemon (or up)
	down or stop: Terminate all docker containers run by docker-compose (or down)
	restart: Restart docker-compose containers
	status: View docker containers status
	logs: View docker containers logs
	ssh: ssh cli
	db: Connect to database CLI
	migrate: Migrate latest database structure
	sql: Insert sql for development
	dump: Dump database
	restore: Restore database
	sass: Pre-processing stylesheet file
	api: Start API server
	oil: Run oil cli
EOF
}

# Usage
usage() {
	echo "Usage:"
	echo "${0} [help|usage|build|init|up|down|restart|status|logs|ssh|db|migrate|sql|dump|restore|sass|api|oil]"
}

# Docker compose build
build() {
	docker-compose build
}

# Run init cmd
# Local dev update every init
# Dependencies: git, composer.phar
init() {
	# Init api-v1
	# docker-compose exec ubuntu /bin/bash -c "cd ./api-v1; composer install"
    docker-compose exec ubuntu /bin/bash -c "cd ./api-v1/fuel; php oil refine install"
	
	# Init api-v2
}

# Docker compose up
start() {
	docker-compose up -d
}

# Docker compose down
stop() {
	docker-compose down 
	docker volume rm ${NAME}_mysql-data
}

# Docker compose restart
restart() {
	docker-compose restart
}

# Docker compose status
status() {
	docker-compose ps
}

# Docker compose logs
logs() {
	case $1 in
		mysql) docker-compose logs mysql ;;
		all|*)  docker-compose logs ;;
	esac
}

# Docker compose logs follow
tailf() {
	case $1 in
		mysql) docker-compose logs -f mysql ;;
		all|*)  docker-compose logs -f ;;
	esac
}

# ssh cli
dockerssh() {
	case $1 in
		mysql) docker-compose exec --user mysql mysql /bin/bash ;;
		nginx) docker-compose exec nginx /bin/bash ;;
		ubuntu|*) docker-compose exec ubuntu /bin/bash ;;
	esac
}

# Connect to docker mysql cli
db_cli() {
	case $1 in
		reset) mysqladmin -u${NAME} -p${NAME} drop ${NAME} -h ${LOCALHOST}; mysqladmin -u${NAME} -p${NAME} create ${NAME} -h ${LOCALHOST} ;;
		db|*) mysql -u${NAME} -p${NAME} -D${NAME} -h 127.0.0.1 ;;
	esac
}

# Migrate latest database
db_migration() {
	# migrate
	readonly MIGRATE_DB="php ${API_V1}/oil r migrate:current --all"
	readonly MIGRATE_DB_API_V2=""
	
    case $1 in
		v2) docker-compose exec ubuntu /bin/bash -c "$MIGRATE_DB_API_V2" ;;
		v1|*) docker-compose exec ubuntu /bin/bash -c "$MIGRATE_DB" ;;
	esac
}

# Dumb sql back to db
db_migration_sql() {
	# migrate
	readonly DUMP_SQL="mysql -u${NAME} -p${NAME} ${NAME} < ${LIHOUBUN_PATH}/sql/${NAME}.sql"
	
    docker-compose exec mysql /bin/bash -c "$DUMP_SQL"
}

# Dump database
db_dump() {
	readonly DUMP_DB="mysqldump -u${NAME} -p${NAME} ${NAME} > ${LIHOUBUN_PATH}/sql/`date +%Y%m%d`_${NAME}.sql"
	readonly DUMP_DB_LATEST="mysqldump -u${NAME} -p${NAME} ${NAME} > ${LIHOUBUN_PATH}/sql/tmp.sql"
	
    docker-compose exec mysql /bin/bash -c "$DUMP_DB"
	docker-compose exec mysql /bin/bash -c "$DUMP_DB_LATEST"
}

# Restore dump working database
db_restore() {
	readonly RESTORE_DB="mysql -u${NAME} -p${NAME} ${NAME} < ${LIHOUBUN_PATH}/sql/${NAME}.sql"
	readonly RESTORE_INPUT_DB="mysql -u${NAME} -p${NAME} ${NAME} < ${LIHOUBUN_PATH}/sql/${2}"
	
    case $1 in
		-i) docker-compose exec mysql /bin/bash -c "$RESTORE_INPUT_DB" ;;
		${NAME}.sql|*) docker-compose exec mysql /bin/bash -c "$RESTORE_DB" ;;
	esac
}

# stylesheet
style_sass() {
	readonly SASS_PREPROCESSING="sass ${LIHOUBUN_PUBLIC_PATH}/css/stylesheet.scss ${LIHOUBUN_PUBLIC_PATH}/css/stylesheet.css"
	
    docker-compose exec ubuntu /bin/bash -c "$SASS_PREPROCESSING"
}


# API Server
server() {
	readonly START_API_V1="cd ${API_V1}; php oil server -h=0.0.0.0 -p=8081"

    case $i in
		v2) ;;
		v1|*) docker-compose exec ubuntu /bin/bash -c "$START_API_V1";;
	esac
}

# oil cli
# ${#} count input param
# ${@} list all input param
run_oil() {
	PARAM1=${1}
	PARAM2=${2}
	PARAM3=${3}
	PARAM4=${4}

	docker-compose exec php /bin/bash -c "php ${API_V1}/oil ${PARAM1} ${PARAM2} ${PARAM3} ${PARAM4}"
}

case $1 in
	init) init ;;
	build) build ;;
	start|up) start ;;
	stop|down) stop ;;
	restart|reboot) restart ;;
	status|ps) status ;;
	logs) logs ${2:-all} ;;
	tailf|logf) tailf ${2:-all} ;;
	ssh) dockerssh ${2:-php} ;;
	db) db_cli ${2:-db} ;;
	migrate) db_migration ${2:-v1} ;;
	sql) db_migration_sql ;;
	dump) db_dump ;;
	restore) db_restore ${2:-i} ${3} ;;
	help) helps ${2:-all} ;;
	sass) style_sass ;;
	api) server ;;
	oil) run_oil ${2} ${3} ${4} ${5};;
	*) usage ;;
esac