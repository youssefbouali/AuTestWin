<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\TestDox;

#[CoversMethod(Assert::class, 'assertJsonFileNotEqualsJsonFile')]
#[TestDox('assertJsonFileNotEqualsJsonFile()')]
#[Small]
final class assertJsonFileNotEqualsJsonFileTest extends TestCase
{
    public function testSucceedsWhenConstraintEvaluatesToTrue(): void
    {
        $this->assertJsonFileNotEqualsJsonFile(
            TEST_FILES_PATH . 'JsonData/arrayObject.json',
            TEST_FILES_PATH . 'JsonData/simpleObject.json',
        );
    }

    public function testFailsWhenConstraintEvaluatesToFalse(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->assertJsonFileNotEqualsJsonFile(
            TEST_FILES_PATH . 'JsonData/simpleObject.json',
            TEST_FILES_PATH . 'JsonData/simpleObject.json',
        );
    }
}
