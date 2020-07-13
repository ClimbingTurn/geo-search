<?php
/**
 * GeoSearch plugin for Craft CMS 3.x
 *
 * Geo Location Search
 *
 * @link      https://www.climbingturn.co.uk
 * @copyright Copyright (c) 2020 ClimbingTurn
 */

namespace climbingturn\geosearch\variables;

use climbingturn\geosearch\GeoSearch;

use Craft;

/**
 * GeoSearch Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.geoSearch }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    ClimbingTurn
 * @package   GeoSearch
 * @since     2.0.0
 */
class GeoSearchVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.geoSearch.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.geoSearch.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
