<?php

use App\Modules\Employee\Presentation\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

function digital_root($number): int
{
    $res = array_sum(str_split($number));
    if (count(str_split($res)) > 1) {
        $res = digital_root($res);
    }
    return $res;
}

function lovefunc($flower1, $flower2) {
    return $flower1 % 2 && $flower2;
}

function disemvowel($string) {
    return preg_replace("/[ae]/i", '', $string);
}

function getCount($str) {
    return preg_match_all('/[aeiou]/i', $str);
}

function centuryFromYear($year): int
{
    return ceil($year / 100);
}

function abbrevName($name)
{
    preg_match_all('/[A-Z]/', $name, $initials);
    return $initials[0][1];
}


function nbYear($p0, $percent, $aug, $p) {
    $years = 0;
    while ($p0 < $p) {
       $p0 = $p0 + $p0 * ($percent / 100) + $aug;
       $years++;
    }

    return $years;
}

function duplicateCount($text) {
    $stats = array_count_values(str_split(strtolower($text)));
    return count(array_filter($stats, function($value) {return $value > 1;} ));
}

Route::post('/department', [DepartmentController::class, 'create']);

//Route::get('/some_route', function () {
//
////    $array = [1, -1, 2, -2, 5, -5, 6, -6];
////
////    $closestZero = 9999999;
////    arsort($array);
////    reset($array);
////
////    foreach ($array as $item) {
////        if (abs($item) < $closestZero || (abs($item) === $closestZero && $item > $closestZero)) {
////            $closestZero = $item;
////        }
////    }
//
//    preg_match_all('/[a-z]/i', strtolower('The sunset sets at twelve o\' clock.'), $chars);
//
//    $num = '195';
//
//   return range('a', 'z');
//});





