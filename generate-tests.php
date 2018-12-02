<?php
function main() {
    require 'Memcache.php';

    $r = new ReflectionClass(new Memcache);

    foreach($r->getMethods() as $method) {
        echo 'public function test' . ucwords($method->getName())
                . '() { ' . "\n" .
                '    throw new Exception("Please Implement Me");' . "\n" .
                '}' . "\n";
    }

    echo "Done\n";
}
main();
