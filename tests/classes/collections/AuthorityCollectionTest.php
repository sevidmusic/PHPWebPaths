<?php

namespace Darling\PHPWebPaths\tests\classes\collections;

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\collections\AuthorityCollection;
use \Darling\PHPWebPaths\classes\paths\parts\url\Authority as AuthorityInstance;
use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName as DomainNameInstance;
use \Darling\PHPWebPaths\classes\paths\parts\url\Host as HostInstance;
use \Darling\PHPWebPaths\classes\paths\parts\url\Port as PortInstance;
use \Darling\PHPWebPaths\classes\paths\parts\url\SubDomainName as SubDomainNameInstance;
use \Darling\PHPWebPaths\classes\paths\parts\url\TopLevelDomainName as TopLevelDomainNameInstance;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\collections\AuthorityCollectionTestTrait;

class AuthorityCollectionTest extends PHPWebPathsTest
{

    /**
     * The AuthorityCollectionTestTrait defines
     * common tests for implementations of the
     * Darling\PHPWebPaths\interfaces\collections\AuthorityCollection
     * interface.
     *
     * @see AuthorityCollectionTestTrait
     *
     */
    use AuthorityCollectionTestTrait;

    public function setUp(): void
    {
        $authorities = [];
        for($i = 0; $i < rand(0, 100); $i++) {
            $authorities[] = new AuthorityInstance(
                new HostInstance(
                    subDomainName: new SubDomainNameInstance(
                        new Name(new Text($this->randomChars()))
                    ),
                    domainName: new DomainNameInstance(
                        new Name(new Text($this->randomChars()))
                    ),
                    topLevelDomainName: new TopLevelDomainNameInstance(
                        new Name(new Text($this->randomChars()))
                    ),
                ),
                new PortInstance(rand(8000, 9000)),
            );
        }
        $this->setExpectedCollection($authorities);
        $this->setAuthorityCollectionTestInstance(
            new AuthorityCollection(
                ...$authorities
            )
        );
    }
}

