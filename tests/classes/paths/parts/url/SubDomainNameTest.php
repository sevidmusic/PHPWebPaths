<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPWebPaths\classes\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\SubDomainNameTestTrait;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

class SubDomainNameTest extends PHPWebPathsTest
{

    /**
     * The SubDomainNameTestTrait defines common tests for
     * implementations of the
     * Darling\PHPWebPaths\interfaces\paths\parts\url\SubDomainName
     * interface.
     *
     * @see SubDomainNameTestTrait
     *
     */
    use SubDomainNameTestTrait;

    public function setUp(): void
    {
        $name = new Name(new Text($this->randomChars()));
        $this->setExpectedName($name);
        $this->setSubDomainNameTestInstance(new SubDomainName($name));
    }

}

