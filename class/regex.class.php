<?php

    class regex
    {
    	public $file_contents;

        //初始化各个参数
    	public function __construct($file_contents = '')
        {
          
          $this->file_contents = empty($file_contents)? $GLOBALS['regex_connst']["file_contents"] : $file_contents;
        }

        //<a>标签的正则匹配
        function a_regex()
        {
        	$pattern = '/http.{2,100}\<\/a\>/';
        	preg_match_all($pattern,$this->file_contents,$match);
        	$change = array();
        	$change = $match[0];
        	$change = explode('!!',str_replace('"',"",str_replace('>',"----",(str_replace('</a>',"",implode('!!', $change))))));
        	return $change;
        }

        //<title>标签的正则匹配
        function title_regex()
        {
        	$pattern = '/\<title\>.*\<\/title\>/';
        	preg_match_all($pattern,$this->file_contents,$match);
        	$change = array();
        	$change = $match[0];
            $change = str_replace("</title>", "",str_replace("<title>", "",$change));
        	return $change;
        }

    }

?>