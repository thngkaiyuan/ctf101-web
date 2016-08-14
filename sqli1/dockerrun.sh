#!/bin/bash

docker run -d -t -p 3008:80 ctf101:${PWD##*/}
