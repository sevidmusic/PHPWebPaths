<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\TopLevelDomainName;

/**
 * The HostTestTrait defines common tests for implementations of the
 * Host interface.
 *
 * @see Host
 *
 */
trait HostTestTrait
{

    /**
     * @var Host $host An instance of a Host implementation to test.
     */
    protected Host $host;

    /**
     * @var SubDomainName $expectedSubDomainName The SubDomainName
     *                                           instance that is
     *                                           expected to be
     *                                           returned by the
     *                                           Host instance being
     *                                           tested's
     *                                           subDomainName()
     *                                           method.
     */
    private SubDomainName $expectedSubDomainName;

    /**
     * @var DomainName $expectedDomainName The DomainName instance
     *                                     that is expected to be
     *                                     returned by the Host
     *                                     instance being tested's
     *                                     domainName() method.
     */
    private DomainName $expectedDomainName;

    /**
     * @var TopLevelDomainName $expectedTopLevelDomainName
     *                                The TopLevelDomainName instance
     *                                that is expected to be returned
     *                                by the Host instance being
     *                                tested's topLevelDomainName()
     *                                method.
     */
    private TopLevelDomainName $expectedTopLevelDomainName;

    /**
     * Set up an instance of a Host implementation to test.
     *
     * This method must set the Host implementation instance to be
     * tested via the setHostTestInstance() method.
     *
     * This method must also set the SubDomainName instance that is
     * expected to be returned by the Host instance being tested's
     * subDomainName() method via the setExpectedSubDomainName()
     * method.
     *
     * This method must also set the DomainName instance that is
     * expected to be returned by the Host instance being tested's
     * domainName() method via the setExpectedDomainName()
     * method.
     *
     * This method must also set the TopLevelDomainName instance
     * that is expected to be returned by the Host instance
     * being tested's topLevelDomainName() method via the
     * setExpectedTopLevelDomainName() method.
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
     *     $subDomainName = new SubDomainName(new Name(new Text($this->randomChars())));
     *     $this->setExpectedSubDomainName($subDomainName);
     *     $domainName = new DomainName(new Name(new Text($this->randomChars())));
     *     $this->setExpectedDomainName($domainName);
     *     $topLevelDomainName = new TopLevelDomainName(new Name(new Text($this->randomChars())));
     *     $this->setExpectedTopLevelDomainName($topLevelDomainName);
     *     $this->setHostTestInstance(new Host($subDomainName, $domainName, $topLevelDomainName));
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Host implementation instance to test.
     *
     * @return Host
     *
     */
    protected function hostTestInstance(): Host
    {
        return $this->host;
    }

    /**
     * Set the Host implementation instance to test.
     *
     * @param Host $hostTestInstance An instance of an implementation
     *                               of the Host interface to test.
     *
     * @return void
     *
     */
    protected function setHostTestInstance(
        Host $hostTestInstance
    ): void
    {
        $this->host = $hostTestInstance;
    }

    /**
     * Set the SubDomainName that is expected to be returned by the
     * Host instance being tested's subDomainName() method.
     *
     * @param SubDomainName $subDomainName The SubDomainName instance
     *                                     that is expected to be
     *                                     returned by the Host
     *                                     instance being tested's
     *                                     subDomainName() method.

     *
     * @return void
     *
     */
    public function setExpectedSubDomainName(SubDomainName $subDomainName): void
    {
        $this->expectedSubDomainName = $subDomainName;
    }

    /**
     * Return the SubDomainName that is expected to be returned by the
     * Host instance being tested's subDomainName() method.
     *
     * @return SubDomainName
     *
     */
    public function expectedSubDomainName(): SubDomainName
    {
        return $this->expectedSubDomainName;
    }

    /**
     * Set the DomainName that is expected to be returned by the
     * Host instance being tested's domainName() method.
     *
     * @param DomainName $domainName The DomainName instance
     *                               that is expected to be
     *                               returned by the Host
     *                               instance being tested's
     *                               domainName() method.
     *
     * @return void
     *
     */
    public function setExpectedDomainName(DomainName $domainName): void
    {
        $this->expectedDomainName = $domainName;
    }

    /**
     * Return the DomainName that is expected to be returned by the
     * Host instance being tested's domainName() method.
     *
     * @return DomainName
     *
     */
    public function expectedDomainName(): DomainName
    {
        return $this->expectedDomainName;
    }

