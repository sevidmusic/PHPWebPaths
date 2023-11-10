<?php

namespace Darling\PHPWebPaths\tests\classes\paths;

use \Darling\PHPTextTypes\classes\collections\SafeTextCollection;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\SafeText;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\Domain;
use \Darling\PHPWebPaths\classes\paths\Url;
use \Darling\PHPWebPaths\classes\paths\parts\url\Authority;
use \Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\Fragment;
use \Darling\PHPWebPaths\classes\paths\parts\url\Host;
use \Darling\PHPWebPaths\classes\paths\parts\url\Path;
use \Darling\PHPWebPaths\classes\paths\parts\url\Port;
use \Darling\PHPWebPaths\classes\paths\parts\url\Query;
use \Darling\PHPWebPaths\classes\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\classes\paths\parts\url\TopLevelDomainName;
use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\UrlTestTrait;

class UrlTest extends PHPWebPathsTest
{

    /**
     * The UrlTestTrait defines
     * common tests for implementations of the
     * Darling\PHPWebPaths\interfaces\paths\Url
     * interface.
     *
     * @see UrlTestTrait
     *
     */
    use UrlTestTrait;

    public function setUp(): void
    {
        $schemes = Scheme::cases();
        $scheme = $schemes[array_rand($schemes)];
        $subDomainName = (
            rand(0, 1)
            ? null
            : new SubDomainName(
                new Name(new Text($this->randomChars()))
            )
        );
        $domainName = new DomainName(
            new Name(new Text($this->randomChars()))
        );
        $topLevelDomainName = (
            rand(0, 1)
            ? null
            : new TopLevelDomainName(
                new Name(new Text($this->randomChars()))
            )
        );
        $port = (rand(0, 1) ? null : new Port(rand(0, 9000)));
        $host = new Host(
            subDomainName: $subDomainName,
            domainName: $domainName,
            topLevelDomainName: $topLevelDomainName
        );
        $authority = new Authority($host, $port);
        $domain = new Domain($scheme, $authority);
        $this->setExpectedDomain($domain);
        $path = new Path(
            new SafeTextCollection(
                new SafeText(new Text($this->randomChars())),
                new SafeText(new Text($this->randomChars())),
                new SafeText(new Text($this->randomChars())),
            )
        );
        $this->setExpectedPath($path);
        $query = new Query(new Text($this->randomChars()));
        $this->setExpectedQuery($query);
        $fragment = new Fragment(new Text($this->randomChars()));
        $this->setExpectedFragment($fragment);
        $this->setUrlTestInstance(
            new Url(
                domain: $domain,
                path: $path,
                query: $query,
                fragment: $fragment,
            )
        );
    }
}

