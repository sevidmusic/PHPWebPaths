<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\Host;
use \Darling\PHPWebPaths\classes\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\TopLevelDomainName;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\HostTestTrait;

class HostTest extends PHPWebPathsTest
{

    /**
     * The HostTestTrait defines common tests for implementations of
     * the Darling\PHPWebPaths\interfaces\paths\parts\url\Host
     * interface.
     *
     * @see HostTestTrait
     *
     */
    use HostTestTrait;

    public function setUp(): void
    {
        $subDomainName = new SubDomainName(new Name(new Text($this->randomChars())));
        $this->setExpectedSubDomainName($subDomainName);
        $domainName = new DomainName(new Name(new Text($this->randomChars())));
        $this->setExpectedDomainName($domainName);
        $topLevelDomainName = new TopLevelDomainName(new Name(new Text($this->randomChars())));
        $this->setExpectedTopLevelDomainName($topLevelDomainName);
        $this->setHostTestInstance(new Host($subDomainName, $domainName, $topLevelDomainName));
    }

}

