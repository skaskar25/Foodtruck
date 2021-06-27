<?php
 require_once('food.php');
 /*class Action {
     function __construct() {
         switch ($_REQUEST['submit']){
             case 'submit':
                $fooo = new food;
              /*  $facility = $fooo->getFacility();
			    $facility = json_encode($facility,true);
			    echo '<div id="data">' . $facility . '</div>';
                
               echo 'hi';
                break;

            default:
            echo 'bye';
             break;
         }
     }
 }*/
 if(isset($_REQUEST['submit'])) {
    // $objAct = new Action;
    echo 'Submitted successfully';
 }


?>