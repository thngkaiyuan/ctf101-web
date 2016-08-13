#!/bin/bash

docker run -d -t -p 3003:80 ctf101:${PWD##*/}
