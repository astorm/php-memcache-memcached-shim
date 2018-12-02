<?php
$lines  = file('/Users/alanstorm/Desktop/to-parse.txt');
$all    = [];
foreach($lines as $line) {
    $tmp = [];
    $words = explode(' ', $line);

    $tmp['return-type'] = array_shift($words);
    $tmp['method']      = array_shift($words);

    // shift off the (
    array_shift($words);

    $params = [];
    while($word = array_shift($words) ) {
        $param = [];
        $param['type']      = $word;
        if($param['type'] === 'void') { break; }
        $param['name']      = array_shift($words);
        $param['required']  = true;

        $comma              = array_shift($words);

        $params[] = $param;
        if('[,' === $comma) {
            array_unshift($words, $comma);
            break;
        }
    }

    while($word = array_shift($words)) {
        $param = [];
        $param['type']      = array_shift($words);
        if(')' === $param['type'][0]) { break; }
        if(NULL === $param['type'][0]) { break; }
        $param['name']      = array_shift($words);
        $param['required']  = false;

        $word = array_shift($words);
        if('=' == $word ) {
            $param['default'] = array_shift($words);
        } else {
            array_unshift($words, $word);
        }

        $params[] = $param;
    }

    $tmp['params'] = $params;
    $all[$tmp['method']] = $tmp;
}

var_export($all);
