<?php


Route::get('/', function () {
    return View::make('index');
});


Route::filter('csrf', function () {
    if (Session::getToken() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});


Route::get('/mys', array('as' => 'authors', 'uses' => 'AuthorsController@showWelcome'));


Route::get('/my', array('as' => 'author', 'uses' => 'MyController@extraWork'));


Route::get('/my/form', [
    'as' => 'authork',
    //'before' => 'csrf',
    'uses' => 'MyController@form'
]);

Route::get('login', [
    'as' => 'login',
    //'before' => 'csrf',
    'uses' => 'MyController@login'
]);

Route::get('register', [
    'as' => 'register',
    //'before' => 'csrf',
    'uses' => 'MyController@register'
]);

Route::get('getregister', [
    'as' => 'getregister',
    //'before' => 'csrf',
    'uses' => 'MyController@getregister'
]);


Route::get('getlogin', [
    'as' => 'getlogin',
    //'before' => 'csrf',
    'uses' => 'MyController@getlogin'
]);
Route::get('cancel', [
    'as' => 'cancel',
    //'before' => 'csrf',
    'uses' => 'MyController@form'
]);
Route::get('logout', [
    'as' => 'logout',
    //'before' => 'csrf',
    'uses' => 'MyController@logout'
]);


Route::post('/my/create', array('as' => 'authorm', 'uses' => 'MyController@create'));


Route::get('/my/edit/{name}', array('as' => 'authoredit', 'uses' => 'MyController@edit'));


Route::put('/my/update', array('as' => 'authorupdate', 'uses' => 'MyController@update'));

Route::delete('/my/delete', array('as' => 'authordelete', 'uses' => 'MyController@delete'));

//Route::post('/my/login',  'AuthController@postLogin');


Route::get('/my/login', array('as' => 'login', 'before' => 'guest', function () {
    return View::make('authors.form');
}));


Route::get('users', [
    'as' => 'users',
    //'before' => 'csrf',
    'uses' => 'UsersController@users'
]);


Route::get('dashboard', [
    'as' => 'dashboard',
    //'before' => 'csrf',
    'uses' => 'UsersController@dashboard'
]);


Route::get('category', [
    'as' => 'category',
    //'before' => 'csrf',
    'uses' => 'UsersController@category'
]);


Route::get('menu', [
    'as' => 'menu',
    //'before' => 'csrf',
    'uses' => 'UsersController@menu'
]);


Route::get('/delete/{id}', [
    'as' => 'delete',
    //'before' => 'csrf',
    'uses' => 'UsersController@delete'
]);

Route::get('/contact/delete/{id}', [
    'as' => 'contactdelete',
    //'before' => 'csrf',
    'uses' => 'ContactController@contactdelete'
]);


Route::get('/comment/delete/{id}', [
    'as' => 'commentdelete',
    //'before' => 'csrf',
    'uses' => 'UsersController@commentdelete'
]);


Route::get('/category/delete/{id}', [
    'as' => 'categorydelete',
    //'before' => 'csrf',
    'uses' => 'UsersController@categorydelete'
]);

Route::get('/menu/delete/{id}', [
    'as' => 'menudelete',
    //'before' => 'csrf',
    'uses' => 'UsersController@menudelete'
]);


Route::get('/subcategory/delete/{id}', [
    'as' => 'subcategorydelete',
    //'before' => 'csrf',
    'uses' => 'UsersController@subcategorydelete'
]);


Route::get('/submenu/delete/{id}', [
    'as' => 'submenudelete',
    //'before' => 'csrf',
    'uses' => 'UsersController@submenudelete'
]);

Route::get('/content/delete/{id}', [
    'as' => 'contentdelete',
    //'before' => 'csrf',
    'uses' => 'UsersController@contentdelete'
]);


Route::get('/edit/{id}', [
    'as' => 'edit',
    //'before' => 'csrf',
    'uses' => 'UsersController@edit'
]);

Route::get('/contact/edit/{id}', [
    'as' => 'contactedit',
    //'before' => 'csrf',
    'uses' => 'UsersController@contactedit'
]);

Route::get('/comment/edit/{id}', [
    'as' => 'commentedit',
    //'before' => 'csrf',
    'uses' => 'UsersController@commentedit'
]);


Route::get('adduser', [
    'as' => 'adduser',
    //'before' => 'csrf',
    'uses' => 'UsersController@adduser'
]);

Route::get('getregisterss', [
    'as' => 'getregisters',
    //'before' => 'csrf',
    'uses' => 'UsersController@getregisterss'
]);


Route::put('/updatereg', array('as' => 'updatereg', 'uses' => 'UsersController@updatereg'));


Route::put('/updatecon', array('as' => 'updatecon', 'uses' => 'ContactController@updatecon'));

Route::put('/updatecomment', array('as' => 'updatecomment', 'uses' => 'UsersController@updatecomment'));

Route::get('cancels', [
    'as' => 'cancels',
    //'before' => 'csrf',
    'uses' => 'UsersController@users'
]);

Route::get('contact', [
    'as' => 'contact',
    //'before' => 'csrf',
    'uses' => 'ContactController@contact'
]);

Route::get('contact/savecontact', [
    'as' => 'savecontact',
    //'before' => 'csrf',
    'uses' => 'ContactController@savecontact'
]);


Route::get('viewcontact', [
    'as' => 'viewcontact',
    //'before' => 'csrf',
    'uses' => 'UsersController@viewcontact'
]);


Route::get('media', [
    'as' => 'media',
    //'before' => 'csrf',
    'uses' => 'MediaController@media'
]);

Route::post('media/save', [
    'as' => 'mediasave',
    //'before' => 'csrf',
    'uses' => 'MediaController@mediasave'
]);


Route::get('viewmedia', [
    'as' => 'viewmedia',
    //'before' => 'csrf',
    'uses' => 'MediaController@viewmedia'
]);

Route::get('/viewmedia/delete/{id}', [
    'as' => 'deletemedia',
    //'before' => 'csrf',
    'uses' => 'MediaController@deletemedia'
]);

Route::get('/viewmedia/editmedia/{id}', [
    'as' => 'editmedia',
    //'before' => 'csrf',
    'uses' => 'MediaController@editmedia'
]);

Route::post('viewmedia/updatemedia', [
    'as' => 'updatemedia',
    //'before' => 'csrf',
    'uses' => 'MediaController@updatemedia'
]);


Route::get('eventadd', [
    'as' => 'eventadd',
    //'before' => 'csrf',
    'uses' => 'EventController@eventadd'
]);


Route::get('blogadd', [
    'as' => 'blogadd',
    //'before' => 'csrf',
    'uses' => 'EventController@blogadd'
]);


Route::post('/eventadd/save', [
    'as' => 'eventaddsave',
    //'before' => 'csrf',
    'uses' => 'EventController@eventaddsave'
]);

Route::post('/blogadd/save', [
    'as' => 'blogaddsave',
    //'before' => 'csrf',
    'uses' => 'EventController@blogaddsave'
]);

Route::get('/viewevent', [
    'as' => 'viewevent',
    //'before' => 'csrf',
    'uses' => 'EventController@viewevent'
]);


Route::get('/viewblog', [
    'as' => 'viewblog',
    //'before' => 'csrf',
    'uses' => 'EventController@viewblog'
]);

Route::get('/viewevent/delete/{id}', [
    'as' => 'deleteevent',
    //'before' => 'csrf',
    'uses' => 'EventController@deleteevent'
]);

Route::get('/viewblog/delete/{id}', [
    'as' => 'deleteblog',
    //'before' => 'csrf',
    'uses' => 'EventController@deleteblog'
]);


Route::get('/viewevent/editevent/{id}', [
    'as' => 'editevent',
    //'before' => 'csrf',
    'uses' => 'EventController@editevent'
]);

Route::post('viewevent/updateevent', [
    'as' => 'updatemedia',
    //'before' => 'csrf',
    'uses' => 'EventController@updatemedia'
]);

Route::get('contentadd', [
    'as' => 'contentadd',
    //'before' => 'csrf',
    'uses' => 'ContentController@contentadd'
]);

Route::get('/category/subcategory/{id}', [
    'as' => 'subcategory',
    //'before' => 'csrf',
    'uses' => 'UsersController@subcategory'
]);


Route::get('/menu/submenu/{id}', [
    'as' => 'submenu',
    //'before' => 'csrf',
    'uses' => 'UsersController@submenu'
]);


Route::get('viewcontent', [
    'as' => 'viewcontent',
    //'before' => 'csrf',
    'uses' => 'ContentController@viewcontent'
]);


Route::get('viewcomment', [
    'as' => 'viewcomment',
    //'before' => 'csrf',
    'uses' => 'UsersController@viewcomment'
]);


// LIVE--------------------------------------------->


Route::get('site', [
    'as' => 'site',
    //'before' => 'csrf',
    'uses' => 'FrontController@index'
]);


Route::get('details/{id}', [
    'as' => 'details',
    //'before' => 'csrf',
    'uses' => 'FrontController@details'
]);


//------------------------------------------------------------

//Add to cart


Route::get('details/addtocart/{id}', [
    'as' => 'addtocart',
    //'before' => 'csrf',
    'uses' => 'FrontController@addtocart'
]);

/*
Route::get('find', function(){
    $input = Input::get('make');
  echo $input; exit(1);
    $maker = Direccion::find($input);
    $models = $maker->departamento();
    return Response::eloquent($models->get(array('id','nombre')));
});

*/
Route::get('/find', [
    'as' => 'find',
    //'before' => 'csrf',
    'uses' => 'FrontController@find'
]);


Route::get('/search', [
    'as' => 'search',
    //'before' => 'csrf',
    'uses' => 'FrontController@search'
]);

Route::get('/brand/{id}', [
    'as' => 'brand',
    //'before' => 'csrf',
    'uses' => 'FrontController@brand'
]);


Route::get('/pricerange', [
    'as' => 'pricerange',
    //'before' => 'csrf',
    'uses' => 'FrontController@pricerange'
]);


Route::get('slider', [
    'as' => 'slider',
    //'before' => 'csrf',
    'uses' => 'MediaController@slider'
]);

Route::post('slider/save', [
    'as' => 'slidersave',
    //'before' => 'csrf',
    'uses' => 'MediaController@slidersave'
]);


Route::get('viewslider', [
    'as' => 'viewslider',
    //'before' => 'csrf',
    'uses' => 'MediaController@viewslider'
]);


Route::get('content/contentsave', [
    'as' => 'contentsave',
    //'before' => 'csrf',
    'uses' => 'ContentController@contentsave'
]);


Route::get('category/categorysave', [
    'as' => 'categorysave',
    //'before' => 'csrf',
    'uses' => 'UsersController@categorysave'
]);


Route::get('menu/menusave', [
    'as' => 'menusave',
    //'before' => 'csrf',
    'uses' => 'UsersController@menusave'
]);


Route::get('category/subcategorysave', [
    'as' => 'subcategorysave',
    //'before' => 'csrf',
    'uses' => 'UsersController@subcategorysave'
]);

Route::get('menu/submenusave', [
    'as' => 'submenusave',
    //'before' => 'csrf',
    'uses' => 'UsersController@submenusave'
]);


Route::get('payment', 'PaymentController@Index');
Route::get('payment/execute', 'PaymentController@ExecutePaymentSuccess');
Route::get('payment/cancel', 'PaymentController@ExecutePaymentCancel');


Route::get('checkout', [
    'as' => 'checkout',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@checkout'
]);


Route::get('/shopping/delete/{id}', [
    'as' => 'shoppingdelete',
    //'before' => 'csrf',
    'uses' => 'FrontController@shoppingdelete'
]);


Route::get('/paypal/delete/{id}', [
    'as' => 'paypaldelete',
    //'before' => 'csrf',
    'uses' => 'FrontController@paypaldelete'
]);


Route::get('details/comment/{id}', [
    'as' => 'comment',
    //'before' => 'csrf',
    'uses' => 'FrontController@comment'
]);


Route::get('comment/save', [
    'as' => 'commentsave',
    //'before' => 'csrf',
    'uses' => 'FrontController@commentsave'
]);


Route::get('/signup', [
    'as' => 'signup',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@signup'
]);


Route::get('getregisters', [
    'as' => 'getregisters',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@getregisters'
]);


Route::get('logins', [
    'as' => 'logins',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@logins'
]);


Route::get('getlogins', [
    'as' => 'getlogins',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@getlogins'
]);

Route::get('logouts', [
    'as' => 'logouts',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@logouts'
]);


Route::get('loginfirst', [
    'as' => 'loginfirst',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@loginfirst'
]);


Route::get('vieworders', [
    'as' => 'vieworders',
    //'before' => 'csrf',
    'uses' => 'OrdersController@vieworders'
]);


Route::get('/orders/delete/{id}', [
    'as' => 'ordersdelete',
    //'before' => 'csrf',
    'uses' => 'OrdersController@ordersdelete'
]);


Route::get('settings', [
    'as' => 'settings',
    //'before' => 'csrf',
    'uses' => 'UsersController@settings'
]);


Route::get('settings/change', [
    'as' => 'settingschange',
    //'before' => 'csrf',
    'uses' => 'UsersController@settingschange'
]);


Route::get('myaccount', [
    'as' => 'myaccount',
    //'before' => 'csrf',
    'uses' => 'MyaccountController@myaccount'
]);


Route::get('myaccount/save', [
    'as' => 'myaccountsave',
    //'before' => 'csrf',
    'uses' => 'MyaccountController@myaccountsave'
]);

Route::get('viewpages', [
    'as' => 'viewpages',
    //'before' => 'csrf',
    'uses' => 'ContentController@viewpages'
]);

Route::get('viewcategory', [
    'as' => 'viewcategory',
    //'before' => 'csrf',
    'uses' => 'UsersController@viewcategory'
]);


Route::get('viewmenu', [
    'as' => 'viewmenu',
    //'before' => 'csrf',
    'uses' => 'UsersController@viewmenu'
]);

Route::get('/content/edit/{id}', [
    'as' => 'contentedit',
    //'before' => 'csrf',
    'uses' => 'ContentController@contentedit'
]);


Route::get('/category/edit/{id}', [
    'as' => 'categoryedit',
    //'before' => 'csrf',
    'uses' => 'UsersController@categoryedit'
]);


Route::get('/menu/edit/{id}', [
    'as' => 'menuedit',
    //'before' => 'csrf',
    'uses' => 'UsersController@menuedit'
]);


Route::get('/subcategory/edit/{id}', [
    'as' => 'subcategoryedit',
    //'before' => 'csrf',
    'uses' => 'UsersController@subcategoryedit'
]);

Route::get('/submenu/edit/{id}', [
    'as' => 'submenuedit',
    //'before' => 'csrf',
    'uses' => 'UsersController@submenuedit'
]);

Route::put('updatecontent', [
    'as' => 'updatecontent',
    //'before' => 'csrf',
    'uses' => 'ContentController@updatecontent'
]);

Route::put('updatecategory', [
    'as' => 'updatecategory',
    //'before' => 'csrf',
    'uses' => 'UsersController@updatecategory'
]);

Route::put('updatemenu', [
    'as' => 'updatemenu',
    //'before' => 'csrf',
    'uses' => 'UsersController@updatemenu'
]);


Route::put('updatesubcategory', [
    'as' => 'updatesubcategory',
    //'before' => 'csrf',
    'uses' => 'UsersController@updatesubcategory'
]);


Route::put('updatesubmenu', [
    'as' => 'updatesubmenu',
    //'before' => 'csrf',
    'uses' => 'UsersController@updatesubmenu'
]);


Route::get('specials', [
    'as' => 'specials',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@specials'
]);


Route::get('rating', [
    'as' => 'rating',
    //'before' => 'csrf',
    'uses' => 'FrontController@rating'
]);


Route::get('chatrecord', [
    'as' => 'chatrecord',
    //'before' => 'csrf',
    'uses' => 'FrontController@chatrecord'
]);

Route::get('getallrecords', [
    'as' => 'getallrecords',
    //'before' => 'csrf',
    'uses' => 'FrontController@getallrecords'
]);


Route::get('blog', [
    'as' => 'blog',
    //'before' => 'csrf',
    'uses' => 'FrontController@blog'
]);


Route::get('blogsingle', [
    'as' => 'blogsingle',
    //'before' => 'csrf',
    'uses' => 'FrontController@blogsingle'
]);