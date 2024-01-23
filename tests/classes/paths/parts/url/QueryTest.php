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
        $text = new Text(
            rand(0, 1) ? '-test-query=' . $this->randomChars() . '&paramName=Param%20Value&foo[]=bar&&foo[]=baz&&bin' : ''
        );
        $this->setExpectedText($text);
        $this->setQueryTestInstance(
            new Query($text)
        );
    }

}

