<?php

namespace Abizareyhan\Trafi;

class Response
{
  private $status;
  private $body;
  private $headers;

  public function __construct($status, $body, $headers = []) {
    $this->status = $status;
    $this->body = $body;
    $this->headers = $headers;
  }

  public function getStatus() {
      return $this->status;
  }

  public function isSucceeded($value='') {
    return $this->status === 200;
  }

  public function getRawBody() {
    return $this->body;
  }
  public function getJSONDecodedBody() {
    return json_decode($this->body, true);
  }

  public function getHeader($name) {
    if (array_key_exists($name, $this->headers)) {
        return $this->headers[$name];
    }
    return null;
  }

  public function getHeaders() {
    return $this->headers;
  }
}
