<?php
/**
 *@description : The start entry for api framework.
 *@author      : stephen.mo <immokai@aliyun.com>
 *@date        : Aug 01,2016
 *@version     : 1.0.0
 */
date_default_timezone_set("Asia/Shanghai");
# 错误报告级别
error_reporting(E_ALL & ~E_NOTICE);

# 引入pworks的xml配置文件
#require_once('/data/conf/door_yun_api/config/ProjectPworksConfig.inc.php');

# 定义API中的token
#define('WS_TOKEN',ProjectPworksConfig::DOOR_YUN_API_TOKEN );

# 定义项目起始位置
define('APP_ROOT',dirname(__FILE__));


# 处理默认的lib目录
set_include_path(get_include_path().PATH_SEPARATOR.dirname(APP_ROOT).'\pear'.PATH_SEPARATOR.APP_ROOT);

# 使用本地的项目配置
define('PWORKS_CONFIG_FILE_PATH',APP_ROOT.'/pworks.inc.php');

# 引入框架入口并开始
require_once('pworks/pworks.php');
