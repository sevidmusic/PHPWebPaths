<?php

namespace Darling\PHPWebPaths\tests\enumerations\paths\parts\url;

use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;

class SchemeTest extends PHPWebPathsTest
{

    /**
     * @covers Scheme:HTTP
     */
    public function testHTTPCaseValueIs_http(): void
    {
        $this->assertEquals(
            'http',
            Scheme::HTTP->value,
            $this->testFailedMessage(
               Scheme::HTTP,
               'HTTP',
               'Scheme::HTTP value must be http'
            ),
        );
    }

    /**
     * @covers Scheme:HTTPS
     */
    public function testHTTPSCaseValueIs_https(): void
    {
        $this->assertEquals(
            'https',
            Scheme::HTTPS->value,
            $this->testFailedMessage(
               Scheme::HTTPS,
               'HTTP',
               'Scheme::HTTPS value must be https'
            ),
        );
    }

    /**
     * @covers Scheme:cases()
     */
    public function testSchemeCaseValuesOnlyConsistOfAlphanumericCharactersPlusesPeriodsOrHyphen(): void
    {
        $validNonAlphanumericChars = ['+', '.', '-'];
        foreach(Scheme::cases() as $case) {
            $chars = str_split($case->value);
            foreach($chars as $char) {
                $this->assertTrue(
                    ctype_alnum($char) || in_array($char, $validNonAlphanumericChars),
                    $this->testFailedMessage(
                       $case,
                       $case->value,
                       'A Scheme\'s value must be a lowercase string ' .
                       'that consists of a sequence of characters ' .
                       'that begins with a letter and is followed by ' .
                       'any combination of letters [a-z], ' .
                       'digits [0-9], pluses (+), periods (.), or hyphens (-).'
                    ),
                );
            }
        }
    }

    /**
     * @covers Scheme:cases()
     */
    public function testSchemeCaseValuesBeginWithAnAlphabeticalCharacter(): void
    {
        foreach(Scheme::cases() as $case) {
            $chars = str_split($case->value);
            $this->assertTrue(
                ctype_alpha($chars[0]),
                $this->testFailedMessage(
                    $case,
                    $case->value,
                    'A Scheme\'s value must be a lowercase string ' .
                    'that consists of a sequence of characters ' .
                    'that begins with a letter'
                ),
            );
        }
    }

    /**
     * @covers Scheme:cases()
     */
    public function testSchemeCaseValuesAreLowercase(): void
    {
        foreach(Scheme::cases() as $case) {
            $expected = strtolower($case->value);
            $this->assertEquals(
                $expected,
                $case->value,
                $this->testFailedMessage(
                    $case,
                    $case->value,
                    'A Scheme\'s value must be a lowercase string ',
                ),
            );
        }
    }

    /**
     * @covers Scheme:cases()
     */
    public function testSchemeCaseValuesAreNotEmpty(): void
    {
        foreach(Scheme::cases() as $case) {
            $this->assertNotEmpty(
                $case->value,
                $this->testFailedMessage(
                    $case,
                    $case->value,
                    'A Scheme\'s value must be not be empty'
                ),
            );
        }
    }
}

