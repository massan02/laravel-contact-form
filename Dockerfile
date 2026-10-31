FROM php:8.5.12-cli

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
	&& apt-get install -y --no-install-recommends unzip \
	&& rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

ENTRYPOINT ["entrypoint"]