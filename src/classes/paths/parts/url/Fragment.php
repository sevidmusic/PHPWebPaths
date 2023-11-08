<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\interfaces\strings\Text;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment as FragmentInterface;

final class Fragment implements FragmentInterface
{

    public function __construct(private Text $text) {
        $originalTextStringCharacters = str_split(
            $this->text()->__toString()
        );
        $filteredTextString = '';
        /** Make sure first character to be alphanumeric */
        while(!ctype_alnum($originalTextStringCharacters[0])) {
            array_shift($originalTextStringCharacters);
        }
        /**
         * Make sure only valid Fragment characters are used. These
         * characters are described in section 3.2 of RFC 3986:
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

