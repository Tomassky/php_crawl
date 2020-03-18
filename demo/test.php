<?php

    include_once './init.php';

    $request = new curl_request();  //新建一个curl对象
    $sql = new db();  //新建一个数据库对象
    

    $ch = curl_init();  //curl初始化
    $options = $request->get_options($request);  //获得curl参数
    curl_setopt_array($ch,$options);  //为curl设置参数
    $file_contents = curl_exec($ch);  //发送curl请求
    curl_close($ch);  //关闭curl请求

    $regex = new regex($file_contents);  //新建一个正则匹配对象，传入获取的页面
    $regex_a = $regex->a_regex();  //<a>标签的正则匹配
    $regex_title = $regex->title_regex();  //<title>标签的正则匹配


    $sql->create_table($regex_title[0]);  //新建数据表，传入<title>标签的正则匹配
    $sql->insert_table($regex_title[0],$regex_a);  //插入数据表，传入<a><title>标签的正则匹配

?>