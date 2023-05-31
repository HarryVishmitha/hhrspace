<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customcurl
{
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function simple_get($url)
    {
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'ignore_errors' => true
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        return $response !== false ? $response : null;
    }
}
