<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 02.03.2018
 * Time: 15:30
 */

namespace App;

/**
 * @param $val : value to be checked
 * @param $start : beginning of the range
 * @param $end : end of the range
 * @return bool
 */
function in_range($val, $start, $end)
{
    return floatval($start) <= floatval($val) && floatval($val) <= floatval($end);
}