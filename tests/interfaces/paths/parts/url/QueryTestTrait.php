<?php

namespace Darling\PHPWebPaths\tests\interfaces\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\interfaces\strings\Text;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Query;

/**
 * The QueryTestTrait defines common tests for implementations of the
 * Query interface.
 *
 * @see Query
 *
 */
trait QueryTestTrait
{

    /**
     * @var Query $query An instance of a Query implementation
     *                   to test.
     */
    protected Query $query;

    /**
     * @var Text $expectedText The Text that is expected to be
     *                         returned by the Query instance
     *                         being tested's text() method.
     */
    protected Text $expectedText;

    /**
     * Set up an instance of a Query implementation to test.
     *
     * This method must set the Query implementation instance
     * to be tested via the setQueryTestInstance() method.
     *
     * This method must also set the Text instance that is expected
     * to be returned by the Query instance being tested's
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
     *     $this->setQueryTestInstance(
     *         new Query($text)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the Query implementation instance to test.
     *
     * @return Query
     *
     */
    protected function queryTestInstance(): Query
    {
        return $this->query;
    }

    /**
     * Set the Query implementation instance to test.
     *
     * @param Query $queryTestInstance An instance of an
     *                                 implementation of
     *                                 the Query interface
     *                                 to test.
     *
     * @return void
     *
     */
    protected function setQueryTestInstance(
        Query $queryTestInstance
    ): void
    {
        $this->query = $queryTestInstance;
    }

    /**
     * Set the Text instance that is expected to be returned by
     * the Query instance being tested's text() method.
     *
     * A Query's Text will consist of a sequence of characters that
     * begins with an alphanumeric character and is followed by any
     * combination of letters [a-z], digits [0-9], periods (.),
     * slashes (/), percents (%), underscores (_), hyphens (-),
     * equals (=), opening brackets ([), or closing brackets ([).
     *
     * Note:
     *
     * If the Text passed specified via the $text parameter contains
     * any invalid characters they will not be present in the
     * Text instance that is assigned as the expected Text.
     *
     * This is to set the expectation that implementations of the
     * Query interface also insure that the Text instance returned by
     * their respective text() methods does not contain any characters
     * that are not valid in a Query based on the url authority
     * specification described in section 3.2 of RFC 3986:
     *
     * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
     *
     * @param Text $text The Text instance that is expected to be
     *                   returned by the Query instance being
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
         * Expect only valid Query characters as described in
         * section 3.2 of RFC 3986:
         *
         * @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2
         *
         */
        $validNonAlphaNumericCharacters = [
            '.', '/', '%', '_', '-', '=', '[', ']'
        ];
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
     * the Query instance being tested's text() method.
     *
     * A Query's Text will consist of a sequence of characters that
     * begins with an alphanumeric character and is followed by any
     * combination of letters [a-z], digits [0-9], periods (.),
     * slashes (/), percents (%), underscores (_), hyphens (-),
     * equals (=), opening brackets ([), or closing brackets ([).
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
     * A Query's Text will consist of a sequence of characters that
     * begins with an alphanumeric character and is followed by any
     * combination of letters [a-z], digits [0-9], periods (.),
     * slashes (/), percents (%), underscores (_), hyphens (-),
     * equals (=), opening brackets ([), or closing brackets ([).
     *
     * @return void
     *
     * @covers Query->text()
     */
    public function test_that_the_text_method_returns_the_expected_text(): void
    {
        $this->assertEquals(
            $this->expectedText(),
            $this->queryTestInstance()->text(),
            $this->testFailedMessage(
                $this->queryTestInstance(),
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
     * @covers Query->text()
     */
    public function test_that_the___toString_method_returns_a_string_that_is_equal_to_the_string_returned_by_the_assigned_Text_instances___toString__method(): void
    {
        $this->assertEquals(
            $this->queryTestInstance()->text()->__toString(),
            $this->queryTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->queryTestInstance(),
                'text',
                'return the expected string, which should be equal' .
                'to the string returned by the assigned Text ' .
                'instance\'s __toString() method'
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
            ctype_alnum($this->queryTestInstance()->__toString()[0]),
            $this->testFailedMessage(
               $this->queryTestInstance(),
               '__toString',
                'returns a string that begins with an alphanumeric ' .
                'character'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

