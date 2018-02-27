<?php


namespace Abizareyhan\Trafi\HTTPClient;

class Curl
{
    private $ch;

    public function __construct($url)
    {
        $this->ch = curl_init($url);
    }

    public function setoptArray(array $options)
    {
        return curl_setopt_array($this->ch, $options);
    }

    public function exec()
    {
        return curl_exec($this->ch);
    }

    public function getinfo()
    {
        return curl_getinfo($this->ch);
    }

    public function errno()
    {
        return curl_errno($this->ch);
    }

    public function error()
    {
        return curl_error($this->ch);
    }
    
    public function __destruct()
    {
        curl_close($this->ch);
    }
}
