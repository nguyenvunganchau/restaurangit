<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthCustomerController;
use App\Http\Controllers\CategoryFood\CategoryFoodController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Example\ExampleController;
use App\Http\Controllers\Facility\FacilityController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\New\NewController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Table\TableController;
use App\Http\Controllers\Table\TableItemController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Statistical\StatisticalController;
use App\Modules\CategoryFood\Models\CategoryFood;
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

Route::get('/', function () {
    return redirect()->route('show_home.index');
});
Route::get('/example', [ExampleController::class, 'example'])->name('example');
//auth admin
Route::prefix('auth_admin')->group(function () {
    Route::get('/show_login', [AuthController::class, 'show_login_admin'])->name('show_login.index');
    Route::post('/login', [AuthController::class, 'login_admin'])->name('login.post');
});
//auth customer
Route::prefix('auth_customer')->group(function () {
    Route::get('/show_login', [AuthCustomerController::class, 'show_login_customer'])->name('show_login_customer.index');
    Route::get('/show_register', [AuthCustomerController::class, 'show_register_customer'])->name('show_register_customer.index');
    Route::get('/logout_customer', [AuthCustomerController::class, 'logout_customer'])->name('logout_customer.post');
    Route::post('/login', [AuthCustomerController::class, 'login_customer'])->name('login_customer.post');
    Route::post('/register_customer', [AuthCustomerController::class, 'register_customer'])->name('register_customer.post');
});
//customer
Route::prefix('customer')->group(function () {

    Route::get('/show_about_us', [CustomerController::class, 'show_about_us'])->name('show_about_us.index');
    Route::get('/show_booking/{table_type_id}', [CustomerController::class, 'show_booking_customer'])->name('show_booking.index');
    Route::get('/show_book', [CustomerController::class, 'show_book'])->name('show_book.index');
    Route::get('/show_contact', [CustomerController::class, 'show_contact'])->name('show_contact.index');
    Route::post('/create_contact', [CustomerController::class, 'create_contact'])->name('create_contact.index');
    Route::get('/show_history_reservation', [CustomerController::class, 'show_history_reservation'])->name('show_history_reservation.index')->middleware('auth:customer');
    Route::get('/show_home', [CustomerController::class, 'show_home'])->name('show_home.index');
    Route::get('/show_offer', [CustomerController::class, 'show_offer'])->name('show_offer.index');
    Route::get('/show-category/{category_id}', [CustomerController::class, 'show_category'])->name('show_category.index');
    Route::get('/show_news', [CustomerController::class, 'show_news'])->name('show_news.index');
    Route::get('/show_detail_news/{new_id}', [CustomerController::class, 'show_detail_news'])->name('show_detail_news.index');
    Route::get('/show_our_restaurant', [CustomerController::class, 'show_our_restaurant'])->name('show_our_restaurant.index');
    Route::get('/show_detail_table_type/{table_type_id}', [CustomerController::class, 'show_detail_table_type'])->name('show_detail_table_type.index');
    Route::get('/show_our_table', [CustomerController::class, 'show_our_table'])->name('show_our_table.index');

    Route::post('/create_comment/{id?}', [CustomerController::class, 'create_comment'])->name('create_comment');
    Route::delete('/comment_delete/{comment_id}', [CustomerController::class, 'comment_delete'])->name('comment_delete');

    Route::post('/book_table', [CustomerController::class, 'book_table'])->name('book_table.post');
    Route::post('/book_table_customer', [CustomerController::class, 'book_table_customer'])->name('book_table_customer.post')->middleware('auth:customer');
    Route::post('/create_message', [MessageController::class, 'create_message'])->name('create_message.post');

    Route::get('profile/{customer_id}', [CustomerController::class, 'profile'])->name('show_profile.index');
    Route::post('/update/profile/{customer_id}', [CustomerController::class, 'update_profile'])->name('update_profile');
});
//admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'show_index_admin'])->name('show_index_admin.index');
    Route::get('logout', [AuthController::class, 'logout_admin'])->name('logout.admin');

    Route::get('show_list_statistical', [StatisticalController::class, 'show_list_statistical'])->name('show_list_statistical.index');
    Route::post('/statistical', [StatisticalController::class, 'month'])->name('show_list_statistical.post');
    //role
    Route::prefix('role')->group(function () {
        //show
        Route::get('/show_create_role', [RoleController::class, 'show_create_role'])->name('show_create_role.index');
        Route::get('/show_list_role', [RoleController::class, 'show_list_role'])->name('show_list_role.index');
        //action
        Route::post('/create_role', [RoleController::class, 'create_role'])->name('create_role.post');
        Route::get('/edit_role/{id}', [RoleController::class, 'edit_role'])->name('edit_role.get');
        Route::post('/update_role/{id}', [RoleController::class, 'update_role'])->name('update_role.post');
        Route::get('/delete_role/{role_id}', [RoleController::class, 'destroy'])->name('role.delete');
    });
    //message
    Route::prefix('message')->group(function () {
        //show
        Route::get('/show_list_message', [MessageController::class, 'show_list_message'])->name('show_list_message.index');

        //action
        Route::get('/edit_message/{id}', [MessageController::class, 'edit_message'])->name('edit_message.get');
        Route::post('/update_message/{id}', [MessageController::class, 'update_message'])->name('update_message.post');
    });
    //employee
    Route::prefix('employee')->group(function () {
        //show
        Route::get('/show_create_employee', [UserController::class, 'show_create_employee'])->name('show_create_employee.index');
        Route::get('/show_list_employee', [UserController::class, 'show_list_employee'])->name('show_list_employee.index');
        //action
        Route::post('/create_employee', [UserController::class, 'create_employee'])->name('create_employee.post');
        Route::get('/edit_employee/{id}', [UserController::class, 'edit_employee'])->name('edit_employee.get');
        Route::post('/update_employee/{id}', [UserController::class, 'update_employee'])->name('update_employee.post');
        Route::get('/delete_employee/{employee_id}', [UserController::class, 'destroy'])->name('employee.delete');
    });
    //customer
    Route::prefix('customer')->group(function () {
        //show
        Route::get('/show_list_customer', [CustomerController::class, 'show_list_customer'])->name('show_list_customer.index');
        Route::get('/show_history_customer/{customer_id}', [CustomerController::class, 'show_history_customer'])->name('show_history_customer.index');
        //action
        Route::get('/delete_customer/{customer_id}', [CustomerController::class, 'destroy'])->name('customer.delete');
        Route::get('/edit_customer/{id}', [CustomerController::class, 'edit_customer'])->name('edit_customer.get');
        Route::post('/update_customer/{id}', [CustomerController::class, 'update_customer'])->name('update_customer.post');
    });
    //facility
    Route::prefix('facility')->group(function () {
        ////show
        Route::get('/show_create_facility', [FacilityController::class, 'show_create_facility'])->name('show_create_facility.index');
        Route::get('/show_list_facility', [FacilityController::class, 'show_list_facility'])->name('show_list_facility.index');
        //action
        Route::post('/create_facility', [FacilityController::class, 'create_facility'])->name('create_facility.post');
        Route::get('/delete_facility/{facility_id}', [FacilityController::class, 'destroy'])->name('facility.delete');
        Route::get('/edit_facility/{id}', [FacilityController::class, 'edit_facility'])->name('edit_facility.get');
        Route::post('/update_facility/{id}', [FacilityController::class, 'update_facility'])->name('update_facility.post');
    });
    //category_food
    Route::prefix('category_food')->group(function () {
        //show
        Route::get('/show_create_category_food', [CategoryFoodController::class, 'show_create_category_food'])->name('show_create_category_food.index');
        Route::get('/show_list_category_food', [CategoryFoodController::class, 'show_list_category_food'])->name('show_list_category_food.index');
        //action
        Route::post('/create_category_food', [CategoryFoodController::class, 'create_category_food'])->name('create_category_food.post');
        Route::get('/edit_category_food/{id}', [CategoryFoodController::class, 'edit_category_food'])->name('edit_category_food.get');
        Route::post('/update_category_food/{id}', [CategoryFoodController::class, 'update_category_food'])->name('update_category_food.post');
        Route::get('/delete_category_food/{category_food_id}', [CategoryFoodController::class, 'destroy'])->name('category_food.delete');
    });
    //menu
    Route::prefix('menu')->group(function () {
        //show
        Route::get('/show_create_menu', [MenuController::class, 'show_create_menu'])->name('show_create_menu.index');
        Route::get('/show_edit_menu/{menu_id}', [MenuController::class, 'show_edit_menu'])->name('show_edit_menu.index');
        Route::get('/show_list_menu', [MenuController::class, 'show_list_menu'])->name('show_list_menu.index');
        //action
        Route::post('/create_menu', [MenuController::class, 'create_menu'])->name('create_menu.post');
        Route::get('/edit_menu/{id}', [MenuController::class, 'edit_menu'])->name('edit_menu.get');
        Route::post('/update_menu/{id}', [MenuController::class, 'update_menu'])->name('update_menu.post');
        Route::get('/delete_menu/{menu_id}', [MenuController::class, 'destroy'])->name('menu.delete');
    });
    //new
    Route::prefix('new')->group(function () {
        //show
        Route::get('/show_create_new', [NewController::class, 'show_create_new'])->name('show_create_new.index');
        Route::get('/show_edit_new/{new_id}', [NewController::class, 'show_edit_new'])->name('show_edit_new.index');
        Route::get('/show_list_new', [NewController::class, 'show_list_new'])->name('show_list_new.index');
        //action
        Route::post('/create_new', [NewController::class, 'create_new'])->name('create_new.post');
        Route::get('/edit_new/{id}', [NewController::class, 'edit_new'])->name('edit_new.get');
        Route::post('/update_new/{id}', [NewController::class, 'update_new'])->name('update_new.post');
        Route::get('/delete_new/{new_id}', [NewController::class, 'destroy'])->name('new.delete');
    });
    //order
    Route::prefix('order')->group(function () {
        ////show
        Route::get('/show_create_order', [OrderController::class, 'show_create_order'])->name('show_create_order.index');
        Route::get('/show_list_order', [OrderController::class, 'show_list_order'])->name('show_list_order.index');
        Route::get('/show_update_order/{order_id}', [OrderController::class, 'show_update_order'])->name('show_update_order.index');
        //action
        Route::post('/create_order', [OrderController::class, 'create_order'])->name('create_order.post');
        Route::get('/delete_order/{order_id}', [OrderController::class, 'destroy'])->name('order.delete');
        Route::post('/update_order/{order_id}', [OrderController::class, 'update_order'])->name('update_order.post');
        Route::get('pdf/{order_id}', [OrderController::class, 'pdf'])->name('pdf.get');
    });
    //reservation
    Route::prefix('reservation')->group(function () {
        ///show
        Route::get('/show_create_reservation', [ReservationController::class, 'show_create_reservation'])->name('show_create_reservation.index');
        Route::get('/show_list_reservation', [ReservationController::class, 'show_list_reservation'])->name('show_list_reservation.index');
        Route::get('/show_update_reservation/{reservation_id}', [ReservationController::class, 'show_update_reservation'])->name('show_update_reservation.index');
        //action
        Route::get('/delete_reservation/{reservation_id}', [ReservationController::class, 'destroy'])->name('reservation.delete');
        Route::post('/update_reservation/{reservation_id}', [ReservationController::class, 'update_reservation'])->name('update_reservation.post');
        Route::post('/filterReservations', [ReservationController::class, 'filterReservations'])->name('filterReservations.post');
    });
    //table_type loại bàn
    Route::prefix('table_type')->group(function () {
        //show
        Route::get('/show_create_table_type', [TableController::class, 'show_create_table_type'])->name('show_create_table_type.index');
        Route::get('/show_list_table_type', [TableController::class, 'show_list_table_type'])->name('show_list_table_type.index');
        //action
        Route::post('/create_table_type', [TableController::class, 'create_table_type'])->name('create_table_type.post');
        Route::post('/countTable_type', [TableController::class, 'count_table_type'])->name('count_table_type.post');
        Route::get('/delete_table_type/{table_type_id}', [TableController::class, 'destroy'])->name('table_type.delete');
        Route::get('/edit_table_type/{id}', [TableController::class, 'edit_table_type'])->name('edit_table_type.get');
        Route::post('/update_table_type/{id}', [TableController::class, 'update_table_type'])->name('update_table_type.post');
    });
    //tableItem bàn 
    Route::prefix('tableItem')->group(function () {
        //show
        Route::get('/show_create_table', [TableItemController::class, 'show_create_table'])->name('show_create_table.index');
        Route::get('/show_list_table', [TableItemController::class, 'show_list_table'])->name('show_list_table.index');
        //action
        Route::post('/create_table', [TableItemController::class, 'create_table'])->name('create_table.post');
        Route::post('/check_table', [TableItemController::class, 'check_table'])->name('check_table.post');
        Route::get('/delete_table/{table_id}', [TableItemController::class, 'destroy'])->name('table.delete');
    });
    //bình luận theo loại bàn
    Route::prefix('comment')->group(function () {
        //show
        Route::get('/show_list_comment', [CommentController::class, 'show_list_comment'])->name('show_list_comment.index');

        //action
        Route::get('/edit_comment/{id}', [CommentController::class, 'edit_comment'])->name('edit_comment.get');
        Route::get('/delete_comment/{comment_id}', [CommentController::class, 'destroy'])->name('comment.delete');
    });
});
