<?php

/**
 * Simple PHP Webhook Git Deployer
 * --------------------------------
 * A lightweight, self-hosted deployment system for GitHub webhooks.
 */

require __DIR__ . '/config.php';

// Allow only POST requests (recommended for webhooks)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// ----------------------------
// Get token from URL
$uri = trim($_SERVER['REQUEST_URI'], '/');
$token = explode('?', $uri)[0];

// ----------------------------
// Find client + environment by token
$found = null;

foreach ($clients as $client => $data) {
    foreach ($data['envs'] as $env => $envData) {
        if ($envData['token'] === $token) {
            $found = [
                'client'  => $client,
                'env'     => $env,
                'repo'    => $data['repo'],
                'branch'  => $envData['branch'],
            ];
            break 2;
        }
    }
}

if (!$found) {
    http_response_code(404);
    exit('Not found');
}

// ----------------------------
$client = $found['client'];
$env    = $found['env'];
$repo   = $found['repo'];
$branch = $found['branch'];

$path = "{$basePath}{$client}/{$env}";

// Create directory if it does not exist
if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

chdir($path);

// ----------------------------
// Detect directory state
$hasGit   = is_dir('.git');
$hasFiles = count(array_diff(scandir('.'), ['.', '..'])) > 0;

// ----------------------------
// Choose action
if (!$hasGit && !$hasFiles) {
    $cmd = "git clone -b {$branch} {$repo} .";
    $action = 'CLONE';
}
elseif (!$hasGit && $hasFiles) {
    $cmd = "
        git init &&
        git remote add origin {$repo} &&
        git fetch origin &&
        git checkout -B {$branch} origin/{$branch}
    ";
    $action = 'INIT';
}
else {
    $cmd = "git pull origin {$branch}";
    $action = 'PULL';
}

// ----------------------------
// Execute command
$output = shell_exec($cmd . " 2>&1");

// ----------------------------
// Response
if (defined('DEBUG') && DEBUG === true) {
    echo "<pre>";
    echo "Client : {$client}\n";
    echo "Environment : {$env}\n";
    echo "Path : {$path}\n";
    echo "Repository : {$repo}\n";
    echo "Action : {$action}\n\n";
    echo $output;
    echo "</pre>";
} else {
    echo "OK";
}
