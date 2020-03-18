<?php

    class db
    {
        public $host;
        public $username;
        public $password;
        public $database;

        //初始化各个参数
        function __construct($host='',$username='',$password='',$database='')
        {
            $this->host = empty($host)? $GLOBALS['sql_connst']['host'] : $host;
            $this->username = empty($username)? $GLOBALS['sql_connst']['username'] : $username;
            $this->password = empty($password)? $GLOBALS['sql_connst']['password'] : $password;
            $this->database = empty($database)? $GLOBALS['sql_connst']['database'] : $database;
            
        }

        //查看数据库的各个参数
        public function select_table($table_name)
        {

            $lin = mysqli_connect($this->host,$this->username,$this->password,$this->database);
            $list = mysqli_query($lin,"select * from $table_name");
            $list_data = mysqli_fetch_array($list,MYSQLI_ASSOC);
            return $list_data;
        }

        //创建数据库
        public function create_table($table_name)
        {

            
            $lin = mysqli_connect($this->host,$this->username,$this->password,$this->database);
            $exit = mysqli_query($lin,"show tables");
            $exit_data = mysqli_fetch_array($exit,MYSQLI_ASSOC);  //▲ 此处查询，查不到非英文的表
            foreach ($exit_data as $key => $value) {
                if($value == $table_name)
                {
                    mysqli_query($lin,"truncate table $table_name");
                    break;
                }else{
                    $list = mysqli_query($lin,"create table $table_name(value varchar(200) not null)");
                    break;
                }
            }
            
            
        }

        //插入数据库
        public function insert_table($regex_table,$table_value)
        {

            $lin = mysqli_connect($this->host,$this->username,$this->password,$this->database);
            $i = 0;
            for($i=0;$i<count($table_value);$i++)
            {
                mysqli_query($lin,"insert into $regex_table values('$table_value[$i]')");

            }
        }
    }

?>