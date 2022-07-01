docker run --rm
-u "(id -g)"
-v $(pwd):/opt
-w /opt
laravelsail/php80-composer:latest
composer install --ignore-platform-reqs