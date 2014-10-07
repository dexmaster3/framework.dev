<?php

class Core_Request
{
    private $rawUrl;
    private $query;
    private $method;
    private $host;
    private $parsedUrlzz;

    public function Core_Request()
    {
        $this->rawUrl = $_SERVER[REDIRECT_URL];
        $this->query = $_SERVER[QUERY_STRING];
        $this->method = $_SERVER[METHOD];
        $this->host = $_SERVER[HOST];
        $this->parsedUrlzz = $this->parseUrl($this->rawUrl);
    }

    public function getRawUrl()
    {
        return $this->rawUrl;
    }
    public function getQueryString()
    {
        return $this->query;
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
        return $this->parsedUrlzz;
    }

    private function parseUrl($rawUrl)
    {
        $url = explode('/', ltrim($rawUrl, '/'));
        return $url;
    }
}