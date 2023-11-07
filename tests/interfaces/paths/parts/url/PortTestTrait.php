<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\Port;

/**
 * The PortTestTrait defines common tests for implementations of the
 * Port interface.
 *
 * @see Port
 *
 */
trait PortTestTrait
{

    /**
     * @var Port $port An instance of a Port implementation to test.
     */
    protected Port $port;

    /**
     * @var int $expectedPortNumber The Port number that is expected
     *                              to be assigned to the Port
     *                              instance being tested.
     */
    protected int $expectedPortNumber;

    /**
     * Set up an instance of a Port implementation to test.
     *
     * This method must set the Port implementation instance to be
     * tested via the setPortTestInstance() method.
     *
     * This method must also set the Port number that is
     * expected to assigned to the Port instance being tested
     * via the setExpectedPortNumber() method.
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
     *     $portNumber = rand(PHP_INT_MIN, PHP_INT_MAX);
     *     $this->setExpectedPortNumber($portNumber);
     *     $this->setPortTestInstance(
     *         new Port($portNumber)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Port implementation instance to test.
     *
     * @return Port
     *
     */
    protected function portTestInstance(): Port
    {
        return $this->port;
    }

    /**
     * Set the Port implementation instance to test.
     *
     * @param Port $portTestInstance An instance of an implementation
     *                               of the Port interface to test.
     *
     * @return void
     *
     */
    protected function setPortTestInstance(
        Port $portTestInstance
    ): void
    {
        $this->port = $portTestInstance;
    }

    /**
     * Set the Port number that is expected to be returned by
     * the Port instance being tested's number() method.
     *
     * @return void
     *
     */
    protected function setExpectedPortNumber(int $portNumber): void
    {
        if($portNumber > 0 && $portNumber <= 48556) {
            $this->expectedPortNumber = $portNumber;
        }
        $this->expectedPortNumber = 80;
    }

    /**
     * Return the Port number that is expected to be returned by
     * the Port instance being tested's number() method.
     *
     * @return int
     *
     */
    protected function expectedPortNumber(): int
    {
        return $this->expectedPortNumber;
    }

    /**
     * Test that the number() method returns the expected Port number.
     *
     * @return void
     *
     * @covers Port->number()
     */
    public function test_that_the_number_method_returns_the_expected_port_number(): void
    {
        $this->assertEquals(
            $this->expectedPortNumber(),
            $this->portTestInstance()->number(),
            $this->testFailedMessage(
                $this->portTestInstance(),
                'number',
                'return the expected Port number'
            ),
        );
    }

    /**
     * Test that the __toString() method returns the string value of
     * the expected Port number.
     *
     * @return void
     *
     * @covers Port->__toString()
     */
    public function test_that_the___toString_method_returns_the_string_value_of_the_expected_port_number(): void
    {
        $this->assertEquals(
            strval($this->expectedPortNumber()),
            $this->portTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->portTestInstance(),
                '__toString',
                'return the expected Port number as a string'
            ),
        );
    }

    /**
     * Test that the Port number is greater than 0.
     *
     * @return void
     *
     * @covers Port->number()
     *
     */
    public function test_port_number_is_greater_than_0(): void
    {
        $this->assertGreaterThan(
            0,
            $this->portTestInstance()->number(),
            $this->testFailedMessage(
                $this->portTestInstance(),
                'number',
                'Port number must be greater than 0'
            ),
        );
    }

    /**
     * Test that the Port number is less than 48557.
     *
     * @return void
     *
     * @covers Port->number()
     *
     */
    public function test_port_number_is_less_than_48557(): void
    {
        $this->assertLessThan(
            48557,
            $this->portTestInstance()->number(),
            $this->testFailedMessage(
                $this->portTestInstance(),
                'number',
                'Port number must be less than 48557'
            ),
        );
    }

    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertGreaterThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertLessThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

