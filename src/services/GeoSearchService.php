<?php

namespace climbingturn\geosearch\services;

use yii\base\Component;
use craft\elements\Entry;

use climbingturn\geosearch\GeoSearchPlugin;

/**
 * This is the class that makes the API calls
 */
class GeoSearchService extends Component {
    


    /**
     * 
     * @var array
     * 
     */
    private $settings;


    public function __construct()
    {
        $this->settings = GeoSearchPlugin::getInstance()->getSettings();
    }




    /**craft()->plugins->getPlugin('geo-search')->getSettings();
     * 
     * Performs the search by locating developments within the 
     * search radius of the location searched for.
     * 
     * @param string $location
     * 
     * @return array
     * 
     */
    public function search($location)
    {
        // look up the location using Google and get the lat and lng
        $apiKey = $this->settings['googleAPIKey'];

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . rawurlencode($location) . '&key=' . $apiKey . '&region=uk';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if( ! $this->settings['enableLocalSSL']) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
       
        $resp = json_decode(curl_exec($ch), true);

        if (array_key_exists('error_message', $resp) && $resp['error_message']) {
            return 'Google returned an error: ' . $resp['error_message'];
        }

        if($resp['status'] != 'OK') {
            return 'The status received from Google was ' . $resp['status'];
        } else {
            $searchLocation = $resp['results'][0]['geometry']['location'];
            $searchSection = $this->settings['developmentsSection'];

            // search through the developments entries for lat/lng within our radius
            $criteria = Entry::find()
            ->section($searchSection)
            ->all();
            $searchRadius = $this->settings['searchRadius'];
            $relevantDevelopments = [];
            
            $locationmatch = strtolower($location);
            
            foreach ($criteria as $entry) {
                $developmentLat = $entry->ethermap->lat;
                $developmentLng = $entry->ethermap->lng;
                
                $distance = (((acos(sin(( $searchLocation['lat'] * pi() / 180)) * sin(( $developmentLat * pi() / 180))
                + cos(( $searchLocation['lat'] * pi() / 180)) * cos(($developmentLat * pi()/180))
                * cos((( $searchLocation['lng'] - $developmentLng) * pi()/180)))) * 180/pi()) * 60 * 1.1515);
                
                if(($distance <= $searchRadius) || (strpos(strtolower($entry->title), $locationmatch) !== false)) {
                    $relevantDevelopments[] = ['entry' => $entry, 'distance' => $distance];
                }
            }
            
            // now sort them so taht the closest developments are first in the list
            usort($relevantDevelopments, function($a, $b) {
                return $a['distance'] < $b['distance'] ? -1 : 1;
            });
            
            
            // copy the sorted entries into an array for use in the template
            $developments = [];
            foreach($relevantDevelopments as $dev) {
                array_push($developments, $dev['entry']);
            }

            return $developments;

        }

    }

}