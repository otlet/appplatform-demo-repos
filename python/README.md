# Python demo app (FastAPI)

HTTP demo service built with [FastAPI](https://fastapi.tiangolo.com/).

## Endpoints
| Path | Description |
|------|-------------|
| `/` | Index — list of endpoints |
| `/date` | Today's date |
| `/env` | Value of `TESTOWYENV` env var |
| `/server` | Local server info (hostname, os, arch, port, runtime) |

## Run
```sh
pip install -r requirements.txt
TESTOWYENV=hello uvicorn main:app --port 8000
```

Default port `8000` (override with `PORT` when running `python main.py`).

```sh
curl localhost:8000/date
curl localhost:8000/env
curl localhost:8000/server
```
