<?php

if (! function_exists('meta_title')) {
    
    /** 
     * This method is used for getting meta title
     * 
     * @param  string  $title
     */
    function meta_title($title = 'Add Title')
    {
        return Str::limit($title, 60, '...');
    }
}

if (! function_exists('meta_description')) {
    
    /**
     * This method is used for getting meta description
     * 
     * @param  string  $body
     */
    function meta_description($body = 'Add Description')
    {
        return  Str::limit(strip_tags($body), 156, '...');
    }
}

if (! function_exists('meta_url')) {
    
    /**
     * This method is used for getting meta url
     * 
     * @param  string  $url
     */
    function meta_url($url = '')
    {
        return url()->full();
    }
}