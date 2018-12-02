<?php

function getAccessLevelStringFromReflectionMethod($reflectionMethod) {
    if($reflectionMethod->isPublic()) {
        return 'public';
    } else if($reflectionMethod->isPrivate()) {
        return 'private';
    } else if($reflectionMethod->isProtected()) {
        return 'protected';
    }

    throw new Exception("wut?");
}

function generateMethods($object) {
    $r = new \ReflectionClass($object);

    $methods = [];
    foreach($r->getMethods() as $key=>$method) {
        $methods[$method->getName()] = $method;
    }

    ksort($methods);

    $params = include 'params.php';
    foreach($params as $key=>$value) {
        unset($params[$key]);
        $params[strToLower($key)] = $value;
    }

    $final = [];
    foreach($methods as $key=>$value) {
        $args = [];
        // foreach($value->getParameters() as $key=>$argument) {
        //     $args[] = $argument->getName();
        // }
        if(isset($params[$value->getName()])) {
            foreach($params[$value->getName()]['params'] as $argument) {
                if($argument['required']) {
                    $args[] = $argument['name'];
                } else if (isset($argument['default']) && $argument['default']){
                    $args[] = $argument['name'] . '=' . $argument['default'];
                } else {
                    $args[] = $argument['name'] . '=NULL';
                }
            }
        }
        // $args = array_map(function($arg){
        //     return '$' . $arg;
        // }, $args);
        $argString = implode(', ',$args);

        $accessLevel = getAccessLevelStringFromReflectionMethod($value);
        $final[] = sprintf("%s function %s(%s) {\n}", $accessLevel, camelCaseMethodName($value->getName()), $argString);
    }
    return implode("\n\n", $final);
}

function camelCaseMethodName($name) {
    $name = str_replace('server',       'Server', $name);
    $name = str_replace('extended',     'Extended', $name);
    $name = str_replace('stats',        'Stats', $name);
    $name = str_replace('status',       'Status', $name);
    $name = str_replace('version',      'Version', $name);
    $name = str_replace('compress',     'Compress', $name);
    $name = str_replace('threshold',    'Threshold', $name);

    $name = str_replace('params',       'Params', $name);
    return $name;
}

function indent($string, $char='    ') {
    return preg_replace('/(^.)/m', $char . '$1', $string);
}

function main() {
    $methods = generateMethods((new Memcache));

    echo 'class Memcache { ',"\n";
    echo indent($methods), "\n";
    echo '}';
}

main();
