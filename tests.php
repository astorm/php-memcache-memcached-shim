<?php
// declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'Memcache.php';

final class EmailTest extends TestCase
{
    public function testAddServer() {
        $memcache = new Memcache;
        $result = $memcache->addServer('127.0.0.1', 11211);
        $result = $memcache->addServer('localhost', 11211);

        $stats  = $memcache->getExtendedStats();
        $this->assertEquals(2, count($stats));
    }

    public function testAdd() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $memcache = new Memcache;
        $memcache->connect('127.0.0.1', 11211, 15);

        // make sure the key is not there -- also implicity tests delete
        $result = @$memcache->delete('foo');

        // try to set the value
        $result = $memcache->add('foo', 'bar');//, $flag=NULL, $expire=NULL
        $this->assertTrue($result);

        // try to set again, which generates an error
        $result = @$memcache->add('foo', 'bar');//, $flag=NULL, $expire=NULL
        $this->assertFalse($result);
    }

    public function testClose() {
        $memcache = new Memcache;
        $memcache->connect('127.0.0.1', 11211, 15);
        $result = $memcache->close();
        $this->assertTrue($result);
    }


    public function testConnect() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $this->assertTrue($result);
    }

    public function testConnectFail() {
        $memcache = new Memcache;
        $result = @$memcache->connect('127.0.0.2', 11211, 15);
        $this->assertTrue(!$result);
    }

    public function testDecrement() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        // try to set the value
        $result = $memcache->set('foo', 42);//, $flag=NULL, $expire=NULL
        $this->assertTrue($result);

        $result = $memcache->decrement('foo', 2);
        $this->assertEquals($result, 40);

        $result = $memcache->get('foo');
        $this->assertEquals($result, 40);
    }

    public function testSet() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        // make sure the key is not there -- also implicity tests delete
        $result = @$memcache->delete('foo');

        // try to set the value
        $result = $memcache->set('foo', 'bar');
        $this->assertTrue($result);

        $result = $memcache->get('foo');
        $this->assertEquals($result, 'bar');

        // try to set again, which generates no error for set
        $result = $memcache->set('foo', 'barr');
        $this->assertTrue($result);

        $result = $memcache->get('foo');
        $this->assertEquals($result, 'barr');
    }

    public function testDelete() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        // make sure the key is not there -- also implicity tests delete
        $result = @$memcache->delete('foo');

        // try to set the value
        $result = $memcache->set('foo', 'bar');
        $this->assertTrue($result);

        $result = $memcache->get('foo');
        $this->assertEquals($result, 'bar');

        // delete it
        $result = @$memcache->delete('foo');
        $this->assertTrue($result);

        $result = @$memcache->get('foo');
        $this->assertFalse($result);
    }
    public function testFlush() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $result = $memcache->set('foo', 'bar');
        $this->assertTrue($result);

        $result = $memcache->get('foo');
        $this->assertEquals($result, 'bar');

        // delete it
        $result = $memcache->flush(0);
        $this->assertTrue($result);

        $result = @$memcache->get('foo');
        $this->assertFalse($result);
    }

    public function testGet() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $key    = md5(microtime() . 'key');
        $value = md5(microtime() . 'value');

        $result = $memcache->set($key, $value);
        $this->assertTrue($result);

        $result = $memcache->get($key);
        $this->assertEquals($result, $value);
    }

    public function testGetExtendedStats() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $array  = $memcache->getExtendedStats();

        $this->assertTrue(is_array($array));
        $this->assertTrue(isset($array['127.0.0.1:11211']));
    }

    public function testGetServerStatus() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $result  = $memcache->getServerStatus('127.0.0.1', '11211');

        $this->assertTrue(0 !== $result);
    }


    public function testGetStats() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $array  = $memcache->getStats();
        $this->assertTrue(is_array($array));
        $this->assertTrue(0 < count($array));
    }

    public function testGetVersion() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $result = $memcache->getVersion();
        $this->assertTrue((bool)$result);
    }

    public function testIncrement() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        // try to set the value
        $result = $memcache->set('foo', 42);//, $flag=NULL, $expire=NULL
        $this->assertTrue($result);

        $result = $memcache->increment('foo', 2);
        $this->assertEquals($result, 44);

        $result = $memcache->get('foo');
        $this->assertEquals($result, 44);

    }

    public function testReplace() {
        $memcache = new Memcache;
        $result = $memcache->connect('127.0.0.1', 11211, 15);

        $key    = md5(microtime() . 'key');
        $value = md5(microtime() . 'value');

        // make sure the key is not there -- also implicity tests delete
        $result = @$memcache->delete($key);

        // try to set the value
        $result = $memcache->set($key, $value);
        $this->assertTrue($result);

        $result = $memcache->get($key);
        $this->assertEquals($result, $value);

        // try to set again, which generates no error for set
        $result = $memcache->replace($key, 'barr');
        $this->assertTrue($result);

        $result = $memcache->get($key);
        $this->assertEquals($result, 'barr');

    }

//     public function testPconnect() {
//         throw new Exception("Please Implement Me");
//     }

//     public function testSetCompressThreshold() {
//         throw new Exception("Please Implement Me");
//     }
//
//     public function testSetoptimeout() {
//         throw new Exception("Please Implement Me");
//     }
//
//     public function testSetServerParams() {
//         throw new Exception("Please Implement Me");
//     }

//     public function testFunctions() {
//         // Also you can use memcache_decrement()
//         // //, $flag=NULL, $expire=NULL for add?
//         //[, int $flag [, int $expire ]] on set
//         //do all microtime/key/value swapping
//         // use "localhost" as second server?
//         // how do status functions behave with multiple servers on
//         $this->assertTrue(false);
//     }
}
