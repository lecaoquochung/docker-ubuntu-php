FROM nginx

COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
RUN mkdir -p /etc/nginx/sites-enabled
COPY docker/nginx/liho-ubun.conf /etc/nginx/sites-enabled