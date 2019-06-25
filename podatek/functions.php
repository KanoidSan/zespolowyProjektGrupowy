<?php
session_start();

function printHeaderMenu(){
    if($_SESSION["admin"] == 1){
        echo '    <div class="header">
        <div class="header-element" style="font-size: 42px; padding-top: 0px;" onclick="goHome()" >&#8962;</div>
        <div class="header-element" onclick="goTaxCalculation()">Rozlicz swój podatek</div>
        <div class="header-element" onclick="goEditProfileDetails()">Popraw swoje dane</div>
        <div class="header-element" onclick="goTaxes()">Moje podatki</div>
        <div class="header-element" onclick="goAllTaxes()">Panel Administratora</div>
        <div class="header-element-space"></div>
        <div class="header-element" onclick="logout()">Logout</div>
        </div>';
    }
    else{
        echo '    <div class="header">
        <div class="header-element" style="font-size: 42px; padding-top: 0px;" onclick="goHome()" >&#8962;</div>
        <div class="header-element" onclick="goTaxCalculation()">Rozlicz swój podatek</div>
        <div class="header-element" onclick="goEditProfileDetails()">Popraw swoje dane</div>
        <div class="header-element" onclick="goTaxes()">Moje podatki</div>
        <div class="header-element-space"></div>
        <div class="header-element-space"></div>
        <div class="header-element" onclick="logout()">Logout</div>
        </div>';
    }
}

function checkLogin(){
    if(empty($_SESSION["email"])){
        header("Location: index.php");
        return 0;
    }
}

function tax2017($val){
    if($val >= 0 && $val <= 6000){ //0 - 6000
        return 0;
    }elseif($val > 6000 && $val <= 11000){ //6000 - 11000
        $tax = 0.18 * $val;
        $x = 1188 - 661.98 * ($val-5600) / 4400;
        return (round($tax - $x, 2));
    }elseif($val > 11000 && $val <= 85528){ //11000 - 85528
        $tax = 0.18 * $val;
        $x = 556.02;
        return (round($tax - $x, 2));
    }elseif($val > 85528 && $val <= 127000){ //85528 - 127000
        $tax = 15395.04 + ($val - 85528)*0.32;
        $x = 556.02 - 556.02 * ($val - 85528) / 41472;
        return (round($tax - $x, 2));
    }elseif($val > 127000){ //127000+
        return round(15395.04 + ($val - 85528) * 0.32, 2);
    }else{  //err
        return 0;
    }
}

function tax2018($val){
    if($val >= 0 && $val <= 8000){ //0 - 8000
        return 0;
    }elseif($val > 8000 && $val <= 13000){ //8000 - 13000
        $tax = 0.18 * $val;
        $x = 1440 -  883.98 * ($val-8000) / 5000;
        return (round($tax - $x, 2));
    }elseif($val > 13000 && $val <= 85528){ //13000 - 85528
        $tax = 0.18 * $val;
        $x = 556.02;
        return (round($tax - $x, 2));
    }elseif($val > 85528 && $val <= 127000){ //85528 - 127000
        $tax = 15395.04 + ($val - 85528)*0.32;
        $x = 556.02 - 556.02 * ($val - 85528) / 41472;
        return (round($tax - $x, 2));
    }elseif($val > 127000){ //127000+
        return round(15395.04 + ($val - 85528) * 0.32, 2);
    }else{  //err
        return 0;
    }
}

function tax2019($val){
    if($val >= 0 && $val <= 8000){ //0 - 8000
        return 0;
    }elseif($val > 8000 && $val <= 13000){ //8000 - 13000
        $tax = 0.18 * $val;
        $x = 1440 -  883.98 * ($val-8000) / 5000;
        return (round($tax - $x, 2));
    }elseif($val > 13000 && $val <= 85528){ //13000 - 85528
        $tax = 0.18 * $val;
        $x = 556.02;
        return (round($tax - $x, 2));
    }elseif($val > 85528 && $val <= 127000){ //85528 - 127000
        $tax = 15395.04 + ($val - 85528)*0.32;
        $x = 556.02 - 556.02 * ($val - 85528) / 41472;
        return (round($tax - $x, 2));
    }elseif($val > 127000){ //127000+
        return round(15395.04 + ($val - 85528) * 0.32, 2);
    }else{  //err
        return 0;
    }
}

?>