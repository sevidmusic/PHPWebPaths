<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\Port as PortInterface;

class Port implements PortInterface
{

    /**
     * Instantiate a new Port instance that is assigned the
     * specified $portNumber.
     *
     * Note: A Port number must be between 1 and 48556.
     *       If an invalid port number is specified than
     *       the Port will be assigned the number 80.
     *
     * @param int $portNumber An integer between 1 and 48556.
     *
     */
    public function __construct(private int $portNumber) {
        if($this->portNumber < 1 || $this->portNumber > 48556) {
            $this->portNumber = 80;
        }
    }

    public function number(): int
    {
        return $this->portNumber;
    }

    public function __toString(): string
    {
        return strval($this->portNumber);
    }

}

