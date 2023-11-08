<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\interfaces\strings\Text;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment;

/**
 * The FragmentTestTrait defines common tests for implementations of
 * the Fragment interface.
 *
 * @see Fragment
 *
 */
trait FragmentTestTrait
{

    /**
     * @var Fragment $fragment An instance of a Fragment
     *                         implementation to test.
     */
    protected Fragment $fragment;

    /**
     * @var Text $expectedText The Text that is expected to be
     *                         returned by the Fragment instance
     *                         being tested's text() method.
     */
    protected Text $expectedText;

    /**
     * Set up an instance of a Fragment implementation to test.
     *
     * This method must set the Fragment implementation instance
     * to be tested via the setFragmentTestInstance() method.
     *
     * This method must also set the Text instance that is expected
     * to be returned by the Fragment instance being tested's
     * text() method via the setExpectedText() method.
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
     *     $text = new Text($this->randomChars());
     *     $this->setExpectedText($text);
     *     $this->setFragmentTestInstance(
     *         new Fragment($text)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Fragment implementation instance to test.
     *
     * @return Fragment
     *
     */
    protected function fragmentTestInstance(): Fragment
    {
        return $this->fragment;
    }

    /**
     * Set the Fragment implementation instance to test.
     *
     * @param Fragment $fragmentTestInstance An instance of an
     *                                       implementation of
     *                                       the Fragment interface
     *                                       to test.
     *
     * @return void
     *
     */
    protected function setFragmentTestInstance(
        Fragment $fragmentTestInstance
    ): void
    {
        $this->fragment = $fragmentTestInstance;
    }

    /**
     * Set the Text instance that is expected to be returned by
     * the Fragment instance being tested's text() method.
     *
     * A Fragment's Text will consist of a sequence of characters
     * that begins with an alphanumeric character and is followed by
     * any combination of letters [a-z], digits [0-9], periods (.),
     * percents (%), underscores (_), hyphens (-), or equals (=).
     *
     * Note:
     *
     * If the Text passed specified via the $text parameter contains
     * any invalid characters they will not be present in the
     * Text instance that is assigned as the expected Text.
     *
     * This is to set the expectation that implementations of the
     * Fragment interface also insure that the Text instance
     * returned by their respective text() methods does not contain
     * any characters that are not valid in a Fragment based on the
     * url authority specification described in section 3.2 of
     * RFC 3986:
     *
     * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
     *
     * @param Text $text The Text instance that is expected to be
     *                   returned by the Fragment instance being
     *                   tested's text() method.
     *
     * @return void
     *
     */
    protected function setExpectedText(Text $text): void
    {
        $originalTextStringCharacters = str_split($text->__toString());
        $filteredTextString = '';
        /** Expect first character to be alphanumeric */
        while(!ctype_alnum($originalTextStringCharacters[0])) {
            array_shift($originalTextStringCharacters);
        }
        /**
         * Expect only valid Fragment characters as described in
         * section 3.2 of RFC 3986:
         *
         * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
         *
         */
        $validNonAlphaNumericCharacters = ['.', '%', '_', '-', '=',];
        foreach($originalTextStringCharacters as $character) {
            if(
                ctype_alnum($character)
                ||
                in_array($character, $validNonAlphaNumericCharacters)
            ) {
                $filteredTextString .= $character;
            }
        }
        $this->expectedText = new TextInstance($filteredTextString);
    }

    /**
     * Return the Text instance that is expected to be returned by
     * the Fragment instance being tested's text() method.
     *
     * A Fragment's Text will consist of a sequence of characters
     * that begins with an alphanumeric character and is followed by
     * any combination of letters [a-z], digits [0-9], periods (.),
     * percents (%), underscores (_), hyphens (-), or equals (=).
     *
     * @return Text
     *
     */
    protected function expectedText(): Text
    {
        return $this->expectedText;
    }

    /**
     * Test that the text() method returns the expected text.
     *
     * A Fragment's Text will consist of a sequence of characters
     * that begins with an alphanumeric character and is followed by
     * any combination of letters [a-z], digits [0-9], periods (.),
     * percents (%), underscores (_), hyphens (-), or equals (=).
     *
     * @return void
     *
     * @covers Fragment->text()
     */
    public function test_that_the_text_method_returns_the_expected_text(): void
    {
        $this->assertEquals(
            $this->expectedText(),
            $this->fragmentTestInstance()->text(),
            $this->testFailedMessage(
                $this->fragmentTestInstance(),
                'text',
                'return the expected Text'
            ),
        );
    }

    /**
     * Test that the __toString() method returns a string that is
     * equal to the string returned by the assigned Text intsance's
     * __toString() method.
     *
     * @return void
     *
     * @covers Fragment->text()
     */
    public function test_that_the___toString_method_returns_a_string_that_is_equal_to_the_string_returned_by_the_assigned_Text_instances___toString__method(): void
    {
        $this->assertEquals(
            $this->fragmentTestInstance()->text()->__toString(),
            $this->fragmentTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->fragmentTestInstance(),
                'text',
                'return the expected string, which should be equal' .
                'to the string returned by the assigned Text ' .
                'instance\'s __toString() method'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

