<?php

namespace Darling\PHPWebPaths\classes\paths;

use \Darling\PHPWebPaths\enumerations\paths\parts\url\Scheme;
use \Darling\PHPWebPaths\interfaces\paths\Domain as DomainInterface;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;

class Domain implements DomainInterface
{

    public function __construct(
        private Scheme $scheme,
        private Authority $authority
    ) {}

    public function __toString(): string
    {
        return $this->scheme()->value .
            '://' .
            $this->authority()->__toString();
    }

    public function scheme(): Scheme{
        return $this->scheme;
    }

    public function authority(): Authority
    {
        return $this->authority;
    }

}

