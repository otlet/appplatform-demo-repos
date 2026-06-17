# NodeJS demo app (Express.js)

HTTP demo service built with [Express](https://expressjs.com/).

## Endpoints
| Path | Description |
|------|-------------|
| `/` | Index — list of endpoints |
| `/date` | Today's date |
| `/env` | Value of `TESTOWYENV` env var |
| `/server` | Local server info (hostname, os, arch, port, runtime) |

## Run
```sh
npm install
TESTOWYENV=hello npm start
```

Default port `3001` (override with `PORT`).

```sh
curl localhost:3001/date
curl localhost:3001/env
curl localhost:3001/server
```
