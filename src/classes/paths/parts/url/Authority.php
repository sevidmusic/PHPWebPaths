<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
use Darling\PHPWebPaths\classes\paths\parts\url\Host as TempHost;
use Darling\PHPWebPaths\classes\paths\parts\url\DomainName;
use Darling\PHPTextTypes\classes\strings\Name;
use Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority as AuthorityInterface;

class Authority implements AuthorityInterface
{

    public function __construct(private Host $host) {}

    public function host(): Host
    {
        return $this->host;
    }

    public function __toString(): string
    {
        return '';
    }

}

