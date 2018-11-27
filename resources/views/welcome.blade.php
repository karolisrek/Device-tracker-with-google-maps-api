<!DOCTYPE html>
<html>
    <head>
        <title>Test for junior position</title>

        
    </head>
    <body>
        <h1> Enter your device information </h1>
    
        <form method="POST" action="">
        {{ csrf_field() }}
            Device id:<br>
            <input type="text" name="deviceId">
            <br>
            Coordinates:<br>
            <input type="text" name="coordinates">
            <br>
            Home or work:<br>
            <input type="radio" name="hw" value="home" checked>home<br>
            <input type="radio" name="hw" value="work">work<br> 
            <br><br>
            <button type="submit">Send</button>
        </form> 

        <?php
            if(isset($added)) {
                if($added) {
                    if($hw == 'h'){
        ?>
                        <div> 
                            <h5>congratulations, your home device has been added to the database</h5>
                        </div>
        <?php
                    } else if ($hw == 'w') {
        ?>
                        <div> 
                            <h5>congratulations, your work device has been added to the database</h5>
                        </div>
        <?php
                    }
                } else {
        ?>
                    <div> 
                        <h5>Sorry, we could not add your device, please make sure you inserted all parameters correctly</h5>
                    </div>
        <?php
                }
            }
        ?>

    </body>
</html>
