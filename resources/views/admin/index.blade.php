<!DOCTYPE html>
<html>
    <head>
        <title>Test for junior position</title>
        <style>
            body {
                margin-left: 20px;
            }
            h2 {
                margin: 0;
                padding: 0;
            }
            .device-list {
                display: inline-block;
                position: absolute;
                top: 0;
                left: 0;
                border: 5px solid black;
                padding: 10px;
                width: calc(100% - 830px);
                height: calc(100% - 30px);
            }
            .device-list li{
                margin-left: 30px;
            }
            .device-list form{
                position: absolute;
                bottom: 10px;
                left: 10px; 
            }
            .main-container {
                position: relative;
                min-height: 300px;
                margin-bottom: 30px;
                border: 5px solid blue;
            }
            .map-container {
                width:800px;
                display:inline-block;
                position:absolute;
                top: 0;
                right: 0;
                
            }
            .distance-table{
                width: 40%;
                border: 5px solid blue;
            }
            .distance-table td, .distance-table th{
                border: 2px solid black;
            }
        </style>
        {!! $map['js'] !!}
        
    </head>
    <body>
        <h1> Administration </h1>
        <div class="main-container">
            <div class="device-list">
            <h2>Added devices IDs</h2>
                @foreach ($devices as $device)
                    <li>{{ $device->device_id }}</li>
                @endforeach
                <form action="../public">
                    <input type="submit" value="Add new device" />
                </form>
            </div>
            <div class="map-container"> 
                {!! $map['html'] !!}
            </div>
        </div>
        <table class="distance-table">
            <tr>
                <th>First device</th>
                <th>Second device</th>
                <th>Distance(Km)</th>
            </tr>
            <?php 
                for($i = 0; $i < count($devices); $i++){
                    for($j = 0; $j < count($devices); $j++){
                        if($i > $j){
                            $coordinatesI = explode(',', $devices[$i]->coordinates);
                            $coordinatesJ = explode(',', $devices[$j]->coordinates);
                            $theta = $coordinatesI[1] - $coordinatesJ[1];
                            $dist = sin(deg2rad($coordinatesI[0])) * sin(deg2rad($coordinatesJ[0])) +  cos(deg2rad($coordinatesI[0])) * cos(deg2rad($coordinatesJ[0])) * cos(deg2rad($theta));
                            $dist = acos($dist);
                            $dist = rad2deg($dist);
                            $dist = $dist * 60 * 1.1515 * 1.609344;            
            ?>

            <tr>
                <td><?=$devices[$i]->device_id;?></td>
                <td><?=$devices[$j]->device_id;?></td>
                <td><?=$dist;?></td>
            </tr>

            <?php 
                        }
                    }
                }
            ?>
        </table>

        

    </body>
</html>
