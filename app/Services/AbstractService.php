<?php
namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;

abstract class AbstractService
{
    protected $httpClient;
    public function __construct()
    {
        $baseUri =  env('BASE_URL_BPJS');
        $this->httpClient = new HttpClient(['base_uri' => $baseUri]);
    }
    protected function send(string $method, string $url, array $options = array(), array $headers = array())
    {
        try {
            $baseUri =  env('BASE_URL_BPJS');
            $client = new \GuzzleHttp\Client();
            $header = $this->getHeaders($headers);
            $params = ['json' => $options, 'headers' => $header];

            $res = $client->request($method, $baseUri . $url, $params);
            return json_decode($res->getBody(), true);
        } catch (RequestException $re) {
            throw new \Exception($re->getMessage(), $re->getCode());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }
    /**
     * Send POST request.
     *
     * @param string $url
     * @param array $params
     * @param array $query
     * @return mixed
     */
    public function post(string $url, array $headers = array(), array $params = array())
    {
        return $this->send('POST', $url, $params,  $headers);
    }
    /**
     * Send POST request.
     *
     * @param string $url
     * @param array $params
     * @param array $query
     * @return mixed
     */
    public function postMultipart(string $url, array $params = array())
    {
        return $this->send('POST', $url, ['multipart' => $params]);
    }
    /**
     * Send GET request.
     *
     * @param string $url
     * @param array  $query Post form parameter
     *
     * @return mixed
     */
    public function get(string $url, array $query = array(), array $options = array(), array $headers = array())
    {
        return $this->send('GET', $url, ['query' => $query], $headers);
    }
    /**
     * Send PUT request.
     *
     * @param string $url
     * @param array  $query Post form parameter
     *
     * @return mixed
     */
    public function put(string $url, array $headers = array())
    {
        return $this->send('PUT', $url, [], $headers);
    }
    /**
     * Send DELETE request.
     *
     * @param string $url
     * @param array  $query Post form parameter
     *
     * @return mixed
     */
    public function delete(string $url, array $headers = array())
    {
        return $this->send('DELETE', $url, [], $headers);
    }

    public function getHeaders($headers)
    {
        date_default_timezone_set('UTC');
        $timestamp = time();
        $message = $headers['ConsId'] . '&' . $timestamp;
        $hash  = hash_hmac('sha256', $message, $headers['secretkey']);
        $authorization = base64_encode($headers['username'] . ':' . $headers['password'] . ':' . '095');

        $sign = '';
        foreach (str_split($hash, 2) as $pair) {
            $sign .= chr(hexdec($pair));
        }
        $signature = base64_encode($sign);

        $header = [
            'X-cons-id' => $headers['ConsId'],
            'X-Timestamp' => $timestamp,
            'X-Signature' => $signature,
            'X-Authorization' => 'Basic ' . $authorization,
            'Content-Type' => 'application/json'
        ];

        return $header;
    }
}
