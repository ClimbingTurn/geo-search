<?php

namespace ClimbingTurn\GeoSearch\Models;

use craft\base\Model;

class Settings extends Model
{
    public $searchRadius = "default";
    public $regionBias = "default";
    public $resultsTemplate =  "default"    ;
    public $googleAPIKey = "default"       ;
    public $enableLocalSSL =   "default"     ;
    public $developmentsSection =  "default";
    public $plotsSection = "default"       ;

    public function rules()
    {
        return array(
         'searchRadius'          => array(AttributeType::Number, 'default' => 15),
         'regionBias'            => array(AttributeType::String, 'default' => 'uk'),
         'resultsTemplate'       => array(AttributeType::String, 'default' => 'developments/residential/availability'),
         'googleAPIKey'          => array(AttributeType::String, 'default' => ''),
         'enableLocalSSL'        => array(AttributeType::Bool, 'default' => false),
         'developmentsSection'   => array(AttributeType::String, 'default' => 'residential'),
         'plotsSection'          => array(AttributeType::String, 'default' => 'plots')
       );      
    
    }
}