<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths;

use \Darling\PHPWebPaths\interfaces\paths\Domain;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;
use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;

/**
 * The DomainTestTrait defines common tests for
 * implementations of the Domain interface.
 *
 * @see Domain
 *
 */
trait DomainTestTrait
{

    /**
     * @var Domain $domain An instance of a Domain implementation
     *                     to test.
     */
    protected Domain $domain;

    /**
     * @var Scheme $expectedScheme The Scheme that is expected to be
     *                             returned by the Domain being
     *                             tested's scheme() method.
     */
    protected Scheme $expectedScheme;

    /**
     * @var Authority $expectedAuthority The Authority that is
     *                                   expected to be returned by
     *                                   the Domain being tested's
     *                                   authority() method.
     */
    protected Authority $expectedAuthority;

    /**
     * Set up an instance of a Domain implementation to test.
     *
     * This method must also set the Domain implementation instance
     * to be tested via the setDomainTestInstance() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $this->setDomainTestInstance(
     *         new \Darling\PHPWebPaths\classes\paths\Domain()
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Domain implementation instance to test.
     *
     * @return Domain
     *
     */
    protected function domainTestInstance(): Domain
    {
        return $this->domain;
    }

    /**
     * Set the Domain implementation instance to test.
     *
     * @param Domain $domainTestInstance An instance of an
     *                                   implementation of
     *                                   the Domain interface
     *                                   to test.
     *
     * @return void
     *
     */
    protected function setDomainTestInstance(
        Domain $domainTestInstance
    ): void
    {
        $this->domain = $domainTestInstance;
    }

    /**
     * Set the Scheme that is expected to be returned by the
     * Domain instance being tested's scheme() method.
     *
     * @return void
     *
     */
    protected function setExpectedScheme(Scheme $scheme): void
    {
        $this->expectedScheme = $scheme;
    }

    /**
     * Return the Scheme that is expected to be returned by the
     * Domain instance being tested's scheme() method.
     *
     * @return Scheme
     *
     */
    protected function expectedScheme(): Scheme
    {
        return $this->expectedScheme;
    }

    /**
     * Set the Authority that is expected to be returned by the
     * Domain instance being tested's authority() method.
     *
     * @return void
     *
     */
    protected function setExpectedAuthority(Authority $authority): void
    {
        $this->expectedAuthority = $authority;
    }

    /**
     * Return the Authority that is expected to be returned by the
     * Domain instance being tested's authority() method.
     *
     * @return Authority
     *
     */
    protected function expectedAuthority(): Authority
    {
        return $this->expectedAuthority;
    }

    /**
     * Test that the scheme() method returns the expected Scheme.
     *
     * @return void
     *
     * @covers Domain->scheme()
     *
     */
    public function test_scheme_returns_expected_scheme(): void
    {
        $this->assertEquals(
            $this->expectedScheme(),
            $this->domainTestInstance()->scheme(),
            $this->testFailedMessage(
               $this->domainTestInstance(),
               'scheme',
                'returns the expected Scheme'
            ),
        );
    }

    /**
     * Test that the authority() method returns the expected Authority.
     *
     * @return void
     *
     * @covers Domain->authority()
     *
     */
    public function test_authority_returns_expected_authority(): void
    {
        $this->assertEquals(
            $this->expectedAuthority(),
            $this->domainTestInstance()->authority(),
            $this->testFailedMessage(
               $this->domainTestInstance(),
               'authority',
                'returns the expected Authority'
            ),
        );
    }

    /**
     * test __toString returns the assigned Scheme concatentated with
     * the assigned Authority.
     *
     * @return void
     *
     * @covers Domain->__toString()
     *
     */
    public function test___toString_returns_Scheme_concatentated_with_Authority(): void
    {
        $this->assertEquals(
            $this->domainTestInstance()->scheme()->value . '://' . $this->domainTestInstance()->authority(),
            $this->domainTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->domainTestInstance(),
               '__toString',
                'returns the assigned Scheme concatentated with ' .
                'the assigned Authority'
            ),
        );
    }

    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

