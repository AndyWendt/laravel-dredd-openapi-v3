# Laravel Dredd OpenAPI

## Test the docs

* Migrate the db: `php artisan migrate`
* Serve the test site: `php artisan serve`
* Test the docs using Dredd: `./bin/docs-test.sh`

## Docs

* `npm install --production=false`
* `./node_modules/.bin/redoc-cli serve documentation/v1/swagger_v2.json`

View docs at `http://127.0.0.1:8080`
