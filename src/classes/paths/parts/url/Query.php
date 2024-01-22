<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\interfaces\strings\Text;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Query as QueryInterface;

final class Query implements QueryInterface
{

    public function __construct(private Text $text) {
        $originalTextStringCharacters = str_split(
            $this->text()->__toString()
        );
        $filteredTextString = '';
        while(
            isset($originalTextStringCharacters[0])
            &&
            !ctype_alnum($originalTextStringCharacters[0])
        ) {
            array_shift($originalTextStringCharacters);
        }
        $validNonAlphaNumericCharacters = [
            "'",
            '-',
            '.',
            '_',
            '~',
            '!',
            '#',
            '$',
            '&',
            '(',
            ')',
            '*',
            '+',
            ',',
            '/',
            ':',
            ';',
            '=',
            '?',
            '@',
            '[',
            ']',
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
        $this->text = new TextInstance($filteredTextString);
    }

    public function __toString(): string
    {
        return $this->text()->__toString();
    }

    public function text(): Text
    {
        return $this->text;
    }
}

