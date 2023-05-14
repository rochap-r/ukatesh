<?php

use App\Models\GenConfig;

if (!function_exists('blogInfo')) {
    function blogInfo()
    {
        return GenConfig::find(1);
    }
}
