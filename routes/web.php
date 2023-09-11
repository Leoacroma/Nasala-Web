<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryCateController;
use App\Http\Controllers\LibraryFileController;
use App\Http\Controllers\OuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicztionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrainCateController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingFileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//Front-end
Route::get('/', [Controller::class, 'home'])->name('front.home');

Route::get('/news', [Controller::class, 'news'])->name('front.news');
Route::get('/news/subnews/{id}',[Controller::class, 'subenews'])->name('front.subnews');
Route::get('/news/page/{page}', [Controller::class, 'pageNews'])->name('page.news');
Route::get('/news/searchNews/{keyword?}', [Controller::class, 'searchNews'])->name('searchNews.news');


Route::get('/work/dp1', [Controller::class, 'dp1'])->name('front.work.dp1');
Route::get('/work/dp2/{id}', [Controller::class, 'dp2Content'])->name('front.work.dp2Content');
Route::get('/work/dp3', [Controller::class, 'dp3'])->name('front.work.dp3');

Route::get('/lib', [Controller::class, 'liby'])->name('front.liby');
Route::get('/lib/sort/cate/{id}', [Controller::class, 'cateLib'])->name('sort.cate.lib');
Route::get('/lib/page/{page}', [Controller::class, 'pageLib'])->name('page.lib');
Route::get('/lib/searchLib/{keyword?}', [Controller::class, 'searchLib'])->name('searchLib.lib');

Route::get('/scholar',[Controller::class, 'scholar'])->name('front.scholar');
Route::get('/scholar/sub/{id}', [Controller::class, 'subScholar'])->name('front.subScholar');
Route::get('/scholar/page/{page}',[Controller::class, 'pageScholar'])->name('page.scholar');
Route::get('/scholar/search/{keyword?}', [Controller::class, 'searchScholar'])->name('search.scholar');


Route::get('/enroll/all', [Controller::class, 'enrollMent'])->name('front.enrollMent');

Route::get('/aboutschool/dp1', [Controller::class, 'aboutSchooldp1'])->name('front.aboutschool.dp1');
Route::get('/aboutschool/dp2', [Controller::class, 'aboutSchooldp2'])->name('front.aboutschool.dp2');
Route::get('/aboutschool/dp3', [Controller::class, 'aboutSchooldp3'])->name('front.aboutschool.dp3');
Route::get('/aboutschool/dp4', [Controller::class, 'aboutSchooldp4'])->name('front.aboutschool.dp4');
Route::get('/aboutschool/dp5', [Controller::class, 'aboutSchooldp5'])->name('front.aboutschool.dp5');
Route::get('/aboutschool/dp6', [Controller::class, 'aboutSchooldp6'])->name('front.aboutschool.dp6');
Route::get('/aboutschool/dp7', [Controller::class, 'aboutSchooldp7'])->name('front.aboutschool.dp7');
Route::get('/aboutschool/dp8', [Controller::class, 'aboutSchooldp8'])->name('front.aboutschool.dp8');



