#!/usr/bin/env bash

rm -f /app/documentation/v2/openapi_v3.json
rm -f /app/documentation/v2/swagger_2.json
ls -la /app/documentation
export CL_DISABLE_MIDDLEWARE=true;
echo "here";
printenv
/app/node_modules/.bin/json-refs resolve /app/documentation/v2/openapi_v3.yml --filter relative > /app/documentation/v2/openapi_v3.json
/app/node_modules/.bin/api-spec-converter --from=openapi_3 --to=swagger_2 --syntax=json --order=alpha /app/documentation/v2/openapi_v3.json > /app/documentation/v2/swagger_v2.json
/app/node_modules/.bin/dredd --config /app/tests/Dredd/v2/dredd.v2.yml
export CL_DISABLE_MIDDLEWARE=false;
printenv
