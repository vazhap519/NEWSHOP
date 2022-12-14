<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
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


Route::get('/' ,\App\Http\Livewire\HomeComponent::class)->name('home.index');

Route::get('/shop' ,\App\Http\Livewire\ShopComponent::class)->name('shop');

Route::get('/product/{slug}',\App\Http\Livewire\DetailsComponent::class)->name('product.details');

Route::get('/cart' ,\App\Http\Livewire\CartComponent::class)->name('shop.cart');

Route::get('/checkout' ,\App\Http\Livewire\ChechoutComponent::class)->name('shop.checkout');
Route::get('/product-category/{slug}',\App\Http\Livewire\CategoryComponent::class)->name('product.category');
Route::get('/srch',\App\Http\Livewire\SrchComponent::class)->name('search');
Route::get('/wishlist',\App\Http\Livewire\WishlistComponent::class)->name('wishlist');


Route::middleware(['auth'])->group(function (){
    Route::get('/user/dashboard',\App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth','authAdmin'])->group(function (){
    Route::get('/admin/dashboard',\App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',\App\Http\Livewire\Admin\AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/add/category',\App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.add.category');
    Route::get('/admin/category/edit/{category_id}',\App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products',\App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add',\App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.products.add');
    Route::get('/admin/products/edit/{product_id}',\App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.products.edit');
    Route::get('/admin/slider/',\App\Http\Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('/admin/slider/add',\App\Http\Livewire\Admin\AdminAddHomeSliderComponent::class)->name('admin.home.slider.add');
    Route::get('/admin/slider/edit/{slide_id}',\App\Http\Livewire\Admin\AdminEditHomeSliderComponent::class)->name('admin.home.slider.edit');
Route::get('/admin/categories-with-images',\App\Http\Livewire\Admin\AdminCategoriesWithImagesComponent::class)->name('admin.categories.with.images');

Route::get('/admin/features',\App\Http\Livewire\Admin\AdminFeaturesBrandsComponent::class)->name('admin.brends');
Route::get('/admin/features/add',\App\Http\Livewire\Admin\AdminAddFeaturesBrandsComponent::class)->name('admin.brads.add');

});



require __DIR__.'/auth.php';
