<?php

/**
 * Example configuration file.
 * --------------------------------
 * Copy this file to config.php and adjust values for your environment.
 */

define('DEBUG', true);

// Base path where projects will be deployed
$basePath = '/home/your-user/projects/';

// Clients configuration
$clients = [
    'example-client' => [
        // Repository must use SSH format
        'repo' => 'git@github.com:username/repository.git',

        'envs' => [
            'dev' => [
                'branch' => 'dev',
                'token'  => 'GENERATE_RANDOM_TOKEN_HERE',
            ],

            'production' => [
                'branch' => 'main',
                'token'  => 'GENERATE_ANOTHER_RANDOM_TOKEN_HERE',
            ],
        ],
    ],

    // Example for another client:
    /*
    'another-client' => [
        'repo' => 'git@github.com:username/another-repo.git',
        'envs' => [
            'dev' => [
                'branch' => 'develop',
                'token'  => 'TOKEN_HERE',
            ],
            'production' => [
                'branch' => 'main',
                'token'  => 'TOKEN_HERE',
            ],
        ],
    ],
    */
];
