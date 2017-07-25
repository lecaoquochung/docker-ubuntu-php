FROM ubuntu:16.04

# init
RUN apt-get update && apt-get install -y git \
    && apt-get install -y curl

# debconf: delaying package configuration, since apt-utils is not installed
RUN apt-get update && apt-get install -y --no-install-recommends apt-utils
# debconf error in CircleCI
RUN sed -i 's/^mesg n$/tty -s \&\& mesg n/g' /root/.profile
    
# php
RUN apt-get install -y nginx php-fpm php-mysql php-curl \
    && apt-get install php7.0-mbstring \
    && apt-get install php7.0-xml \
    && apt-get install php7.0-cgi

# composer
RUN curl -o composer -L https://getcomposer.org/composer.phar \
    && chmod +x composer \
    && mv composer /usr/local/bin/

# phpunit
RUN curl -o phpunit -L https://phar.phpunit.de/phpunit-6.1.phar \
    && chmod +x phpunit \
    && mv phpunit /usr/local/bin/

# ppm
RUN ln -s /usr/lib/cgi-bin/php /usr/bin/php7.0-cgi
RUN git clone https://github.com/php-pm/php-pm.git \
    && cd php-pm \
    && composer install \
    && ln -s `pwd`/bin/ppm /usr/local/bin/ppm

# rubygems gem sass
RUN apt-get update \
    && apt-get install -y rubygems gem vim \
    && gem install sass -v 3.4.23

# python and pip
RUN apt-get update \
    && apt-get install -y python python-dev python-pip \
    && pip install --upgrade --user awscli \
    && apt-get install -y ntp telnet

RUN apt-get update \
    && apt-get install -y python3 python3-dev python3-pip

# node

EXPOSE 8080
EXPOSE 8081
EXPOSE 8082

# get server started
# TODO server.sh php build-in server management like pm2
CMD php -S 0.0.0.0:8080 public_html
