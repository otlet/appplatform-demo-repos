<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

function json(Response $response, array $data): Response
{
    $response->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES));
    return $response->withHeader('Content-Type', 'application/json');
}

$app->get('/', function (Request $request, Response $response) {
    return json($response, [
        'app' => 'php-slim demo',
        'endpoints' => ['/date', '/env', '/server', '/phpinfo'],
    ]);
});

$app->get('/date', function (Request $request, Response $response) {
    return json($response, ['date' => date('Y-m-d')]);
});

$app->get('/env', function (Request $request, Response $response) {
    return json($response, ['TESTOWYENV' => getenv('TESTOWYENV') ?: null]);
});

$app->get('/server', function (Request $request, Response $response) {
    $port = getenv('PORT') ?: '8080';
    return json($response, [
        'hostname' => gethostname(),
        'os' => PHP_OS,
        'arch' => php_uname('m'),
        'port' => $port,
        'runtime' => phpversion(),
    ]);
});

$app->get('/phpinfo', function (Request $request, Response $response) {
    ob_start();
    phpinfo();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response->withHeader('Content-Type', 'text/html');
});

$app->run();
