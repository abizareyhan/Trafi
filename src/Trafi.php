<?php

namespace Abizareyhan\Trafi;

use Abizareyhan\Trafi\HTTPClient;
use Abizareyhan\Trafi\Response;

class Trafi
{
  const BASE_ENDPOINT = "https://www.trafi.com/api";

  private $city;
  private $baseEndpoint;
  private $httpClient;


  public function __construct(HTTPClient $httpClient, $city)
  {
      $this->httpClient = $httpClient;
      $this->city = $city;
      $this->baseEndpoint = Trafi::BASE_ENDPOINT;
  }

  public function getHTTPClient()
  {
    return $this->httpClient;
  }

  public function getCity()
  {
    return $this->city;
  }

  public function getBaseEndpoint()
  {
    return $this->baseEndpoint;
  }

  public function getEvents()
  {
    return $this->httpClient->get($this->baseEndpoint."/events/".$this->city);
  }

  public function getStops(Bounds $bounds)
  {
    return $this->httpClient->get($this->baseEndpoint."/map-markers/".$this->city."/stops?bounds=".$bounds->getBoundsString());
  }

  public function getTransports(Bounds $bounds)
  {
    return $this->httpClient->get($this->baseEndpoint."/map-markers/".$this->city."/transports?bounds=".$bounds->getBoundsString());
  }

}
