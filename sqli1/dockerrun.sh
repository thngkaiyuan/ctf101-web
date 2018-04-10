#!/bin/bash

# workaround for https://github.com/docker/for-linux/issues/72
unameOut="$(uname -s)"
if [ $unameOut == "Darwin" ]; then
    vol='-v /var/lib/mysql'
else
    vol=''
fi
docker run $vol -d -t -p 3008:80 ctf101:${PWD##*/}
