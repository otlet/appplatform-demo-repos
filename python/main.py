import datetime
import os
import platform
import socket

from fastapi import FastAPI

app = FastAPI(title="python-fastapi demo")


def port() -> str:
    return os.environ.get("PORT", "8080")


@app.get("/")
def index():
    return {
        "app": "python-fastapi demo",
        "endpoints": ["/date", "/env", "/server"],
    }


@app.get("/date")
def date():
    return {"date": datetime.date.today().isoformat()}


@app.get("/env")
def env():
    return {"TESTOWYENV": os.environ.get("TESTOWYENV")}


@app.get("/server")
def server():
    return {
        "hostname": socket.gethostname(),
        "os": platform.system(),
        "arch": platform.machine(),
        "port": port(),
        "runtime": platform.python_version(),
    }


if __name__ == "__main__":
    import uvicorn

    uvicorn.run(app, host="0.0.0.0", port=int(port()))
