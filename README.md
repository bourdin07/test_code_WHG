# test_code_WHG

1/ Deploy Local Dev Environment
- `docker-compose build`
- `docker-compose run --rm --entrypoint=npm frontend ci`
- `docker-compose run --rm backend bash` then inside the container :
    - `composer install`
