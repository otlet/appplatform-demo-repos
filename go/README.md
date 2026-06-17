# Go demo app (Fiber)

HTTP demo service built with [Fiber](https://gofiber.io/).

## Endpoints
| Path | Description |
|------|-------------|
| `/` | Index — list of endpoints |
| `/date` | Today's date |
| `/env` | Value of `TESTOWYENV` env var |
| `/server` | Local server info (hostname, os, arch, port, runtime) |

## Run
```sh
go mod tidy
TESTOWYENV=hello go run .
```

Default port `3000` (override with `PORT`).

```sh
curl localhost:3000/date
curl localhost:3000/env
curl localhost:3000/server
```
