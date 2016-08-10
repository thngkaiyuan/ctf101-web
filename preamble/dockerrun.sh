#!/bin/bash

docker run -d -p 3000:80 ctf101:${PWD##*/}
