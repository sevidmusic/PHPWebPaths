<?php

namespace Darling\PHPWebPaths\tests\interfaces\collections;

use \Darling\PHPWebPaths\interfaces\collections\AuthorityCollection;
use \Darling\PHPWebPaths\interfaces\paths\parts\url\Authority;

/**
 * The AuthorityCollectionTestTrait defines common tests for
 * implementations of the AuthorityCollection interface.
 *
 * @see AuthorityCollection
 *
 */
trait AuthorityCollectionTestTrait
{

    /**
     * @var AuthorityCollection $authorityCollection
     *                              An instance of a
     *                              AuthorityCollection
     *                              implementation to test.
     */
    protected AuthorityCollection $authorityCollection;


    /**
     * @var array<int, Authority> $expectedCollection
     *                                          The array of Authority
     *                                          instances that is
     *                                          expected to be
     *                                          returned by the
     *                                          AuthorityCollection
     *                                          instance being
     *                                          tested's collection()
     *                                          method.
     */
    private array $expectedCollection = [];

    /**
     * Set up an instance of a AuthorityCollection implementation to test.
     *
     * This method must also set the AuthorityCollection implementation instance
     * to be tested via the setAuthorityCollectionTestInstance() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $this->setAuthorityCollectionTestInstance(
     *         new \Darling\PHPWebPaths\classes\collections\AuthorityCollection()
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the AuthorityCollection implementation instance to test.
     *
     * @return AuthorityCollection
     *
     */
    protected function authorityCollectionTestInstance(): AuthorityCollection
    {
        return $this->authorityCollection;
    }

    /**
     * Set the AuthorityCollection implementation instance to test.
     *
     * @param AuthorityCollection $authorityCollectionTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the AuthorityCollection
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setAuthorityCollectionTestInstance(
        AuthorityCollection $authorityCollectionTestInstance
    ): void
    {
        $this->authorityCollection = $authorityCollectionTestInstance;
    }

    /**
     * Set the array of Authority instances that is expected to be
     * returned by the AuthorityCollection instance being tested's
     * collection() method.
     *
     * @param array<int, Authority> $collection
     *
     * @return void
     *
     */
    protected function setExpectedCollection(array $collection): void
    {
        $this->expectedCollection = $collection;
    }

    /**
     * Return the array of Authority instances that is expected to be
     * returned by the AuthorityCollection instance being tested's
     * collection() method.
     *
     * @return array<int, Authority>
     *
     */
    protected function expectedCollection(): array
    {
        return $this->expectedCollection;
    }

    /**
     * Test collection() returns the expected array of Authority instances.
     *
     * @return void
     *
     * @covers AuthorityCollection->collection()
     *
     */
    public function test_collection_returns_the_expected_array_of_Authority_instances(): void
    {
        $this->assertEquals(
            $this->expectedCollection(),
            $this->authorityCollectionTestInstance()->collection(),
            $this->testFailedMessage(
                $this->authorityCollectionTestInstance(),
                'collection',
                'return the expected array of Authority instances'
            ),
        );
    }

    abstract protected static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $object, string $method, string $message): string;
}

