<?php

namespace Darling\PHPWebPaths\tests\classes\paths;

use Darling\PHPWebPaths\classes\paths\parts\url\Port;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\Domain;
use \Darling\PHPWebPaths\classes\paths\parts\url\Authority;
use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\Host;
use \Darling\PHPWebPaths\classes\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\TopLevelDomainName;
use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\DomainTestTrait;

class DomainTest extends PHPWebPathsTest
{

    /**
     * The DomainTestTrait defines common tests for implementations
     * of the Darling\PHPWebPaths\interfaces\paths\Domain interface.
     *
     * @see DomainTestTrait
     *
     */
    use DomainTestTrait;

    public function setUp(): void
    {
        $schemes = Scheme::cases();
        $scheme = $schemes[array_rand($schemes)];
        $this->setExpectedScheme($scheme);
        $authority = new Authority(
            new Host(
                subDomainName: (
                    rand(0, 1)
                    ? null
                    : new SubDomainName(
                        new Name(new Text($this->randomChars()))
                    )
                ),
                domainName: new DomainName(
                    new Name(
                        new Text($this->randomChars())
                    )
                ),
                topLevelDomainName: (
                    rand(0, 1)
                    ? null
                    : new TopLevelDomainName(
                        new Name( new Text($this->randomChars()))
                    )
                ),
            ),
            (rand(0, 1) ? null : new Port(rand(1, 4000)))
        );
        $this->setExpectedAuthority($authority);
        $this->setDomainTestInstance(
            new Domain($scheme, $authority)
        );
    }

}

