<?php
return array(
    //'配置项'=>'配置值'
    // 布局设置
    'TMPL_ENGINE_TYPE'       => 'Think', // 默认模板引擎 以下设置仅对使用Think模板引擎有效
    'TMPL_CACHFILE_SUFFIX'   => '.php', // 默认模板缓存后缀
    'TMPL_DENY_FUNC_LIST'    => 'echo,exit', // 模板引擎禁用函数
    'TMPL_DENY_PHP'          => false, // 默认模板引擎是否禁用PHP原生代码
    'TMPL_L_DELIM'           => '{', // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'           => '}', // 模板引擎普通标签结束标记
    'TMPL_VAR_IDENTIFY'      => 'array', // 模板变量识别。留空自动判断,参数为'obj'则表示对象
    'TMPL_STRIP_SPACE'       => true, // 是否去除模板文件里面的html空格与换行
    'TMPL_CACHE_ON'          => true, // 是否开启模板编译缓存,设为false则每次都会重新编译
    'TMPL_CACHE_PREFIX'      => '', // 模板缓存前缀标识，可以动态改变
    'TMPL_CACHE_TIME'        => 0, // 模板缓存有效期 0 为永久，(以数字为值，单位:秒)
    'TMPL_LAYOUT_ITEM'       => '{__CONTENT__}', // 布局模板的内容替换标识
    'LAYOUT_ON'              => true, // 是否启用布局
    'LAYOUT_NAME'            => 'layout', // 当前布局名称 默认为layout


    //'配置项'=>'配置值'
    'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'school', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => '', // 密码
//    'DB_TYPE'                => 'mysql', // 数据库类型
//    'DB_HOST'                => '123.206.52.152', // 服务器地址
//    'DB_NAME'                => 'school', // 数据库名
//    'DB_USER'                => 'root', // 用户名
//    'DB_PWD'                 => '123456', // 密码
    'DB_PORT'                => '3306', // 端口
    'DB_PREFIX'              => '', // 数据库表前缀
    'DB_PARAMS'              => array(), // 数据库连接参数
    'DB_DEBUG'               => true, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'        => true, // 启用字段缓存
    'DB_CHARSET'             => 'utf8', // 数据库编码默认采用utf8

);