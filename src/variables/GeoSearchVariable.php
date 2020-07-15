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

use Craft;
use Climbingturn\GeoSearch\GeoSearchPlugin;

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

    /**
     * 
     * @var array
     * 
     */
    private $settings;



    public function __construct()
    {
      //   $this->settings = \Craft()->plugins->getPlugin('geo-search')->getSettings();
      $this->settings = GeoSearchPlugin::getInstance()->getSettings();
    }



    /**
     * 
     * Returns the search radius
     * 
     * @return float
     * 
     */
    public function getSearchRadius()
    {
        return $this->settings['searchRadius'];
    }



    /**
     * 
     * Returns the template name used for the search results
     * 
     * @return string
     * 
     */
    public function getResultsTemplate()
    {
        return $this->settings['resultsTemplate'];
    }



    /**
     * 
     * Returns the template name used for the search results
     * 
     * @return string
     * 
     */
    public function getGoogleAPIKey()
    {
        return $this->settings['googleAPIKey'];
    }



    /**
     * 
     * Is there a requirement for a local SSL certificate?
     * 
     * @return bool
     * 
     */
    public function getEnableLocalSSL()
    {
        return $this->settings['enableLocalSSL'];
    }



    /**
     * 
     * If Region Bias is supplied it influences the Geocode search
     * to return results biased to a particluar region. This 
     * parameter is ccTLD (Country Code Top Level Domain)
     * such as "uk"
     * 
     * @link https://developers.google.com/maps/documentation/geocoding/intro#RegionCodes
     * 
     * @return string
     * 
     */
    public function getRregionBias()
    {
        return $this->settings['regionBias'];
    }



    /**
     * 
     * @return string
     * 
     */
    public function getDevelopmentsSection()
    {
        return $this->settings['developmentsSection'];
    }



    /**
     * 
     * @return string
     * 
     */
    public function getPlotsSection()
    {
        return $this->settings['plotsSection'];
    }

}
