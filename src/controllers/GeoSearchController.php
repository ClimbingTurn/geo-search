<?php
/**
 * GeoSearch plugin for Craft CMS 3.x
 *
 * Geo Location Search
 *
 * @link      https://www.climbingturn.co.uk
 * @copyright Copyright (c) 2020 ClimbingTurn
 */

namespace Climbingturn\GeoSearch\Controllers;

use Climbingturn\GeoSearch\Controllers;

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
class GeoSearchController extends Controller
{
    /**
     * 
     * Allow anonymous access to this controller
     * 
     * @var bool|array
     * 
     */
    protected $allowAnonymous = true;



    /**
     * 
     * Performs the search
     * 
     */
    public function actionSearch()
    {

        $request = craft()->request;

        if(!($location = $request->getRequiredParam('location', false)) == false) {

            $params = [
                'location' => $location,
                'minPrice' => (int)$request->getParam('min_price'),
                'maxPrice' => (int)$request->getParam('max_price'),
                'minBeds'  => (int)$request->getParam('min_beds')
            ];

            $geoSearch = new GeoSearchService();
            $developments = $geoSearch->search($params['location']);
        } else {
            $params = [
                'location' => "",
                'minPrice' => (int)$request->getParam('min_price'),
                'maxPrice' => (int)$request->getParam('max_price'),
                'minBeds'  => (int)$request->getParam('min_beds')
            ];            
            $developments = "";
        }

        $this->renderTemplate('availability/index', array('developmentResults' => $developments, 'searchParams' => $params));       
    }
}
