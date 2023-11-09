<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\DomainNameTestTrait;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

class DomainNameTest extends PHPWebPathsTest
{

    /**
     * The DomainNameTestTrait defines common tests for
     * implementations of the
     * Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName
     * interface.
     *
     * @see DomainNameTestTrait
     *
     */
    use DomainNameTestTrait;

    public function setUp(): void
    {
        $name = new Name(new Text('-' . $this->randomChars()));
        $this->setExpectedName($name);
        $this->setDomainNameTestInstance(new DomainName($name));
    }

}

