<?php
if (!defined('BASE_PATH')) exit('Access Denied!');

$config = array (
        'test' => array (
                    'host' => '127.0.0.1',
                    'port' => '6379',
                    'write' => array (
                        'host' => '127.0.0.1',
                        'port' => '6379'
                    ),
                    'read' => array (
                            '1' => array (
                                'host' => '127.0.0.1',
                                'port' => '6379'
                            ),
                            '2' => array (
                                'host' => '127.0.0.1',
                                'port' => '6889'
                            )
                    ),
        ),
        'product' => array (
                    'host' => '127.0.0.1',
                    'port' => '6379',
                    'write' => array (
                        'host' => '127.0.0.1',
                        'port' => '6379'
                    ),
                    'read' => array (
                            '1' => array (
                                'host' => '127.0.0.1',
                                'port' => '6379'
                            ),
                            '2' => array (
                                'host' => '127.0.0.1',
                                'port' => '6889'
                            )
                    ),
        ),
        'develop' => array (
                    'host' => '127.0.0.1',
                    'port' => '6379',
                    'write' => array (
                            'host' => '127.0.0.1',
                            'port' => '6379'
                    ),
                    'read' => array (
                            '1' => array (
                                    'host' => '127.0.0.1',
                                    'port' => '6379'
                            ),
                            '2' => array (
                                    'host' => '127.0.0.1',
                                    'port' => '6379'
                            ),
                            '3' => array (
                                    'host' => '127.0.0.1',
                                    'port' => '6379'
                            )
                    )
        ) 
);
return defined('ENV') ? $config[ENV] : $config['product'];
