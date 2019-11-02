<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 16:31
 */

namespace kradwhite\myTarget\api\transport;

use GuzzleHttp\Client;

/**
 * Class TransportInterface
 * @package kradwhite\myTarget\api\transport
 */
interface TransportInterface
{
    /**
     * TransportInterface constructor.
     * @param Client $client
     * @param array $config
     */
    public function __construct(Client $client, array $config);

    /**
     * @param string $method
     * @param string $path
     * @param array $options
     * @param string $pathSuffix
     * @return mixed
     */
    public function request(string $method, string $path, array $options = [], string $pathSuffix = "");
}