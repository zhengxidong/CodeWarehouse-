<?php
/**
 *@description : pworks框架的配置文件,这里是PHP版本的pri-api内部API，为了与nodejs的区分开,
 *               nodejs版本: https://domain/n/v1/project/xxxx  
 *               php版本   : https://domain/p/v1/project/xxxx
 *@author      : stephen.mo <immokai@aliyun.com>
 *@date        : Aug 05,2016
 *@version     : 1.0.0
 */

define('APP_NAME', 'pri-api-php');

//For develop mode
define('CONFIG_CACHE_SETTING', 'array');

//For production mode
# define('CONFIG_CACHE_SETTING', 'apc, array');

define('PWORKS_XML_CONFIG', APP_ROOT . '/pworks.xml');
#define('PWORKS_XML_CONFIG',ProjectPworksConfig::PWORKS_COUPON_API_XML);

//For production mode
//define('PWORKS_CONFIG_SYNTAX_CHECK', true);

//For develop mode
define('PWORKS_CONFIG_SYNTAX_CHECK', false);

//For develop mode
define('APP_CACHE_SETTING', 'array');

