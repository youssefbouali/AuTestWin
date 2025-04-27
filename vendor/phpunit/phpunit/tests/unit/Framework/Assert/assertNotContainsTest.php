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
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\TestDox;

#[CoversMethod(Assert::class, 'assertNotContains')]
#[TestDox('assertNotContains()')]
#[Small]
final class assertNotContainsTest extends TestCase
{
    #[DataProviderExternal(assertContainsTest::class, 'failureProvider')]
    public function testSucceedsWhenConstraintEvaluatesToTrue(mixed $needle, iterable $haystack): void
    {
        $this->assertNotContains($needle, $haystack);
    }

    #[DataProviderExternal(assertContainsTest::class, 'successProvider')]
    public function testFailsWhenConstraintEvaluatesToFalse(mixed $needle, iterable $haystack): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->assertNotContains($needle, $haystack);
    }
}
