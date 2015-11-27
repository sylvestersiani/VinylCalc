<?php

require 'back.class.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $calc = new CALC();
// set height

    // assigning post value to vars before passing it through the class objects
    $width = $_POST['width'];
    $detail = $_POST['detail'];
    $qty = $_POST['qty'];

    if(!empty($height)){
        $calc->setHeight($height);
    } else{
        $heightError = 'Enter height';
    }


    if(!empty($width)){
        $calc->setWidth($width);
    }else{
        $widthError = 'Enter width';
    }


    if(!empty($detail)){
        $calc->setDetail($detail);
    }else{
        $detailError = 'Select detail';
    }

    if(!empty($qty)){
        $calc->setQty($qty);
    }else{
        $qtyError = 'Enter Quantity';
    }

//

// set width

// selected detail

// selected quantity

// vinyl selection (create a class containing multiple vinyls & its price);
    $calc->set_vCost(8);

    if(!empty($calc->height) && !empty($calc->width) && !empty($calc->detail) && !empty($calc->qty)){

        if($calc->height < 5 || $calc->width < 5 ){
            $warning = 'minimum height is 5cm';
        } else{
            echo $calc->output();
        }
    } else{
        $warning = 'fill in entire form';
    }
} else{

}


