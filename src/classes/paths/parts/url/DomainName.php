<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName as DomainNameInterface;

final class DomainName implements DomainNameInterface
{
    public function __construct(private Name $name) {
        $filteredName = new NameInstance(
            new Text(
                strtolower(
                    str_replace('_', '-', $name->__toString())
                )
            )
        );
        $this->name = $filteredName;
    }

    public function __toString(): string {
        return $this->name->__toString();
    }

    public function name(): Name
    {
        return $this->name;
    }
}