Route::get('admin/login', [OuthController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login/store', [OuthController::class, 'login'])->name('admin.login.post');
Route::get('admin/logout', [OuthController::class, 'logout'])->name('admin.logout');

//Back-end
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [Controller::class, 'dash'])->name('admin.dash');
    Route::get('/sort/{id}', [Controller::class, 'newsSortCate'])->name('admin.newsSortCate');
    Route::get('/makeMenu', [Controller::class, 'pagemake'])->name('admin.pagemake');
    // Route::get('/post', [Controller::class, 'post'])->name('admin.post');
    // Route::get('/post/cates', [Controller::class, 'postcate'])->name('admin.postcate');


    Route::prefix('api')->group(function(){
        Route::get('refresh_token', [OuthController::class, 'oauth']);
        //User
        Route::get('user/all', [UserController::class, 'index'])->name('admin.user');
        Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::patch('user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
        //Cate
        Route::get('post/cate', [CategoriesController::class, 'index'])->name('admin.postcate');
        Route::post('post/cate/store', [CategoriesController::class, 'store'])->name('admin.storecate');
        Route::get('post/cate/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.editcate');
        Route::patch('post/cate/update/{id}', [CategoriesController::class, 'update'])->name('admin.updatecate');
        Route::delete('post/cate/delete/{id}', [CategoriesController::class, 'destroy'])->name('admin.destroycate');
        //Post
        Route::get('post', [PostController::class, 'index'])->name('admin.post');
        Route::get('post/addpost', [PostController::class, 'create'])->name('admin.create');
        Route::post('post/news/store', [PostController::class, 'store'])->name('admin.store');
        Route::get('post/news/view/{id}', [PostController::class, 'show'])->name('admin.show');
        Route::get('post/news/edit/{id}', [PostController::class, 'edit'])->name('admin.edit');
        Route::patch('post/news/update/{id}', [PostController::class, 'update'])->name('admin.update');
        Route::delete('post/news/delete/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
        //Training/cate
        Route::get('training/cate',[TrainCateController::class, 'index'])->name('admin.train.cate');
        Route::post('training/cate/store', [TrainCateController::class, 'store'])->name('admin.trian.cate.store');
        Route::get('training/cate/edit/{id}', [TrainCateController::class, 'edit'])->name('admin.trian.cate.edit');
        Route::patch('training/cate/update/{id}', [TrainCateController::class, 'update'])->name('admin.trian.cate.update');
        Route::delete('training/cate/delete/{id}', [TrainCateController::class, 'destroy'])->name('admin.trian.cate.delete');
        //Training
        Route::get('training/post', [TrainingController::class, 'index'])->name('admin.train.post');
        Route::get('training/create',[TrainingController::class, 'create'])->name('admin.train.create');
        Route::get('training/edit/{id}', [TrainingController::class, 'edit'])->name('admin.train.edit');
        Route::patch('training/update/{id}', [TrainingController::class, 'update'])->name('admin.train.update');
        Route::post('training/store', [TrainingController::class, 'store'])->name('admin.train.store');
        Route::delete('training/delete/{id}', [TrainingController::class, 'destroy'])->name('admin.train.delete');
        //Train File
        Route::post('training/file/store', [TrainingFileController::class, 'store'])->name('admin.trian.file.store');
        Route::patch('training/file/update/{id}', [TrainingFileController::class, 'update'])->name('admin.trian.file.update');
        Route::delete('training/file/delete/{id}', [TrainingFileController::class, 'destroy'])->name('admin.trian.file.destroy');
        //Library/Cate
        Route::get('library/all', [LibraryCateController::class, 'index'])->name('admin.library');
        Route::post('Library/cate/store', [LibraryCateController::class, 'store'])->name('admin.lib.cate.store');
        Route::get('library/cate/edit/{id}', [LibraryCateController::class, 'edit'])->name('admin.lib.cate.edit');
        Route::patch('library/cate/update/{id}', [LibraryCateController::class, 'update'])->name('admin.lib.cate.update');
        Route::delete('library/cate/destroy/{id}', [LibraryCateController::class, 'destroy'])->name('admin.cate.lib.del');        
        //Library
        Route::post('library/file', [LibraryFileController::class, 'store'])->name('admin.lib.file');
        Route::patch('library/file/update/{id}', [LibraryFileController::class, 'update'])->name('admin.lib.update');
        Route::delete('library/file/delete/{id}', [LibraryFileController::class, 'destroy'])->name('admin.lib.file.delete');
        //Public
        Route::get('publication/all', [PublicztionController::class, 'index'])->name('admin.pub.index');
        Route::post('publication/store', [PublicztionController::class, 'store'])->name('admin.pub.store');
        Route::patch('publication/update/{id}', [PublicztionController::class, 'update'])->name('admin.pub.update');
        Route::delete('publication/delete/{id}', [PublicztionController::class, 'destroy'])->name('admin.pub.delete');
        //Register 
        Route::get('register/all', [RegisterController::class, 'index'])->name('admin.reg.index');
        Route::post('register/store', [RegisterController::class, 'store'])->name('admin.reg.store');
        Route::patch('register/update/{id}', [RegisterController::class, 'update'])->name('admin.reg.update');
        Route::delete('register/delete/{id}', [RegisterController::class, 'destroy'])->name('admin.reg.delete');
    });
});      



Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});