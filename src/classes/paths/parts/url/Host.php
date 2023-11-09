<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Host as HostInterface;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\TopLevelDomainName;

final class Host implements HostInterface
{
    public function __construct(
        private DomainName $domainName,
        private ?TopLevelDomainName $topLevelDomainName = null,
        private ?SubDomainName $subDomainName = null,
    ) {}

    public function __toString(): string {
        return (
            is_null($this->subDomainName)
            ? ''
            : $this->subDomainName . '.'
        ) .
        $this->domainName .
        (
            is_null(
                $this->topLevelDomainName
            )
            ? ''
            : '.' . $this->topLevelDomainName
        );
    }

    public function subDomainName(): ?SubDomainName
    {
        return $this->subDomainName;
    }

    public function domainName(): DomainName
    {
        return $this->domainName;
    }

    public function topLevelDomainName(): ?TopLevelDomainName
    {
        return $this->topLevelDomainName;
    }

}

