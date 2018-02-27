<?php

namespace Abizareyhan\Trafi\HTTPClient;

use Abizareyhan\Trafi\HTTPClient;
use Abizareyhan\Trafi\Response;

class CurlHTTPClient implements HTTPClient
{
  public function get($url)
  {
      return $this->sendRequest('GET', $url, [], []);
  }

  public function post($url, array $data)
  {
      return $this->sendRequest('POST', $url, ['Content-Type: application/json; charset=utf-8'], $data);
  }

  private function sendRequest($method, $url, array $additionalHeader, array $reqBody)
  {
      $curl = new Curl($url);
      $options = [
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_BINARYTRANSFER => true,
          CURLOPT_HEADER => true,
      ];
      if ($method === 'POST') {
          if (empty($reqBody)) {
              $options[CURLOPT_HTTPHEADER][] = 'Content-Length: 0';
          } else {
              $options[CURLOPT_POSTFIELDS] = json_encode($reqBody);
          }
      }
      $curl->setoptArray($options);
      $result = $curl->exec();
      if ($curl->errno()) {
          throw new CurlExecutionException($curl->error());
      }
      $info = $curl->getinfo();
      $httpStatus = $info['http_code'];
      $responseHeaderSize = $info['header_size'];
      $responseHeaderStr = substr($result, 0, $responseHeaderSize);
      $responseHeaders = [];
      foreach (explode("\r\n", $responseHeaderStr) as $responseHeader) {
          $kv = explode(':', $responseHeader, 2);
          if (count($kv) === 2) {
              $responseHeaders[$kv[0]] = trim($kv[1]);
          }
      }
      $body = substr($result, $responseHeaderSize);
      return new Response($httpStatus, $body, $responseHeaders);
  }

}
