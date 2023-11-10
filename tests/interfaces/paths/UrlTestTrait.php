<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths;

use \Darling\PHPWebPaths\interfaces\paths\Domain;
use \Darling\PHPWebPaths\interfaces\paths\Url;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Path;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Query;

/**
 * The UrlTestTrait defines common tests for implementations of the
 * Url interface.
 *
 * @see Url
 *
 */
trait UrlTestTrait
{

    /**
     * @var Url $url An instance of a Url implementation to test.
     */
    protected Url $url;

    /**
     * @var Domain $expectedDomain The Domain instance that is
     *                             expected to be returned by
     *                             the Url instance being tested's
     *                             domain() method.
     */
    private Domain $expectedDomain;

    /**
     * @var Path $expectedPath The Path instance that is expected
     *                         to be returned by the Url instance
     *                         being tested's path() method.
     */
    private ?Path $expectedPath;

    /**
     * @var Query $expectedQuery The Query instance that is expected
     *                           to be returned by the Url instance
     *                           being tested's query() method.
     */
    private ?Query $expectedQuery;

    /**
     * @var Fragment $expectedFragment The Fragment instance that is
     *                                 expected to be returned by the
     *                                 Url instance being tested's
     *                                 fragment() method.
     */
    private ?Fragment $expectedFragment;

    /**
     * Set up an instance of a Url implementation to test.
     *
     * This method must set the Url implementation instance
     * to be tested via the setUrlTestInstance() method.
     *
     * This method must also set the Domain implementation instance
     * to be tested via the setExpectedDomain() method.
     *
     * This method must also set the Path implementation instance
     * to be tested via the setExpectedPath() method.
     *
     * This method must also set the Query implementation instance
     * to be tested via the setExpectedQuery() method.
     *
     * This method must also set the Fragment implementation instance
     * to be tested via the setExpectedFragment() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     *
     * public function setUp(): void
     * {
     *     $schemes = Scheme::cases();
     *     $scheme = $schemes[array_rand($schemes)];
     *     $subDomainName = (
     *         rand(0, 1)
     *         ? null
     *         : new SubDomainName(
     *             new Name(new Text($this->randomChars()))
     *         )
     *     );
     *     $domainName = new DomainName(
     *         new Name(new Text($this->randomChars()))
     *     );
     *     $topLevelDomainName = (
     *         rand(0, 1)
     *         ? null
     *         : new TopLevelDomainName(
     *             new Name(new Text($this->randomChars()))
     *         )
     *     );
     *     $port = (rand(0, 1) ? null : new Port(rand(0, 9000)));
     *     $host = new Host(
     *         subDomainName: $subDomainName,
     *         domainName: $domainName,
     *         topLevelDomainName: $topLevelDomainName
     *     );
     *     $authority = new Authority($host, $port);
     *     $domain = new Domain($scheme, $authority);
     *     $this->setExpectedDomain($domain);
     *     $path = new Path(
     *         new SafeTextCollection(
     *             new SafeText(new Text($this->randomChars())),
     *             new SafeText(new Text($this->randomChars())),
     *             new SafeText(new Text($this->randomChars())),
     *         )
     *     );
     *     $this->setExpectedPath($path);
     *     $query = new Query(new Text($this->randomChars()));
     *     $this->setExpectedQuery($query);
     *     $fragment = new Fragment(new Text($this->randomChars()));
     *     $this->setExpectedFragment($fragment);
     *     $this->setUrlTestInstance(
     *         new Url(
     *             domain: $domain,
     *             path: $path,
     *             query: $query,
     *             fragment: $fragment,
     *         )
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Url implementation instance to test.
     *
     * @return Url
     *
     */
    protected function urlTestInstance(): Url
    {
        return $this->url;
    }

    /**
     * Set the Url implementation instance to test.
     *
     * @param Url $urlTestInstance An instance of an implementation
     *                             of the Url interface to test.
     *
     * @return void
     *
     */
    protected function setUrlTestInstance(
        Url $urlTestInstance
    ): void
    {
        $this->url = $urlTestInstance;
    }

    /**
     * Set the Domain instance that is expected to be returned
     * by the Url instance being tested's domain() method.
     *
     * @param Domain $domain The Domain that is expected to be
     *                       returned by the Url being tested's
     *                       domain() method.
     *
     * @return void
     *
     */
    private function setExpectedDomain(Domain $domain): void
    {
        $this->expectedDomain = $domain;
    }

