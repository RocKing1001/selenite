cleandb:
	sudo docker container rm selenite-gud-mysql-1
	sudo docker volume rm selenite-gud_mysqldata
