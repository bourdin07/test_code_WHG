# test_code_WHG

1/ Deploy Local Dev Environment
- `docker-compose build`
- `docker-compose run --rm --entrypoint=npm frontend ci`
- `docker-compose run --rm backend bash` then inside the container :
    - `composer install`
    - `Ctrl+D` to exit the container

2/ Run containers
- `docker-compose up -d` 
    - wait that all container are running
- `docker ps` to list all running docker containers

3/ Initialize data fixtures
- `docker exec -it Test_Code_WHG_back bash` to enter inside the container
- Make sure that the `database` docker service is running
- `./reset_db.sh` execute the bash file to reinitiliaze the database with the dataset
- `Ctrl+D` to exit the container

## Services docker
| Services        | Version               | Path access           |
|:----------------|:---------------------:|:----------------------|
| database        | MySQL / 8             |                       |
| phpmyadmin      |                       | http://localhost:81   |
| backend         | PHP 8.0 / Symfony 5.3 | http://localhost:8001 |
| frontend        | Node 14 / React 17    | http://localhost:3001 |

- phpmyadmin server : `database`
- phpmyadmin username / password : `root` / `ChangeMe`

4/ Stopping all containers or specific
- `docker stop <container name>` to stop specific container
- `docker-compose -f 'docker-compose.yml'` to stop all containers inside the project

5/ Down all containers
- `docker-compose -f 'docker-compose.yml' down` to remove the containers network
