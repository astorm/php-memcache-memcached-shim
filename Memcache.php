<?php
class Memcache {

    protected $memcached;

    public function __construct() {
        $this->memcached = new Memcached;
    }

    public function add($key, $var, $flag=NULL, $expire=NULL) {
        return $this->memcached->add($key, $var, $expire);
    }

    public function addServer($host, $port=11211, $persistent=NULL, $weight=NULL, $timeout=NULL, $retry_interval=NULL, $status=NULL, $failure_callback=NULL, $timeoutms=NULL) {
    }

    public function close() {
        return $this->memcached->quit();
    }

    public function connect($host, $port=NULL, $timeout=NULL) {
        return $this->memcached->addServer($hose, $port);
    }

    public function decrement($key, $value=1) {
        return $this->memcached->decrement($key, $value);
    }

    public function delete($key, $timeout=NULL) {
        return $this->memcached->delete($key);
    }

    public function flush() {
    }

    public function get($key, &$flags=NULL) {
        return $this->memcached->get($key);
    }

    public function getExtendedStats($type, $slabid=NULL, $limit=100) {
    }

    public function getServerStatus($host, $port=11211) {
    }

    public function getStats($type, $slabid=NULL, $limit=100) {
    }

    public function getVersion() {
    }

    public function increment($key, $value=1) {
        return $this->memcached->increment($key, $value);
    }

    public function pconnect($host, $port=NULL, $timeout=NULL) {
    }

    public function replace($key, $var, $flag=NULL, $expire=NULL) {
    }

    public function set($key, $var, $flag=NULL, $expire=NULL) {
        return $this->memcached->set($key, $var, $expire);
    }

    public function setCompressThreshold($threshold, $min_savings=NULL) {
    }

    public function setoptimeout() {
    }

    public function setServerParams($host, $port=11211, $timeout=NULL, $retry_interval=FALSE, $status=NULL, $failure_callback=NULL) {
    }
}
