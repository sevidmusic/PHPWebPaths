<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\parts\url\Fragment;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\FragmentTestTrait;

class FragmentTest extends PHPWebPathsTest
{

    /**
     * The FragmentTestTrait defines common tests for implementations
     * of the Darling\PHPWebPaths\interfaces\paths\parts\url\Fragment
     * interface.
     *
     * @see FragmentTestTrait
     *
     */
    use FragmentTestTrait;

    protected function setUp(): void
    {
        $text = new Text('-test-fragment=' . $this->randomChars());
        $this->setExpectedText($text);
        $this->setFragmentTestInstance(
            new Fragment($text)
        );
    }

}

