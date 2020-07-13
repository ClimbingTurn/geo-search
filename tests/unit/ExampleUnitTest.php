<?php
/**
 * GeoSearch plugin for Craft CMS 3.x
 *
 * Geo Location Search
 *
 * @link      https://www.climbingturn.co.uk
 * @copyright Copyright (c) 2020 ClimbingTurn
 */

namespace climbingturn\geosearchtests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use climbingturn\geosearch\GeoSearch;

/**
 * ExampleUnitTest
 *
 *
 * @author    ClimbingTurn
 * @package   GeoSearch
 * @since     2.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            GeoSearch::class,
            GeoSearch::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
