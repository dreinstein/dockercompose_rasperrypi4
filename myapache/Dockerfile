FROM php:7.2-apache
#RUN apt-get -y update && apt-get -y upgrade
RUN apt-get -y upgrade
RUN apt-get -y  update
RUN apt-get install -y bash
RUN apt-get install -y mysql*
RUN docker-php-ext-install  mysqli
RUN apt-get install -y vim
COPY ./Web/. /var/www/html/
COPY ./Web/images/. /var/www/html/images/
COPY ./Files/php.ini /usr/local/etc/php/.
RUN /bin/bash -c 'source /etc/apache2/envvars'
#RUN /usr/sbin/apache2 -V

