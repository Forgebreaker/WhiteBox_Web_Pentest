#!/bin/bash

# change these
DOCKERNAME=upload-file-playground-level-9-db
DOCKERFILE_NAME=Dockerfile.db

# Dont change this :(
TAGNAME=cyberjutsu/training-labs:$DOCKERNAME

sudo docker stop $DOCKERNAME
sudo docker rm $DOCKERNAME
sudo docker build --no-cache -t $TAGNAME --file $DOCKERFILE_NAME .

# Below line is for apps that has 1 Dockerfile only
# Remember to change expose port too
# PORT=3306
# sudo docker run --name $DOCKERNAME -d -p $PORT:80 -it $TAGNAME
