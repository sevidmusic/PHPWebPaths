<?php

namespace Darling\PHPWebPaths\classes\paths;

use \Darling\PHPWebPaths\interfaces\paths\Domain;
use \Darling\PHPWebPaths\interfaces\paths\Url as UrlInterface;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Path;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Query;

class Url implements UrlInterface
{

    public function __construct(
        private Domain $domain,
        private ?Path $path = null,
        private ?Query $query = null,
        private ?Fragment $fragment = null,
    ) {}

    public function domain(): Domain
    {
        return $this->domain;
    }

    public function path(): ?Path {
        return $this->path;
    }

    public function query(): ?Query {
        return $this->query;
    }

    public function fragment(): ?Fragment {
        return $this->fragment;
    }

    public function __toString(): string
    {
        return $this->domain() .
        (
            is_null($this->path())
            ? ''
            : $this->path()->__toString()
        ) .
        (
            is_null($this->query())
            ? ''
            : '?' . $this->query()->__toString()
        ) .
        (
            is_null($this->fragment())
            ? ''
            : '#' . $this->fragment()->__toString()
        );
    }

}

