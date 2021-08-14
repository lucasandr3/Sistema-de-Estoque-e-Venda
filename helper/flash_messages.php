<?php

class flash_messages
{
    function msgSuccessCreate($msg)
    {
        $_SESSION['alert_success'] = '<div class="alert alert-success mt-4" role="alert">
		<strong><i class="fa fa-check"></i> </strong>'.$msg.'</div>';
    }

    function msgDangerCreate($msg)
    {
        $_SESSION['alert_danger'] = '<div class="alert alert-danger mt-4" role="alert">
		<strong><i class="fa fa-frown"></i> </strong>'.$msg.'</div>';
    }

    function loginSuccessCreate()
    {
        $_SESSION['alert_login'] = '<audio id="login">
        <source src="<?=BASE_URL?>assets/alerts/alert9.mp3" type="audio/mpeg">
        /audio>'; 
    }

    static function success()
    {
        if (isset($_SESSION['alert_success']) && !empty($_SESSION['alert_success'])) {
            echo $_SESSION['alert_success'];
            ?><audio id="success">
			    <source src="<?=BASE_URL?>assets/alerts/alert11.mp3" type="audio/mpeg">
		    </audio> <?php
            $_SESSION['alert_success'] = '';

        }
    }

    static function danger()
    {
        if (isset($_SESSION['alert_danger']) && !empty($_SESSION['alert_danger'])) {
            echo $_SESSION['alert_danger'];
            ?><audio id="danger">
			    <source src="<?=BASE_URL?>assets/alerts/alert2.mp3" type="audio/mpeg">
		    </audio> <?php
            $_SESSION['alert_danger'] = '';
        } 
    }

    function login()
    {
        if (isset($_SESSION['alert_login']) && !empty($_SESSION['alert_login'])) {

            ?><audio id="login">
			    <source src="<?=BASE_URL?>assets/alerts/alert9.mp3" type="audio/mpeg">
            </audio> <?php
            echo $_SESSION['alert_login'] = '';
        } 
    }

}