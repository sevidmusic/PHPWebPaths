<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use Darling\PHPWebPaths\interfaces\paths\parts\url\Host;
use Darling\PHPWebPaths\interfaces\paths\parts\url\Port;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority as AuthorityInterface;

class Authority implements AuthorityInterface
{

    public function __construct(
        private Host $host,
        private ?Port $port = null
    ) {}

    public function host(): Host
    {
        return $this->host;
    }

    public function port(): ?Port
    {
        return $this->port;
    }

    public function __toString(): string
    {
        return $this->host()->__toString() .
            (
                is_null($this->port())
                ? ''
                : ':' . $this->port()->__toString()
            );
    }

}

