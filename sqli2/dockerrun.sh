#!/bin/bash

docker run -d -t -p 3009:80 ctf101:${PWD##*/}
