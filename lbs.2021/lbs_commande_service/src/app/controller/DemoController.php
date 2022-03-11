<?php
namespace lbs\command\controller;

class DemoController{
    private $c;

    public function __construct(\Slim\Container $c){
        $this->c = $c;
    }

    public function sayHello(Request $rq, Response $rs, array $args): Response{
        $name = $args['name'];
        $rs->getBody()->write("<h1>Hello, $name</h1>");
        return $rs;
    }
    
    public function welcome (Request $rq, Response $rs, array $args): Response{
        $urld = $this->C->router->pathFor('hello', ['name'=>'diego']);
        $urlc = $this->C->router->pathFor('hello', ['name'=>'leo']);
        $html= "<h1>Home, sweet home</h1>";
        $html .="<p><a href='$urld'> say hello to diego</a></p>";
        $html .="<p><a href='$urlc'> say hello to leo</a></p>";
        $rs->getBody()->write($html);
        return $rs;
    }
}