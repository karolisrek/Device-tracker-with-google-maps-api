<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\addedWorkDevice;
use App\Http\Controllers\Auth;


class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //////////////////////////////////////////
    //////////// Opens home page  ////////////
    //////////////////////////////////////////

    public function welcom()
    {
        return view('welcome');  
    }

    //////////////////////////////////////////
    ///////// Stores device info  ////////////
    //////////////////////////////////////////
    public function storeDevice()
    {
        $device = new \App\Device(); 
        $device->device_id = request('deviceId');
        $device->coordinates = request('coordinates');
        
        $validDateChecker = explode(',', $device->coordinates);
        if(sizeOf($validDateChecker) == 2){
            if(is_numeric($validDateChecker[0]) && is_numeric($validDateChecker[1])){
                $device->hw_state = strtolower(request('hw'));
                if($device->hw_state === 'home'){
                    $device->save();
                    return view('welcome', 
                        [
                            'added' => true,
                            'hw'    => 'h'
                        ]
                    );
                } else if($device->hw_state === 'work'){
                    $device->save();
                    \Mail::to('example@example.com')->send(new AddedWorkDevice($device));
                    return view('welcome', 
                        [
                            'added' => true,
                            'hw'      => 'w'
                        ]
                    );
                }
            } 
        }
        return view('welcome', 
            [
                'added' => false
            ]
        );   
    }
}

