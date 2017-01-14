FROM ubuntu:14.04

# Dependencies
RUN apt-get update \
    && apt-get install -y curl \
    && curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash - \
    && apt-get update \
    && apt-get install -y git nodejs \
    && apt-get install -y mysql-client python make g++ \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN npm install -g pm2

# Define projects working directory
RUN mkdir -p /home/ubuntu/docker
WORKDIR /home/ubuntu/docker

# Expose
EXPOSE 8000
EXPOSE 8001
EXPOSE 8080

# Node
# CMD pm2 start --no-daemon /home/ubuntu/projects/server.json
