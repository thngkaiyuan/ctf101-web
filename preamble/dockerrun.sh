#!/bin/bash

docker run -p 3000:80 -t -i ctf101:${PWD##*/}
