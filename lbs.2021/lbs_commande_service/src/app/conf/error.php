<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;



return [
    'notFoundHandler' => function (Container $container) {

        return function (Request $req, Response $resp) use ($container): Response {

            $uri = $req->getUri();

            $resp = $resp->withStatus(400)
                ->withHeader('Content-Type', 'application/json');
            $resp->write(json_encode([
                "type" => 'error',
                "error" => 400,
                "message" => "$uri : Malformed URI - request not recognized"
            ]));

            $container->get('logger.error')->error("GET $uri : Malformed uri");

            return $resp;
        };
    },


    'notAllowedHandler' => function ($container) {

        return function (Request $req, Response $resp, array $methods) use ($container): Response {

            $methods_expected = implode(', ', $methods);
            $method_received = $req->getMethod();
            $uri             = $req->getUri();
            $resp = $resp->withStatus(405)
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Allow', implode(', ', $methods))
                ->write(json_encode([
                    'type'    => 'error',
                    'error'   => 405,
                    'message' => "Method $method_received not allowed for uri $uri. Waited : " .
                        $methods_expected
                ]));        
            $container->get('logger.error')->error("$method_received $uri : Mad method - $methods_expected wanted");

            return $resp;
        };
    },    
    'phpErrorHandler' => function ($container) {
        return function (Request $req, Response $resp, \Throwable $error) use ($container): Response {
            $msg = [
                'type'    => 'error',
                'error'   => 500,
                'message' => $error->getMessage(),
                'trace'   => $error->getTraceAsString(),
                "file"    => $error->getFile() . "Line: " . $error->getLine()
            ];

            $resp = $resp->withStatus(500) 
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($msg));

            unset($msg['trace']);
            $container->get('logger.error')->error(implode(' | ', $msg));

            return $resp;
        };
    },

    'clientError' => function ($container) {
        return function (Request $req, Response $resp, int $code_error, string $msg) use ($container) {
            
            $uri = $req->getUri();

            $data = [
                'type' => 'error',
                'error' => $code_error,
                'message' => $msg
            ];

            $resp = $resp->withStatus($code_error)
                ->withHeader('Content-Type', 'application/json; charset=utf-8');

            $resp->getBody()->write(json_encode($data));

            // renseigner l'erreur dans le log d'erreur
            $container->get('logger.error')->error("Bad ressource : " . $uri);

            return $resp;
        };
    }

];