    /**
     * Return the Domain instance that is expected to be returned
     * by the Url instance being tested's domain() method.
     *
     * @return Domain
     *
     */
    private function expectedDomain(): Domain
    {
        return $this->expectedDomain;
    }

    /**
     * Set the Path instance that is expected to be returned
     * by the Url instance being tested's path() method.
     *
     * @param Path $path The Path that is expected to be
     *                   returned by the Url being tested's
     *                   path() method.
     *
     * @return void
     *
     */
    private function setExpectedPath(Path $path): void
    {
        $this->expectedPath = $path;
    }

    /**
     * Return the Path instance that is expected to be returned
     * by the Url instance being tested's path() method.
     *
     * @return ?Path
     *
     */
    private function expectedPath(): ?Path
    {
        return $this->expectedPath;
    }

    /**
     * Set the Query instance that is expected to be returned
     * by the Url instance being tested's query() method.
     *
     * @param Query $query The Query that is expected to be
     *                     returned by the Url being tested's
     *                     query() method.
     *
     * @return void
     *
     */
    private function setExpectedQuery(Query $query): void
    {
        $this->expectedQuery = $query;
    }

    /**
     * Return the Query instance that is expected to be returned
     * by the Url instance being tested's query() method.
     *
     * @return ?Query
     *
     */
    private function expectedQuery(): ?Query
    {
        return $this->expectedQuery;
    }

    /**
     * Set the Fragment instance that is expected to be returned
     * by the Url instance being tested's fragment() method.
     *
     * @param Fragment $fragment The Fragment that is expected to be
     *                           returned by the Url being tested's
     *                           fragment() method.
     *
     * @return void
     *
     */
    private function setExpectedFragment(Fragment $fragment): void
    {
        $this->expectedFragment = $fragment;
    }

    /**
     * Return the Fragment instance that is expected to be returned
     * by the Url instance being tested's fragment() method.
     *
     * @return ?Fragment
     *
     */
    private function expectedFragment(): ?Fragment
    {
        return $this->expectedFragment;
    }

    /**
     * Test that the domain() method returns the expected Domain.
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test_domain_returns_the_expected_Domain(): void
    {
        $this->assertEquals(
            $this->expectedDomain(),
            $this->urlTestInstance()->domain(),
            $this->testFailedMessage(
               $this->urlTestInstance(),
               'domain',
                'returns the expected Domain'
            ),
        );
    }

    /**
     * Test that the path() method returns the expected Path.
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test_path_returns_the_expected_Path(): void
    {
        $this->assertEquals(
            $this->expectedPath(),
            $this->urlTestInstance()->path(),
            $this->testFailedMessage(
               $this->urlTestInstance(),
               'path',
               'returns the expected Path'
            ),
        );
    }

    /**
     * Test that the query() method returns the expected Query.
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test_query_returns_the_expected_Query(): void
    {
        $this->assertEquals(
            $this->expectedQuery(),
            $this->urlTestInstance()->query(),
            $this->testFailedMessage(
               $this->urlTestInstance(),
               'query',
               'returns the expected Query'
            ),
        );
    }

    /**
     * Test that the fragment() method returns the expected Fragment.
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test_fragment_returns_the_expected_Fragment(): void
    {
        $this->assertEquals(
            $this->expectedFragment(),
            $this->urlTestInstance()->fragment(),
            $this->testFailedMessage(
               $this->urlTestInstance(),
               'fragment',
               'returns the expected Fragment'
            ),
        );
    }

    /**
     * Test that the __toString() method returns a string built by
     * concatenating the assigned Domain Path Query and Fragment
     *
     * @return void
     *
     * @covers Url->__toString()
     *
     */
    public function test___toString_returns_a_string_built_by_concatenating_the_assigned_Domain_Path_Query_and_Fragment(): void
    {
        $this->assertEquals(
            $this->urlTestInstance()->domain() .
            (
                is_null($this->urlTestInstance()->path())
                ? ''
                : $this->urlTestInstance()->path()->__toString()
            ) .
            (
                is_null($this->urlTestInstance()->query())
                ? ''
                : '?' . $this->urlTestInstance()->query()->__toString()
            ) .
            (
                is_null($this->urlTestInstance()->fragment())
                ? ''
                : '#' . $this->urlTestInstance()->fragment()->__toString()
            ),
            $this->urlTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->urlTestInstance(),
               'fragment',
               'returns the expected Fragment'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

