#!/bin/bash

docker run -p 3000:80 ctf101:${PWD##*/}
