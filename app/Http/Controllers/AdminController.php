<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // overridintas autorizacijos metodas tam, kad butu grazintas sugeneruotas zemelapis su zymemis
    public function index()
    {
        $config = array();
            $config['center'] = '31.4661231, 74.3162962';
            $config['zoom'] = '2';
            $config['map_height'] = '300px';
            $config['map_width'] = '800px';
            $config['geocodeCaching'] = true;
            $config['scrollwheel'] = false;
            \GMaps::initialize($config);
            
            $devices = \App\Device::all();
        
            foreach ($devices as $device) {
                $marker['position'] = $device->coordinates;
                $url =  'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . 
                    str_replace(' ', '', $device->coordinates) . 
                    '&key=AIzaSyAG77YIwcknopkVzf6eUHycdiv0k9-Wom4';
        
                $obj = json_decode(file_get_contents($url), true); 
                $formatted_address = isset($obj['results'][0]['formatted_address']) ? $obj['results'][0]['formatted_address'] : "";
                $markerContent = "Device ID: " . $device->device_id . '<br>' .
                    "Home or work: " . $device->hw_state . '<br>' .
                    $formatted_address;
                $marker['infowindow_content'] = $markerContent;
                \GMaps::add_marker($marker);
            }
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=31.4661231,74.3162962&key=AIzaSyAG77YIwcknopkVzf6eUHycdiv0k9-Wom4';
                $obj = json_decode(file_get_contents($url), true); 
            
            $map = \GMaps::create_map($config);
            
        
            return view('home', 
            [
                'devices' => $devices,
                'map'     => $map
            ]);
    }
}
