#!/bin/bash

docker run -d -t -p 3010:80 ctf101:${PWD##*/}
