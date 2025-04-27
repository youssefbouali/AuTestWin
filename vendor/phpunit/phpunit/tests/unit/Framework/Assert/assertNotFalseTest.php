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
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\TestDox;

#[CoversMethod(Assert::class, 'assertNotFalse')]
#[TestDox('assertNotFalse()')]
#[Small]
final class assertNotFalseTest extends TestCase
{
    /**
     * @return non-empty-list<array{0: mixed}>
     */
    public static function successProvider(): array
    {
        return [
            [true],
            [null],
            [0],
            [1],
            ['false'],
        ];
    }

    #[DataProvider('successProvider')]
    public function testSucceedsWhenConstraintEvaluatesToTrue(mixed $actual): void
    {
        $this->assertNotFalse($actual);
    }

    public function testFailsWhenConstraintEvaluatesToFalse(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->assertNotFalse(false);
    }
}
