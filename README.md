## Instalar o ambiente docker:
``` docker-compose up --build```

``` docker exec kanastra-api bash -l -c "composer install" ```

- Copiar o arquivo .env.example para o .env
- Dentro do container "kanastra-api" rodar o comando: ```php artisan key:generate```
- Ainda dentro do container kanastra-api rodar as migrations: ```php artisan migrate```
- Ainda dentro do container kanastra-api rodar a queue: ```php artisan queue work```

### Para executar os testes:
```docker exec kanastra-api bash -l -c "./vendor/bin/phpunit"```
