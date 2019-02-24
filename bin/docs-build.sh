#!/usr/bin/env bash

rm -f ./documentation/v1/openapi_v3.json
rm -f ./documentation/v1/swagger_2.json
./node_modules/.bin/json-refs resolve ./documentation/v1/openapi_v3.yml --filter relative > ./documentation/v1/openapi_v3.json
./node_modules/.bin/api-spec-converter --from=openapi_3 --to=swagger_2 --syntax=json --order=alpha ./documentation/v1/openapi_v3.json > ./documentation/v1/swagger_v2.json
