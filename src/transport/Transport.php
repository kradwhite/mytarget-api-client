<?php
/**
 * User: Aleksandrov Artem
 * Date: 20.10.2019
 * Time: 16:04
 */

namespace kradwhite\myTarget\api\transport;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\TransferException;

/**
 * Class Transport
 * @package kradwhite\myTarget\api\transport
 */
class Transport implements TransportInterface
{
    /** @var array */
    private $config;

    /** @var Client */
    private $client;

    /** @var */
    private $lastResponseCode;

    /** @var array */
    private $lastResponseHeaders;

    /**
     * Transport constructor.
     * @param Client $client
     * @param array $config
     */
    final public function __construct(Client $client, array $config = [])
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $options
     * @param string $pathSuffix
     * @return mixed
     * @throws GuzzleException
     */
    public function request(string $method, string $path, array $options = [], string $pathSuffix = ".json")
    {
        $response = $this->client->request($method, $path . $pathSuffix, $options);
        $this->lastResponseCode = $response->getStatusCode();
        $this->lastResponseHeaders = $response->getHeaders();
        if ($response->getStatusCode() > 499) {
            throw new TransferException($response->getReasonPhrase(), $response->getStatusCode());
        }
        $json = $response->getBody()->getContents();
        $result = json_decode($json, $this->config['assoc']);
        return json_last_error() ? $json : $result;
    }

    /**
     * @return int
     */
    public function getLastResponseCode(): int
    {
        return $this->lastResponseCode;
    }

    /**
     * @return array
     */
    public function getLastResponseHeaders(): array
    {
        return $this->lastResponseHeaders;
    }
}