<?php

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

// Route de l'accueil
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('page/{page:slug}', 'IndexController@page')->name('page');

Auth::routes(['verify' => true]);

// Route d'authentification
Route::post('deconnexion', 'Auth\LoginController@logout')->name('logout');

Route::middleware('guest')->group(function () {
    Route::prefix('connexion')->group(function () {
        Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/', 'Auth\LoginController@login');
    });
    Route::prefix('inscription')->group(function () {
        Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/', 'Auth\RegisterController@register');
        Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');
    });
});
Route::prefix('passe')->group(function () {
    Route::get('renouvellement', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('renouvellement/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('renouvellement', 'Auth\ResetPasswordController@reset')->name('password.update');
});

// Utilisateur authentifié
Route::middleware('auth')->group(function () {
  // Commandes
  Route::prefix('record')->group(function () {
      Route::resource('/', 'RecordController')->names([
          'create' => 'record.create',
          'store' => 'record.store',
      ])->only(['create', 'store']);
      
    Route::get('recordemail', 'Auth\RecordController@recordEmail')->name('recordemail.user');
  });
});


// Route pour la vue home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route d'affichage des cours
Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('formation');
Route::get('/formation/{slug}', [App\Http\Controllers\CourseController::class, 'show'])->name('formation.show');

// Lire la formation
Route::get('/formations/{slug}', [App\Http\Controllers\ShowcourseController::class, 'show'])->name('cours.show');

// Route course par Category
Route::get('category/{slug}', [App\Http\Controllers\CategoryController::class, 'showByCategory'])->name('category.show');

// Route pour l'affichage de la lesson
Route::get('lesson/{slug}', [App\Http\Controllers\LessonsController::class, 'show'])->name('lesson.show');

// Route pour l'affichage de la lesson
Route::get('/panier/{slug}', [App\Http\Controllers\CartController::class, 'index'])->name('panier.index');

//Route du panier
Route::resource('panier', 'CartController')->only(['index', 'store', 'destroy']);

// Route pour la page contacts
Route::get('contacts', [App\Http\Controllers\ContactsController::class, 'create'])->name('contacts.create');
Route::post('contacts', [App\Http\Controllers\ContactsController::class, 'store'])->name('contacts.store');

// Route pour le profile utilisateur
Route::resource('user', 'UserController');
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');

// Route de paiement
Route::get('/paiement', 'PaymentController@index')->name('checkout.index');

// Comments
// Route::post('comment/{post_id}', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
// Route::get('comment/{id}/edit', [App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');
// Route::delete('comment/{id}', [App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
// Route::put('comment/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');
// Route::get('comment/{id}/delete', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');


// Adminitration
Route::prefix('admin')->middleware('admin')->namespace('Back')->group(function () {
    Route::name('admin')->get('/', 'AdminController@index');
    Route::name('read')->put('read/{type}', 'AdminController@read');
    
    // L'école
    Route::name('school.edit')->get('school', 'SchoolController@edit');
    Route::name('school.update')->put('school', 'SchoolController@update');
    
    // Les pages
    Route::resource('pages', 'PageController');
    Route::name('pages.destroy.alert')->get('pages/{page}', 'PageController@alert');
    Route::name('pages.show')->get('pages/{slug}', 'PageController@show');

    // Les categories
    Route::resource('categories', 'CategoryController');
    Route::name('categories.destroy.alert')->get('categories/{category}', 'CategoryController@alert');
    Route::name('categories.show')->get('categories/{slug}', 'CategoryController@show');

    
    // Les formations
    Route::resource('courses', 'CourseController');
    Route::post('courses', 'CourseController@update')->name('courses.update');
    Route::post('courses', 'CourseController@store')->name('courses.store');
    Route::name('courses.destroy.alert')->get('course/{course}', 'CourseController@alert');

    // Les lessons
    Route::resource('lessons', 'LessonsController');
    Route::name('lessons.destroy.alert')->get('lessons/{lesson}', 'LessonsController@alert');
    Route::name('lessons.show')->get('lessons/{slug}', 'LessonsController@show');

    // Les utilisateurs
    Route::resource('users', 'UserController')->names([
        'index' => 'users.index',
        'show' => 'users.show',
        'create' => 'users.create'
    ])->only(['index', 'show', 'create']);


    // Les records
    Route::resource('records', 'RecordController')->only(['index', 'show', 'update'])->names([
        'index' => 'records.index',
        'show' => 'records.show',
        'update' => 'records.update',
    ]);

    // La maintenance
    Route::name('maintenance.edit')->get('maintenance/modification', 'MaintenanceController@edit');
    Route::name('maintenance.update')->put('maintenance', 'MaintenanceController@update');
    Route::name('cache.update')->put('cache', 'MaintenanceController@cache');

    // Les statistiques
    Route::name('statistics')->get('statistiques/{year}', 'StatisticsController');

    // Les permissions
    Route::resource('permission', 'PermissionController');
    Route::post('permission', 'PermissionController@update')->name('permission.update');
    Route::post('permission', 'PermissionController@store')->name('permission.store');
    Route::name('permission.destroy.alert')->get('permission/{permission}', 'PermissionController@alert');

    // Les roles
    Route::resource('role', 'RoleController');
    Route::post('role', 'RoleController@update')->name('role.update');
    Route::post('role', 'RoleController@store')->name('role.store');
    Route::name('role.destroy.alert')->get('role/{role}', 'RoleController@alert');
});