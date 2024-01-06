<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\Http\Controllers\Account\AccountWelcomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::group(['middleware' => ['web', WelcomesNewUsers::class,]], function () {
    Route::get('welcome/{user}', [AccountWelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [AccountWelcomeController::class, 'savePassword']);
});

Route::middleware('web')->get('/docs', function() {
    View::addExtension('html', 'php'); // allows .html
    return view('docs.index'); // loads /public/docs/index.html
});
