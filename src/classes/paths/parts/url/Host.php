<?php

namespace Darling\PHPWebPaths\classes\paths\parts\url;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\DomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Host as HostInterface;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\SubDomainName;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\TopLevelDomainName;

final class Host implements HostInterface
{
    public function __construct(
        private SubDomainName $subDomainName,
        private DomainName $domainName,
        private TopLevelDomainName $topLevelDomainName,
    ) {}

    public function __toString(): string {
        return $this->subDomainName . '.' . $this->domainName . '.' . $this->topLevelDomainName;
    }

    public function subDomainName(): SubDomainName
    {
        return $this->subDomainName;
    }

    public function domainName(): DomainName
    {
        return $this->domainName;
    }

    public function topLevelDomainName(): TopLevelDomainName
    {
        return $this->topLevelDomainName;
    }

}

