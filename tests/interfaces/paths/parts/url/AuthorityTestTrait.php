<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Port;

/**
 * The AuthorityTestTrait defines common tests for implementations of
 * the Authority interface.
 *
 * @see Authority
 *
 */
trait AuthorityTestTrait
{

    /**
     * @var Authority $authority An instance of a Authority
     *                           implementation to test.
     */
    protected Authority $authority;

    /**
     * @var Host $expectedHost The Host instance that is expected to
     *                         be returned by the Authority instance
     *                         being tested's host() method.
     */
    private Host $expectedHost;

    /**
     * @var Port $expectedPort The Port instance that is expected
     *                         to be returned by the Authority
     *                         instance being tested's host()
     *                         method.
     */
    private ?Port $expectedPort;

    /**
     * Set up an instance of a Authority implementation to test.
     *
     * This method must set the Authority implementation instance
     * to be tested via the setAuthorityTestInstance() method.
     *
     * This method must also set the Host instance that is expected
     * to be returned by the Authority instance being tested's host()
     * method via the setExpectedHost() method.
     *
     * This method must also set the Port instance that is expected
     * to be returned by the Authority instance being tested's host()
     * method via the setExpectedPort() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * public function setUp(): void
     * {
     *     $host = new Host(
     *         subDomainName: (
     *             rand(0, 1)
     *             ? null
     *             : new SubDomainName(
     *                 new Name(new Text($this->randomChars()))
     *             )
     *         ),
     *         domainName: new DomainName(new Name(new Text($this->randomChars()))),
     *         topLevelDomainName: (
     *             rand(0, 1)
     *             ? null
     *             : new TopLevelDomainName(
     *                 new Name(new Text($this->randomChars()))
     *             )
     *         ),
     *     );
     *     $port = new Port(8080);
     *     $this->setExpectedHost($host);
     *     $this->setExpectedPort($port);
     *     $this->setAuthorityTestInstance(
     *         new Authority($host, (rand(0, 1) ? null : $port)),
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Authority implementation instance to test.
     *
     * @return Authority
     *
     */
    protected function authorityTestInstance(): Authority
    {
        return $this->authority;
    }

    /**
     * Set the Authority implementation instance to test.
     *
     * @param Authority $authorityTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the Authority
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setAuthorityTestInstance(
        Authority $authorityTestInstance
    ): void
    {
        $this->authority = $authorityTestInstance;
    }

    /**
     * Set the Host instance that is expected to be returned by
     * the Authority instance being tested's host() method.
     *
     * @return void
     *
     */
    protected function setExpectedHost(Host $host): void
    {
        $this->expectedHost = $host;
    }

    /**
     * Return the Host instance that is expected to be returned by
     * the Authority instance being tested's host() method.
     *
     * @return Host
     *
     */
    protected function expectedHost(): Host
    {
        return $this->expectedHost;
    }

    /**
     * Set the Port instance that is expected to be returned by
     * the Authority instance being tested's port() method.
     *
     * @return void
     *
     */
    protected function setExpectedPort(?Port $port): void
    {
        $this->expectedPort = $port;
    }

    /**
     * Return the Port instance that is expected to be returned by
     * the Authority instance being tested's port() method.
     *
     * @return Port
     *
     */
    protected function expectedPort(): ?Port
    {
        return $this->expectedPort;
    }

    /**
     * Test that the host() method returns the expected Host.
     *
     * @return void
     *
     * @covers Authority->host()
     */
    public function test_host_returns_the_expected_Host(): void
    {
        $this->assertEquals(
            $this->expectedHost(),
            $this->authorityTestInstance()->host(),
            $this->testFailedMessage(
               $this->authorityTestInstance(),
               'host',
                'returns the expected Host'
            ),
        );
    }

    /**
     * Test that the port() method returns the expected Port.
     *
     * @return void
     *
     * @covers Authority->port()
     */
    public function test_port_returns_the_expected_Port(): void
    {
        $this->assertEquals(
            $this->expectedPort(),
            $this->authorityTestInstance()->port(),
            $this->testFailedMessage(
               $this->authorityTestInstance(),
               'port',
                'returns the expected Port'
            ),
        );
    }

    /**
     * Test to string returns expected Host contcatenated with
     * expected Port.
     *
     * @return void
     *
     * @covers Authority->__toString()
     */
    public function test__to_string_returns_assigned_Host_contcatenated_with_assigned_Port(): void
    {
        $this->assertEquals(
            $this->authorityTestInstance()->host()->__toString() .
            (
                is_null($this->authorityTestInstance()->port())
                ? ''
                : ':' . $this->authorityTestInstance()->port()->__toString()
            ),
            $this->authorityTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->authorityTestInstance(),
               'port',
                'returns the expected Port'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

