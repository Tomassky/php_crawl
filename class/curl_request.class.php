<?php

    class curl_request
    {
      public $url;
      public $method;
      public $headers;
      public $options;
      public $timeout;

      //初始化各个参数
      public function __construct($url='',$method = '',$headers = null)
      {
          $this->url = empty($url)? $GLOBALS['http_connst']["url"] : $url;
          $this->method = 'GET';
          $this->headers = empty($headers)? $GLOBALS['http_connst']["headers"] : $headers;
          $this->timeout = empty($options)? $GLOBALS['http_connst']['timeout'] : $timeout;
      }

      //设置curl请求的options
      function get_options($request)
      {

        $this->options [CURLOPT_URL] = $request->url;
        $this->options [CURLOPT_HTTPHEADER] = $request->headers;
        $this->options [CURLOPT_CONNECTTIMEOUT] = $request->timeout;
        $this->options [CURLOPT_RETURNTRANSFER] = 1;
        if(true!=var_dump(preg_match('/https/', $request->url)))  //正则匹配，若网址为https，则加入参数
        {
          $this->options [CURLOPT_SSL_VERIFYPEER] = false;
          $this->options [CURLOPT_SSL_VERIFYHOST] = false;
        }
        

        return $this->options;
      }
    }


?>