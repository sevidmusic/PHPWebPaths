<?php

namespace Darling\PHPWebPaths\tests\classes\paths\parts\url;

use \Darling\PHPTextTypes\classes\collections\SafeTextCollection;
use \Darling\PHPTextTypes\classes\strings\SafeText;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPWebPaths\classes\paths\parts\url\Path;
use \Darling\PHPWebPaths\tests\PHPWebPathsTest;
use \Darling\PHPWebPaths\tests\interfaces\paths\parts\url\PathTestTrait;

class PathTest extends PHPWebPathsTest
{

    /**
     * The PathTestTrait defines common tests for implementations of
     * the Darling\PHPWebPaths\interfaces\paths\parts\url\Path
     * interface.
     *
     * @see PathTestTrait
     *
     */
    use PathTestTrait;

    public function setUp(): void
    {
        $safeTextCollection = new SafeTextCollection(
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
        );
        $this->setExpectedSafeTextCollection($safeTextCollection);
        $this->setPathTestInstance(new Path($safeTextCollection));
    }
}

