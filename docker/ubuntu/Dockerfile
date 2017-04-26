FROM ubuntu:16.04

# init
RUN apt-get update && apt-get install -y git \
    && apt-get install -y curl \
    # && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer \
    && apt-get install -y nginx php-fpm php-mysql

# rubygems gem sass
RUN apt-get update \
    && apt-get install -y rubygems gem vim \
    && gem install sass -v 3.4.23

# python and pip
RUN apt-get update \
    && apt-get install -y python python-dev python-pip \
    && pip install --upgrade --user awscli \
    && apt-get install -y ntp telnet

EXPOSE 8081
EXPOSE 8082