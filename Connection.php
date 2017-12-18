<?php
/**
 * Daniel Ziegler
 * MIT License
 *
 * Connection handling taken from
 * https://github.com/OrangeTux/einder/blob/master/einder/client.py
 * many thanks!
 */

namespace nook24\Horizon;

class Connection {

    /**
     * @var string
     */
    private $address;

    /**
     * @var int
     */
    private $port;

    /**
     * @var resource
     */
    private $socket;

    /**
     * Connection constructor.
     * @param string $address
     * @param int $port
     */
    public function __construct($address = '192.168.1.200', $port = 5900) {
        $this->address = $address;
        $this->port = $port;
    }

    public function connect() {
        //Many thanks to https://github.com/OrangeTux/einder/blob/master/einder/client.py#L23-L87

        //Open the connection. If we do this, we get a version number or so
        $this->socket = fsockopen($this->address, $this->port);
        $version = \fgets($this->socket);

        //To "authorize" with the horizon, we send the version back? :D
        \fwrite($this->socket, $version);
        //Horizon will return with 2 bytes
        $response = $this->toHex(fgets($this->socket, 2)); //01
        \fwrite($this->socket, $this->toBin("01"));

        //Again we get 4 bytes of what so ever
        $response = $this->toHex(fgets($this->socket, 4)); //010000

        //To make the client work, we need to send this data
        \fwrite($this->socket, $this->toBin("01"));
    }

    /**
     * @param int $key
     */
    function sendKey($key) {
        if (!\is_resource($this->socket)) {
            $this->connect();
        }
        \fwrite($this->socket, \pack('CCCCCCn', 4, 1, 0, 0, 0, 0, $key)); //Press key
        usleep(200);
        \fwrite($this->socket, \pack('CCCCCCn', 4, 0, 0, 0, 0, 0, $key)); //Release key
    }

    public function disconnect() {
        \fclose($this->socket);
    }

    /**
     * @param $data
     * @return string
     */
    public function toHex($data) {
        return \bin2hex($data);
    }

    /**
     * @param $data
     * @return bool|string
     */
    public function toBin($data) {
        return \hex2bin($data);
    }

}
