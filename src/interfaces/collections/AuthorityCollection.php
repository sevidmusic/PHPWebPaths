<?php

namespace Darling\PHPWebPaths\interfaces\collections;

use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;

/**
 * An AuthorityCollection can be used to define a collection of
 * Authority instance.
 *
 * @see Authority
 *
 */
interface AuthorityCollection
{

    /**
     * Return an array of Authority instances.
     *
     * @return array<int, Authority>
     *
     */
    public function collection(): array;

}

