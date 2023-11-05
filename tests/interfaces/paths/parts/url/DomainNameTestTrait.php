<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName;

/**
 * The DomainNameTestTrait defines common tests for
 * implementations of the DomainName interface.
 *
 * @see DomainName
 *
 */
trait DomainNameTestTrait
{

    /**
     * @var DomainName $subDomainName An instance of a
     *                                   DomainName
     *                                   implementation to
     *                                   test.
     */
    protected DomainName $subDomainName;

    /**
     * @var Name $expectedName The name that is expected to be
     *                         returned by the DomainName being
     *                         tested's name() method.
     */
    protected Name $expectedName;

    /**
     * Set up an instance of a DomainName implementation to test.
     *
     * This method must also set the DomainName implementation
     * instance to be tested via the setDomainNameTestInstance()
     * method.
     *
     * This method must also set the Name instance that is expected
     * to be returned by the DomainName being tested's name()
     * method.
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
     *     $name = new Name(new Text($this->randomChars()));
     *     $this->setExpectedName($name);
     *     $this->setDomainNameTestInstance(new DomainName($name));
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Set the Name that is expected to be returned by the
     * DomainName instance being tested's name() method.
     *
     * @return void
     *
     */
    protected function setExpectedName(Name $name): void
    {
        $filteredName = new NameInstance(
            new Text(
                str_replace('_', '-', $name->__toString())
            )
        );
        $this->expectedName = $filteredName;
    }

    /**
     * Return the Name instance that is expected to be returned by
     * the DomainName instance being tested's name() method.
     *
     * @return Name
     *
     */
    protected function expectedName(): Name
    {
        return $this->expectedName;
    }

    /**
     * Return the DomainName implementation instance to test.
     *
     * @return DomainName
     *
     */
    protected function subDomainNameTestInstance(): DomainName
    {
        return $this->subDomainName;
    }

    /**
     * Set the DomainName implementation instance to test.
     *
     * @param DomainName $subDomainNameTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the DomainName
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setDomainNameTestInstance(
        DomainName $subDomainNameTestInstance
    ): void
    {
        $this->subDomainName = $subDomainNameTestInstance;
    }

    /**
     * Test DomainName only consists of alphanumeric
     * characters (a-z), periods (.), or hyphens (-).
     *
     * @covers DomainName::__toString()
     *
     */
    public function testDomainNameOnlyConsistsOfAlphanumericCharactersPeriodsOrHyphens(): void
    {
        $validNonAlphanumericChars = ['.', '-'];
        $chars = str_split($this->subDomainNameTestInstance()->__toString());
        foreach($chars as $char) {
            $this->assertTrue(
                ctype_alnum($char) || in_array($char, $validNonAlphanumericChars),
                $this->testFailedMessage(
                   $this->subDomainNameTestInstance(),
                   '__toString',
                   'A DomainName must only consists of a ' .
                   'letters [a-z], digits [0-9], periods (.), ' .
                   'or hyphens (-)'
                ),
            );
        }
    }

    /**
     * Test name() returns the expected name.
     *
     * @covers DomainName::name()
     *
     */
    public function test_name_returns_the_expected_name(): void
    {
        $this->assertEquals(
            $this->expectedName(),
            $this->subDomainNameTestInstance()->name(),
            $this->testFailedMessage(
                $this->subDomainNameTestInstance(),
                '__toString',
                'A DomainName must only consists of a ' .
                'letters [a-z], digits [0-9], periods (.), ' .
                'or hyphens (-)'
            ),
        );
    }

    /**
     * Test __toString() returns the same string as the assigned Name's
     * __toString() method.
     *
     *
     * @covers DomainName::__toString()
     *
     */
    public function test__toString_returns_the_same_string_as_the_assigned_names__toString_method(): void
    {
        $this->assertEquals(
            $this->expectedName()->__toString(),
            $this->subDomainNameTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->subDomainNameTestInstance(),
                '__toString',
                'A DomainName must only consists of a ' .
                'letters [a-z], digits [0-9], periods (.), ' .
                'or hyphens (-)'
            ),
        );
    }
    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

