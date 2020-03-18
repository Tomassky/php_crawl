<?php

    //初始化文件
    define('DIR_dang',$_SERVER['DOCUMENT_ROOT']."/php_crawl/");

    function my_autoload($class)
    {
        include '../class/'.$class.'.class.php';
    }

    spl_autoload_register('my_autoload');

    $http_connst = include_once DIR_dang.'http_connst.php';
    $sql_connst = include_once DIR_dang.'sql_connst.php';
    $regex_connst = include_once DIR_dang.'regex_connst.php';

?>