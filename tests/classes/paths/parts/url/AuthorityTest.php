<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPWebPaths\classes\paths\parts\url\Host;
use \Darling\PHPWebPaths\classes\paths\parts\url\Port;
use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use Darling\PHPTextTypes\classes\strings\Name;
use Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\parts\url\Authority;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\AuthorityTestTrait;

class AuthorityTest extends PHPWebPathsTest
{

    /**
     * The AuthorityTestTrait defines
     * common tests for implementations of the
     * Darling\PHPWebPaths\interfaces\paths\parts\url\Authority
     * interface.
     *
     * @see AuthorityTestTrait
     *
     */
    use AuthorityTestTrait;

    public function setUp(): void
    {
        $host = new Host(domainName: new DomainName(new Name(new Text('Foo'))));
        $port = new Port(8080);
        $this->setExpectedHost($host);
        $this->setExpectedPort($port);
        $this->setAuthorityTestInstance(
            new Authority($host, (rand(0, 1) ? null : $port)),
        );
    }
}

