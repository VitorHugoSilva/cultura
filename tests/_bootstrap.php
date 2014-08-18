<?php
$unitTesting = true;
$testEnvironment = 'testing';
$app = require_once __DIR__ . '/../bootstrap/start.php';
$app->boot();

include __DIR__ . '/acceptance/ResourceTester.php';