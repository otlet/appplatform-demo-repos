# appplatform-demo-repos

Four minimal demo HTTP apps, each in its own directory, exposing the same set of endpoints. Built as demo workloads for an app platform / PaaS.

## Shared endpoints
| Path | Description |
|------|-------------|
| `/` | Index — list of endpoints |
| `/date` | Today's date |
| `/env` | Value of `TESTOWYENV` env var |
| `/server` | Local server info (hostname, os, arch, port, runtime) |

The PHP app adds `/phpinfo` (output of `phpinfo()`).

## Apps
| Dir | Language | Framework | Port | Run |
|-----|----------|-----------|------|-----|
| [`go/`](go/) | Go | Fiber | 3000 | `go mod tidy && go run .` |
| [`node/`](node/) | NodeJS | Express.js | 3001 | `npm install && npm start` |
| [`python/`](python/) | Python | FastAPI | 8000 | `pip install -r requirements.txt && uvicorn main:app --port 8000` |
| [`php/`](php/) | PHP | Slim 4 | 8080 | `composer install && php -S localhost:8080 -t public` |

Each port is overridable via the `PORT` env var. Set `TESTOWYENV` before starting to see it reflected at `/env`.
