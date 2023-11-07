<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPWebPaths\classes\paths\parts\url\Port;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\PortTestTrait;

class PortTest extends PHPWebPathsTest
{

    /**
     * The PortTestTrait defines common tests for implementations of
     * the Darling\PHPWebPaths\interfaces\paths\parts\url\Port
     * interface.
     *
     * @see PortTestTrait
     *
     */
    use PortTestTrait;

    public function setUp(): void
    {
        $portNumber = rand(PHP_INT_MIN, PHP_INT_MAX);
        $this->setExpectedPortNumber($portNumber);
        $this->setPortTestInstance(
            new Port($portNumber)
        );
    }

}

