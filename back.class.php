<?php
/**
 * Created by PhpStorm.
 * User: sylvestersiani
 * Date: 25/11/2015
 * Time: 02:42
 */

class CALC{

    public $height = Null;
    public $width = Null;
    public $detail = Null;
    public $vCost = Null;
    private $labour = 2; // Float
    public $qty = null;


    /**
     *clean
     *
     * sanitize USERS data input.
     * CAN'T TRUST THE USERS INPUT.
     *
     *
     */
    private function clean($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    // Setting up important variables that will be used to calculate
    // the vinyl cost for the users
    public function set_vCost($vCost){
        $this->vCost = $this->clean($vCost);
    }
    public function setHeight($height){
        $this->height = $this->clean($height);
    }
    public function setWidth($width){
        $this->width = $this->clean($width);
    }
    public function setDetail($detail){
        $this->detail = $this->clean($detail);
    }
    public function setQty($qty){
        $this->qty = $qty;
    }

    /**
     * vCost_pc
     *
     * pc stands for production cost
     * this breaks down vinyl cost to cm Squared which will
     * in turn be used to mark up our and calculate our services.
     *
     *@return int
     *
     */
   private function vCost_pc(){
        // Breaking down the cost of vinyl from m to cm squared
       $vCost_cm_sqr = $this->vCost/5000;
        // adding our own little margin on top for now its 200%;
        $vMargin = ($vCost_cm_sqr/100)*100;
        // returning our sales cost per 1cm squared
        $vSales = $vCost_cm_sqr+$vMargin;
        return $vSales;
    }

    /**
     * calculate
     *
     * calculates the vinyl cost and returns an array of data types depending on the input
     *
     * @return int
     */
    private function calculate(){
        // takes width & height to multiply and give us size of artwork
        $size = $this->width * $this->height;
        // takes size and multiplies that with the return of vCost_pc
        $vPrice = $size * $this->vCost_pc();
        // switch statement for user detail. Need to clean up this section and add extra
        // precautions in-case the user does not input anything?
        switch ($this->detail) {
            case 'low':
                return $vPrice + 1;
                break;
            case 'medium':
                return $vPrice + 2;
                break;
            case 'high':
                return $vPrice + 3;
                break;
            default:
                continue;
        }
        return $vPrice;
    }

    /**
     *
     * @return float
     *
     * after accounting our labour cost, we add our margin to the service
     *
     */
    private function margin(){
        // studio running cost
        $rCost = $this->calculate()+$this->labour;
        // Profit margin
        $pMargin = ($rCost/100)*80;
        $total = $rCost + $pMargin;
        return $total;
    }

     public function discount($data){
        $discount = ($this->margin()/100)*$data;
        $total = $this->margin() - $discount;
        return $total;
    }

    public function output(){
        return $this->discount(0);
    }
    //
    public function __construct(){}
}




