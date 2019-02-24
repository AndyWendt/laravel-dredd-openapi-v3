#!/usr/bin/env bash

echo "DISABLE_MIDDLEWARE=true" >> .env
./node_modules/.bin/dredd --config ./tests/Dredd/v1/dredd.v1.yml
sed -i '' '/DISABLE_MIDDLEWARE=true/d' ./.env
