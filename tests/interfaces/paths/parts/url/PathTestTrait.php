<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Path;

/**
 * The PathTestTrait defines common tests for implementations of the
 * Path interface.
 *
 * @see Path
 *
 */
trait PathTestTrait
{

    /**
     * @var Path $path An instance of a Path implementation to test.
     */
    protected Path $path;


    /**
     * @var SafeTextCollection $expectedSafeTextCollection
     *                                  The SafeTextCollection
     *                                  that is expected to
     *                                  be returned by the
     *                                  Path instance being
     *                                  tested's safeTextCollection()
     *                                  method.
     */
    protected SafeTextCollection $expectedSafeTextCollection;

    /**
     * Set up an instance of a Path implementation to test.
     *
     * This method must set the Path implementation instance
     * to be tested via the setPathTestInstance() method.
     *
     * This method must also set the SafeTextCollection
     * instance that is expected to be returned by the
     * Path being tested's safeTextCollection() method
     * via the setExpectedSafeTextCollection() method.
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
     *     $safeTextCollection = new SafeTextCollection(
     *         new SafeText(new Text($this->randomChars()))
     *     );
     *     $this->setExpectedSafeTextCollection($safeTextCollection);
     *     $this->setPathTestInstance(new Path($safeTextCollection));
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Path implementation instance to test.
     *
     * @return Path
     *
     */
    protected function pathTestInstance(): Path
    {
        return $this->path;
    }

    /**
     * Set the Path implementation instance to test.
     *
     * @param Path $pathTestInstance An instance of an implementation
     *                              of the Path interface to test.
     *
     * @return void
     *
     */
    protected function setPathTestInstance(
        Path $pathTestInstance
    ): void
    {
        $this->path = $pathTestInstance;
    }

    /**
     * Set the SafeTextCollection that is expected to be returned
     * by the Path instance being tested's safeTextCollection()
     * method.
     *
     * @param SafeTextCollection $safeTextCollection
     *                                          The SafeTextCollection
     *                                          instance that is
     *                                          expected to be
     *                                          returned by the
     *                                          Path instance
     *                                          being tested's
     *                                          safeTextCollection()
     *                                          method.
     *
     * @return void
     *
     */
    protected function setExpectedSafeTextCollection(SafeTextCollection $safeTextCollection): void
    {
        $this->expectedSafeTextCollection = $safeTextCollection;
    }

    /**
     * Return the SafeTextCollection that is expected to be returned
     * by the safeTextCollection() method.
     *
     * @return SafeTextCollection
     *
     */
    protected function expectedSafeTextCollection(): SafeTextCollection
    {
        return $this->expectedSafeTextCollection;
    }

    /**
     * Return the string that is expected to be returned
     * by the Path instance being tested's __toStiring()
     * method.
     *
     * The string should be constructed by concatenating the
     * SafeText instances in the expected SafeTextCollection
     * with a DIRECTORY_SEPARATOR.
     *
     * @return string
     *
     */
    private function expectedString(): string
    {
        $string = '';
        foreach ($this->expectedSafeTextCollection()->collection() as $safeText) {
            $string .= DIRECTORY_SEPARATOR . $safeText->__toString();
        }
        return $string;
    }

    /**
     * Test that the safeTextCollection() method returns the expected
     * SafeTextCollection.
     *
     * @return void
     *
     * @covers Path->safeTextCollection()
     */
    public function test_safeTextCollection_returns_the_expected_SafeTextCollection(): void
    {
        $this->assertEquals(
            $this->expectedSafeTextCollection(),
            $this->pathTestInstance()->safeTextCollection(),
            $this->testFailedMessage(
                $this->pathTestInstance(),
                'safeTextCollection',
                'return the expected SafeTextCollection'
            ),
        );
    }

    /**
     * Test that the __toString() method returns the expected string.
     *
     * The string should be constructed by concatenating the
     * SafeText instances in the expected SafeTextCollection
     * with a DIRECTORY_SEPARATOR.
     *
     * @return void
     *
     * @covers Path->__toString()
     */
    public function test___toString_returns_the_expected_string(): void
    {
        $this->assertEquals(
            $this->expectedString(),
            $this->pathTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->pathTestInstance(),
                '__toString',
                'return the expected string'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

