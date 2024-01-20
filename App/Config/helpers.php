<?php

// define routes 
function url($url='')
{
    //get base URL + added in url 
    echo BURL.$url;
}

// redirect
function redirect($url)
{
    return  BURL.$url;
}