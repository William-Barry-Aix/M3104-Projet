<?php
class Home
{
    public function __construct()
    {
    }

    function show(){
        require('view/frontend/homeView.php');
    }
}