<?php
namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

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
            $res = $client->request($method, $baseUri . $url, $header);
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
    public function post(string $url, array $params = array(), array $query = array())
    {
        return $this->send('POST', $url, ['json' => $params, 'query' => $query]);
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
    public function put(string $url, array $params = array(), array $query = array())
    {
        return $this->send('PUT', $url, ['json' => $params, 'query' => $query]);
    }
    /**
     * Send DELETE request.
     *
     * @param string $url
     * @param array  $query Post form parameter
     *
     * @return mixed
     */
    public function delete(string $url, array $query = array())
    {
        return $this->send('DELETE', $url, ['query' => $query]);
    }

    public function getHeaders($headers)
    {
        $header = [
            'headers' => [
                'X-cons-id' => $headers['x-cons-id'][0],
                'X-Timestamp' => $headers['x-timestamp'][0],
                'X-Signature' => $headers['x-signature'][0],
                'X-Authorization' => $headers['x-authorization'][0],
            ]
        ];
        return $header;
    }
}
