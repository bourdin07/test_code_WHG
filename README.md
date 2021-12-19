# test_code_WHG

1/ Deploy Local Dev Environment
- `docker-compose build`
- `docker-compose run --rm --entrypoint=npm frontend ci`
- `docker-compose run --rm backend bash` then inside the container :
    - `composer install`
    - `./reset_db.sh` execute the bash file to reinitiliaze the database with the dataset
    - `Ctrl+D` to exit the container

2/ Run containers
- `docker-compose up -d` 
