<?php
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('.');
    $cfg->set_connections(array('development' => 'mysql://root:root@127.0.0.1/mark'));
});