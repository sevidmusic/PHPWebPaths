<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\parts\url\TopLevelDomainName;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\TopLevelDomainNameTestTrait;

class TopLevelDomainNameTest extends PHPWebPathsTest
{

    /**
     * The TopLevelDomainNameTestTrait defines common tests for
     * implementations of the
     * Darling\PHPWebPaths\interfaces\paths\parts\url\TopLevelDomainName
     * interface.
     *
     * @see TopLevelDomainNameTestTrait
     *
     */
    use TopLevelDomainNameTestTrait;

    public function setUp(): void
    {
        $name = new Name(new Text('-' . $this->randomChars()));
        $this->setExpectedName($name);
        $this->setTopLevelDomainNameTestInstance(new TopLevelDomainName($name));
    }

}

