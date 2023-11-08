<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\parts\url\Query;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\QueryTestTrait;

class QueryTest extends PHPWebPathsTest
{

    /**
     * The QueryTestTrait defines common tests for implementations of
     * the Darling\PHPWebPaths\interfaces\paths\parts\url\Query
     * interface.
     *
     * @see QueryTestTrait
     *
     */
    use QueryTestTrait;

    protected function setUp(): void
    {
        $text = new Text('-test-query=' . $this->randomChars());
        $this->setExpectedText($text);
        $this->setQueryTestInstance(
            new Query($text)
        );
    }

}

