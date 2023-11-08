<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Path as PathInterface;

final class Path implements PathInterface
{


    public function __construct(
        private SafeTextCollection $safeTextCollection
    ) { }

    public function safeTextCollection(): SafeTextCollection
    {
        return $this->safeTextCollection;
    }

    public function __toString(): string
    {
        $string = '';
        foreach ($this->safeTextCollection()->collection() as $safeText) {
            $string .= DIRECTORY_SEPARATOR . $safeText->__toString();
        }
        return $string;
    }
}

