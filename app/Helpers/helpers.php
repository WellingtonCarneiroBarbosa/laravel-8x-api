<?php

use App\API\Methods\Responses\APIResponse;

/**
 * API Responser
 *
 * @return APIResponse
 */
function apiResponser(): APIResponse
{
    return new APIResponse;
}

/**
 * Encode array from latin1 to utf8 recursively
 * @param $dat
 * @return array|string
 */
function convert_from_latin1_to_utf8_recursively($dat)
{
    if (is_string($dat)) {
        return utf8_encode($dat);
    } elseif (is_array($dat)) {
        $ret = [];
        foreach ($dat as $i => $d) $ret[ $i ] = convert_from_latin1_to_utf8_recursively($d);

        return $ret;
    } elseif (is_object($dat)) {
        foreach ($dat as $i => $d) $dat->$i = convert_from_latin1_to_utf8_recursively($d);

        return $dat;
    } else {
        return $dat;
    }
}

/**
 * Checks if an string has special char
 *
 * @param string $x
 * @param array $excludes
 * @return boolean
 */
function str_has_special_char(string $x, array $excludes=[]):bool
{
    if (is_array($excludes)&&!empty($excludes)) {
        foreach ($excludes as $exclude) {
            $x=str_replace($exclude,'',$x);        
        }    
    }    
    if (preg_match('/[^a-z0-9 ]+/i',$x)) {
        return true;        
    }
    return false;
}

/**
 * Gets the user timezone
 *
 * @return string
 */
function user_timezone(): string
{
    if(config('app.user_timezone')) {
        return config('app.user_timezone');
    } else {
        return config('app.timezone');
    }
}

/**
 * Create a new carbon date with timezone
 *
 * @param mixed $value
 * @return \Carbon\Carbon
 */
function datetime_timezone_mutator($value): \Carbon\Carbon
{
    return (new \Carbon\Carbon($value, 'UTC'))->setTimezone(config('app.user_timezone'));
}