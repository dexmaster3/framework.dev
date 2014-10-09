<?php

class Core_Request
{
    private $rawUrl;
    private $query;
    private $method;
    private $host;
    private $parsedUrlArray;

    public function __construct()
    {
        $this->rawUrl = $_SERVER['REDIRECT_URL'];
        $this->query = $_SERVER['QUERY_STRING'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->host = $_SERVER['HTTP_HOST'];
        $this->parsedUrlArray = $this->parseUrl($this->rawUrl);
    }

    public function getRawUrl()
    {
        return $this->rawUrl;
    }
    public function getQueryParams()
    {
        parse_str($this->query, $queryArray);
        return $queryArray;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getHost()
    {
        return $this->host;
    }
    public function getParsedUrl()
    {
        return $this->parsedUrlArray;
    }

    private function parseUrl($rawUrl)
    {
        $url = explode('/', ltrim($rawUrl, '/'));
        return $url;
    }
}