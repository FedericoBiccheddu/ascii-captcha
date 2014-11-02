<?php

namespace FedericoBiccheddu\AsciiCaptcha\Test;

abstract class TestCase extends \PHPUnit_Framework_TestCase {

    public function setUp()
    {
        require_once __DIR__ . '/../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';
    }

}
