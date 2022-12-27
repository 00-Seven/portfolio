<?php

use App\Models\Visitor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$visitor = Visitor::where('ip',request()->ip())->first();
if($visitor) {
    $visitor->hits +=1;
    $visitor->save();
}else{
    Visitor::create([
        'ip' => request()->ip(),
        'hits' => 1
    ]);
}
Route::get('/', function () {
    $visitor = Visitor::where('ip',$_SERVER['REMOTE_ADDR'])->first();
    if($visitor) {
        $visitor->hits +=1;
        $visitor->save();
    }else{
        Visitor::create([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'hits' => 1
        ]);
    }
    return view('welcome');
});
Route::get('/home', function () {
    return 'home';
});
Route::get('/login', function () {
    return 'login';
});
