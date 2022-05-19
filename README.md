php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html storage/app/public/coverage_test

.env
SAIL_XDEBUG_MODE=develop,debug,coverage