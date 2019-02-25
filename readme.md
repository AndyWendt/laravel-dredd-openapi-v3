# Laravel Dredd OpenAPI v3 Documentation Verification

* OpenApi 3.0 docs combined using [json-refs](https://www.npmjs.com/package/json-refs)
* OpenApi 3.0 docs converted to Swagger 2.0 using [api-spec-converter](https://lucybot-inc.github.io/api-spec-converter/)
* Docs verified using [Dredd](https://dredd.org/en/latest/)  

## Verify the docs

* Migrate the db: `php artisan migrate`
* Serve the test site: `php artisan serve`
* Test the docs using Dredd: `./bin/docs-test.sh`

## Docs

Docs built using [Redoc](https://github.com/Rebilly/ReDoc)

* `npm install --production=false`
* `./node_modules/.bin/redoc-cli serve documentation/v1/swagger_v2.json`

View docs at `http://127.0.0.1:8080`
