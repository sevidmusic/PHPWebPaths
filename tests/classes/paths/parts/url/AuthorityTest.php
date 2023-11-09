<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPWebPaths\classes\paths\parts\url\Host;
use \Darling\PHPWebPaths\classes\paths\parts\url\Port;
use \Darling\PHPWebPaths\classes\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\TopLevelDomainName;
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
        $host = new Host(
            subDomainName: (
                rand(0, 1)
                ? null
                : new SubDomainName(
                    new Name(new Text($this->randomChars()))
                )
            ),
            domainName: new DomainName(
                new Name(new Text($this->randomChars()))
            ),
            topLevelDomainName: (
                rand(0, 1)
                ? null
                : new TopLevelDomainName(
                    new Name(new Text($this->randomChars()))
                )
            ),
        );
        $this->setExpectedHost($host);
        $port = (rand(0, 1) ? null : new Port(8080));
        $this->setExpectedPort($port);
        $this->setAuthorityTestInstance(
            new Authority($host, $port),
        );
    }

}