    /**
     * Set the TopLevelDomainName that is expected to be returned by the
     * Host instance being tested's topLevelDomainName() method.
     *
     * @param TopLevelDomainName $topLevelDomainName
     *                                The TopLevelDomainName instance
     *                                that is expected to be returned
     *                                by the Host instance being
     *                                tested's topLevelDomainName()
     *                                method.
     *
     * @return void
     *
     */
    public function setExpectedTopLevelDomainName(TopLevelDomainName $topLevelDomainName): void
    {
        $this->expectedTopLevelDomainName = $topLevelDomainName;
    }

    /**
     * Return the TopLevelDomainName that is expected to be returned by the
     * Host instance being tested's topLevelDomainName() method.
     *
     * @return topLevelDomainName
     *
     */
    public function expectedTopLevelDomainName(): TopLevelDomainName
    {
        return $this->expectedTopLevelDomainName;
    }

    /**
     * Test Host only consists of alphanumeric characters (a-z) and
     * (0-9), periods (.), or hyphens (-).
     *
     * @return void
     *
     * @covers Host::__toString()
     *
     */
    public function test_Host_only_consists_of_alphanumeric_characters_periods_or_hyphens(): void
    {
        $validNonAlphanumericChars = ['.', '-'];
        $chars = str_split($this->hostTestInstance()->__toString());
        foreach($chars as $char) {
            $this->assertTrue(
                ctype_alnum($char) || in_array($char, $validNonAlphanumericChars),
                $this->testFailedMessage(
                   $this->hostTestInstance(),
                   '__toString',
                   'A Host must only consists of a ' .
                   'letters [a-z], digits [0-9], periods (.), ' .
                   'or hyphens (-)'
                ),
            );
        }
    }

    /**
     * Test __toString() returns SubDomainName DomainName and
     * TopLevelDomainName concatenated with a period (.).
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test___toString_returns_SubDomainName_DomainName_and_TopLevelDomainName_concatenated_with_a_period(): void
    {
        $this->assertEquals(
            $this->hostTestInstance()->subDomainName()->__toString() .
            '.' .
            $this->hostTestInstance()->domainName()->__toString() .
            '.' .
            $this->hostTestInstance()->topLevelDomainName()->__toString(),
            $this->hostTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->hostTestInstance(),
               '__toString',
               'return a string constructed by concatinating the ' .
               'assigned SubDomainName, DomainName, and ' .
               'TopLevelDomainName with periods (.)'
            ),
        );
    }

    /**
     * Test subDomainName() returns the expected SubDomainName.
     *
     * @return void
     *
     * @covers Host->subDomainName()
     *
     */
    public function test_subDomainName_returns_expected_SubDomainName(): void
    {
        $this->assertEquals(
            $this->expectedSubDomainName(),
            $this->hostTestInstance()->subDomainName(),
            $this->testFailedMessage(
               $this->hostTestInstance(),
               '__toString',
               'return the expected SubDomainName'
            ),
        );
    }

    /**
     * Test domainName() returns the expected DomainName.
     *
     * @return void
     *
     * @covers Host->domainName()
     *
     */
    public function test_domainName_returns_expected_DomainName(): void
    {
        $this->assertEquals(
            $this->expectedDomainName(),
            $this->hostTestInstance()->domainName(),
            $this->testFailedMessage(
               $this->hostTestInstance(),
               '__toString',
               'return the expected DomainName'
            ),
        );
    }

    /**
     * Test topLevelDomainName() returns the expected
     * TopLevelDomainName.
     *
     * @return void
     *
     * @covers Host->topLevelDomainName()
     *
     */
    public function test_topLevelDomainName_returns_expected_TopLevelDomainName(): void
    {
        $this->assertEquals(
            $this->expectedTopLevelDomainName(),
            $this->hostTestInstance()->topLevelDomainName(),
            $this->testFailedMessage(
               $this->hostTestInstance(),
               '__toString',
               'return the expected TopLevelDomainName'
            ),
        );
    }

    /**
     * Test __toString() returns a string that begins with an
     * alphanumeric character.
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test___toString_returns_a_string_that_begins_with_an_alphanumeric_character(): void
    {
        $this->assertTrue(
            ctype_alnum($this->hostTestInstance()->__toString()[0]),
            $this->testFailedMessage(
               $this->hostTestInstance(),
               '__toString',
                'returns a string that begins with an alphanumeric ' .
                'character'
            ),
        );
    }

    /**
     * Test __toString() returns a string that begins with an
     * alphanumeric character.
     *
     * @return void
     *
     * @covers Host->__toString()
     *
     */
    public function test___toString_returns_a_lowercase_string(): void
    {
        $this->assertEquals(
            strtolower($this->hostTestInstance()->__toString()),
            $this->hostTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->hostTestInstance(),
               '__toString',
                'returns a lowercase string'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

