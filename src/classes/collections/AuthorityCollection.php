<?php

namespace Darling\PHPWebPaths\classes\collections;

use \Darling\PHPWebPaths\interfaces\collections\AuthorityCollection as AuthorityCollectionInterface;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;

class AuthorityCollection implements AuthorityCollectionInterface
{

    /**
     * @var array<int, Authority> $authorities The collection of
     *                                         Authority instances
     *                                         assigned to this
     *                                         AuthorityCollection.
     */
    protected array $authorities = [];

    /**
     * Instantiate a new AuthorityCollection using the specified
     * Authority instances.
     *
     * @param Authority ...$authorities The Authority instances to
     *                                  assign to this collection.
     *
     */
    public function __construct(Authority ...$authorities)
    {
        foreach($authorities as $authority) {
            $this->authorities[] = $authority;
        }
    }

    /**
     * Return an array of Authority instances.
     *
     * @return array<int, Authority>
     *
     */
    public function collection(): array
    {
        foreach($this->authorities as $auth) { var_dump($auth->__toString()); }
        return $this->authorities;
    }

}

