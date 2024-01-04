<?php

if (!function_exists('abort_if_forbidden')) {
    function abort_if_forbidden(string $permission,$message = "You have not permission to this page!"):void
    {
        abort_if(is_null(auth()->user()) || !auth()->user()->can($permission),403,$message);
    }
}
if (!function_exists('message_set'))
{
    function message_set($message,$type,$timer = 15)
    {
        session()->put('_message',$message);
        session()->put('_type',$type);
        session()->put('_timer',$timer*1000);
    }
}

function random(){
    $input = array("dark", "warning", "success", "primary" ,"secondary ");
    $rand_keys = array_rand($input);
    echo $input[$rand_keys];
}
