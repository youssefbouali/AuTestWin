--TEST--
phpunit --uses PHPUnit\TestFixture\AttributeBasedFiltering\Foo
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--debug';
$_SERVER['argv'][] = '--uses';
$_SERVER['argv'][] = \PHPUnit\TestFixture\AttributeBasedFiltering\Foo::class . ',stdClass';
$_SERVER['argv'][] = __DIR__ . '/../../_files/attribute-based-filtering';

require_once __DIR__ . '/../../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit Started (PHPUnit %s using %s)
Test Runner Triggered Warning (Using comma-separated values with --uses is deprecated and will no longer work in PHPUnit 12. You can use --uses multiple times instead.)
Test Runner Configured
Event Facade Sealed
Test Suite Loaded (5 tests)
Test Runner Started
Test Suite Sorted
Test Suite Filtered (1 test)
Test Runner Execution Started (1 test)
Test Suite Started (CLI Arguments, 1 test)
Test Suite Started (PHPUnit\TestFixture\AttributeBasedFiltering\UsesTest, 1 test)
Test Preparation Started (PHPUnit\TestFixture\AttributeBasedFiltering\UsesTest::testOne)
Test Prepared (PHPUnit\TestFixture\AttributeBasedFiltering\UsesTest::testOne)
Test Passed (PHPUnit\TestFixture\AttributeBasedFiltering\UsesTest::testOne)
Test Finished (PHPUnit\TestFixture\AttributeBasedFiltering\UsesTest::testOne)
Test Suite Finished (PHPUnit\TestFixture\AttributeBasedFiltering\UsesTest, 1 test)
Test Suite Finished (CLI Arguments, 1 test)
Test Runner Execution Finished
Test Runner Finished
PHPUnit Finished (Shell Exit Code: 1)
