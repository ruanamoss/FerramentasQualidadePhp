# Ferramentas de qualidade PHP

Este projeto é como utilizar ferramentas de qualdade em PHP

## Tecnologias ultilizadas

- PHP 8.3 - [documentação](https://www.php.net/docs.php)
- Laravel 11 -  [documentação](https://laravel.com/docs/11.x)

## Ferramenta de qualidade PHPMD
- O arquivo `ruleset.xml` foi criado na raiz do projeto para conter as definições que a biblioteca PHPMD vai usar parar vasculhar no projeto. É possível alterar parâmetros conforme desejado. O PHPMD busca por:
```JS
"Possíveis bugs"
"Código abaixo do ideal"
"Expressões de lógica muito complicadas, muito encadeadas (complexidade)"
"Parâmetros, métodos e propriedades não utilizados"
```
- Para executá-lo, rode no terminal:
```
composer require --dev phpmd/phpmd
vendor/bin/phpmd app/ ansi ruleset.xml
```

## Ferramenta de qualidade PHPCS
- A biblioteca PHPCS usa os padrões `PEAR, PSR12, Squiz, PSR1, PSR2, MySource and Zend` já definidos automaticamente na instalção da ferramenta para:
```JS
"Detectar violações de padrões de código"
"Corrigir automaticamente violações de padrão"
```
- Para detectar violações, rode no terminal:
```
composer require --dev squizlabs/php_codesniffer
vendor/bin/phpcs app/ phpcs.xml --colors
```
- Para corrigir código automaticamente com os padrões pré definidos, execute:
```
vendor/bin/phpcbf app/ phpcs.xml --colors
```

## Ferramenta de qualidade PHPSTAN
- O PHPStan escaneia toda a base de código e procura por bugs óbvios e complicados. Mesmo naquelas instruções `if` raramente executadas que certamente não são cobertas por testes. É uma ferramenta de análise estática que permite que você encontre bugs na sua base de código sem executar o código.
- Execução no terminal:
```
composer require --dev phpstan/phpstan
vendor/bin/phpstan analyse app 
```