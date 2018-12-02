<?php
return
array (
  'addServer' =>
  array (
    'return-type' => 'bool',
    'method' => 'addServer',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$host',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$port',
        'required' => false,
        'default' => '11211',
      ),
      2 =>
      array (
        'type' => 'bool',
        'name' => '$persistent',
        'required' => false,
      ),
      3 =>
      array (
        'type' => 'int',
        'name' => '$weight',
        'required' => false,
      ),
      4 =>
      array (
        'type' => 'int',
        'name' => '$timeout',
        'required' => false,
      ),
      5 =>
      array (
        'type' => 'int',
        'name' => '$retry_interval',
        'required' => false,
      ),
      6 =>
      array (
        'type' => 'bool',
        'name' => '$status',
        'required' => false,
      ),
      7 =>
      array (
        'type' => 'callable',
        'name' => '$failure_callback',
        'required' => false,
      ),
      8 =>
      array (
        'type' => 'int',
        'name' => '$timeoutms',
        'required' => false,
      ),
    ),
  ),
  'decrement' =>
  array (
    'return-type' => 'int',
    'method' => 'decrement',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$value',
        'required' => false,
        'default' => '1',
      ),
    ),
  ),
  'add' =>
  array (
    'return-type' => 'bool',
    'method' => 'add',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'mixed',
        'name' => '$var',
        'required' => true,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$flag',
        'required' => false,
      ),
      3 =>
      array (
        'type' => 'int',
        'name' => '$expire',
        'required' => false,
      ),
    ),
  ),
  'close' =>
  array (
    'return-type' => 'bool',
    'method' => 'close',
    'params' =>
    array (
    ),
  ),
  'connect' =>
  array (
    'return-type' => 'bool',
    'method' => 'connect',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$host',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$port',
        'required' => false,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$timeout',
        'required' => false,
      ),
    ),
  ),
  'delete' =>
  array (
    'return-type' => 'bool',
    'method' => 'delete',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$timeout',
        'required' => false,
        'default' => '0',
      ),
    ),
  ),
  'flush' =>
  array (
    'return-type' => 'bool',
    'method' => 'flush',
    'params' =>
    array (
    ),
  ),
  'get' =>
  array (
    'return-type' => 'string',
    'method' => 'get',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '&$flags',
        'required' => false,
      ),
    ),
  ),
  'getExtendedStats' =>
  array (
    'return-type' => 'array',
    'method' => 'getExtendedStats',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$type',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$slabid',
        'required' => false,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$limit',
        'required' => false,
        'default' => '100',
      ),
    ),
  ),
  'getServerStatus' =>
  array (
    'return-type' => 'int',
    'method' => 'getServerStatus',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$host',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$port',
        'required' => false,
        'default' => '11211',
      ),
    ),
  ),
  'getStats' =>
  array (
    'return-type' => 'array',
    'method' => 'getStats',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$type',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$slabid',
        'required' => false,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$limit',
        'required' => false,
        'default' => '100',
      ),
    ),
  ),
  'getVersion' =>
  array (
    'return-type' => 'string',
    'method' => 'getVersion',
    'params' =>
    array (
    ),
  ),
  'increment' =>
  array (
    'return-type' => 'int',
    'method' => 'increment',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$value',
        'required' => false,
        'default' => '1',
      ),
    ),
  ),
  'pconnect' =>
  array (
    'return-type' => 'mixed',
    'method' => 'pconnect',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$host',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$port',
        'required' => false,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$timeout',
        'required' => false,
      ),
    ),
  ),
  'replace' =>
  array (
    'return-type' => 'bool',
    'method' => 'replace',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'mixed',
        'name' => '$var',
        'required' => true,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$flag',
        'required' => false,
      ),
      3 =>
      array (
        'type' => 'int',
        'name' => '$expire',
        'required' => false,
      ),
    ),
  ),
  'set' =>
  array (
    'return-type' => 'bool',
    'method' => 'set',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$key',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'mixed',
        'name' => '$var',
        'required' => true,
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$flag',
        'required' => false,
      ),
      3 =>
      array (
        'type' => 'int',
        'name' => '$expire',
        'required' => false,
      ),
    ),
  ),
  'setCompressThreshold' =>
  array (
    'return-type' => 'bool',
    'method' => 'setCompressThreshold',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'int',
        'name' => '$threshold',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'float',
        'name' => '$min_savings',
        'required' => false,
      ),
    ),
  ),
  'setServerParams' =>
  array (
    'return-type' => 'bool',
    'method' => 'setServerParams',
    'params' =>
    array (
      0 =>
      array (
        'type' => 'string',
        'name' => '$host',
        'required' => true,
      ),
      1 =>
      array (
        'type' => 'int',
        'name' => '$port',
        'required' => false,
        'default' => '11211',
      ),
      2 =>
      array (
        'type' => 'int',
        'name' => '$timeout',
        'required' => false,
      ),
      3 =>
      array (
        'type' => 'int',
        'name' => '$retry_interval',
        'required' => false,
        'default' => 'FALSE',
      ),
      4 =>
      array (
        'type' => 'bool',
        'name' => '$status',
        'required' => false,
      ),
      5 =>
      array (
        'type' => 'callable',
        'name' => '$failure_callback',
        'required' => false,
      ),
    ),
  ),
);
