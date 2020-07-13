<?php
/**
 * GeoSearch plugin for Craft CMS 3.x
 *
 * Geo Location Search
 *
 * @link      https://www.climbingturn.co.uk
 * @copyright Copyright (c) 2020 ClimbingTurn
 */

namespace climbingturn\geosearch\controllers;

use climbingturn\geosearch\GeoSearch;

use Craft;
use craft\web\Controller;

/**
 * GeoSearchController Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    ClimbingTurn
 * @package   GeoSearch
 * @since     2.0.0
 */
class GeoSearchControllerController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/geo-search/geo-search-controller
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the GeoSearchControllerController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/geo-search/geo-search-controller/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the GeoSearchControllerController actionDoSomething() method';

        return $result;
    }
}
