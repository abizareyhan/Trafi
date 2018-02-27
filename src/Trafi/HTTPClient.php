<?php
namespace Abizareyhan\Trafi;

interface HTTPClient
{
    public function get($url);

    public function post($url, array $data);
}
