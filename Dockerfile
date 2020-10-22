FROM ubuntu:20.04

ENV DEBIAN_FRONTEND noninteractive
ENV TZ="Asia/Taipei"

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends apt-utils && \
    apt-get install -y nginx && \
    apt-get install -y curl && \
    apt-get install -y vim && \
    apt-get install -y cron

RUN apt-get install -y php && \
    apt-get install -y php-fpm  && \
    apt-get install -y php-xml && \
    apt-get install -y php-mbstring && \
    apt-get install -y php-mysql

COPY ./allied_jubilee_nginx.conf /etc/nginx/sites-available/allied_jubilee_nginx.conf
COPY ./allied_jubilee.cronjob /etc/cron.d/allied_jubilee.cronjob
COPY . /usr/src/app
WORKDIR /usr/src/app

EXPOSE 443
EXPOSE 80
