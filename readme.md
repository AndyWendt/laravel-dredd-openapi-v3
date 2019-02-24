# Laravel Dredd OpenAPI

View docs at `http://127.0.0.1:8081`

```bash
docker run -it --rm -p 8081:80 -v $(PWD)/documentation/v2/swagger_v2.json:/usr/share/nginx/html/swagger_v2.json -e SPEC_URL=swagger_v2.json redocly/redoc
```
