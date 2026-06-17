# PHP demo app (Slim 4)

HTTP demo service built with [Slim](https://www.slimframework.com/).

## Endpoints
| Path | Description |
|------|-------------|
| `/` | Index — list of endpoints |
| `/date` | Today's date |
| `/env` | Value of `TESTOWYENV` env var |
| `/server` | Local server info (hostname, os, arch, port, runtime) |
| `/phpinfo` | Output of `phpinfo()` |

## Run
```sh
composer install
TESTOWYENV=hello php -S localhost:8080 -t public
```

Default port `8080` (override with `PORT` env var passed to the server).

```sh
curl localhost:8080/date
curl localhost:8080/env
curl localhost:8080/server
curl localhost:8080/phpinfo
```
