<?php


// Route::get('/', function()
// {
//     return View::make('index');
// });


App::missing(function ($exception) {
    return Response::view('fb.404', array(), 404);
});

App::error(function ($exception) {
    return Redirect::to('home');
});


Route::get('testk', [
    //'as'     => 'testing',
    //'before' => 'csrf',
    'uses' => 'HomeController@showWelcome'
]);


Route::get('posts', function () {
    return 'all posts';
});


Route::filter('maxUploadFileSize', function () {
// Check if upload has exceeded max size limit
    if (!(Request::isMethod('POST') or Request::isMethod('PUT'))) {
        return;
    }
// Get the max upload size (in Mb, so convert it to bytes)
    $maxUploadSize = 1024 * 1024 * ini_get('post_max_size');
    $contentSize = 0;
    if (isset($_SERVER['HTTP_CONTENT_LENGTH'])) {
        $contentSize = $_SERVER['HTTP_CONTENT_LENGTH'];
    } elseif (isset($_SERVER['CONTENT_LENGTH'])) {
        $contentSize = $_SERVER['CONTENT_LENGTH'];
    }
// If content exceeds max size, throw an exception
    if ($contentSize > $maxUploadSize) {
        throw new GSVnet\Core\Exceptions\MaxUploadSizeException;
    }
});


Route::filter('csrf', function () {
    if (Session::getToken() != Input::get('_token')) {
        //throw new Illuminate\Session\TokenMismatchException;
        return Redirect::to('home');
    }
});


/*
Route::get('/mys', array('as'=>'authors','uses'=>'AuthorsController@showWelcome'));


Route::get('/my', array('as'=>'author','uses'=>'MyController@extraWork'));*/


// Route::get('testing', [
//         'as'     => 'testing',
//     //'before' => 'csrf',
//         'uses'   => 'MyController@testing'
//     ]);


Route::get('/my/form', [
    'as' => 'authork',
    //'before' => 'csrf',
    'uses' => 'MyController@form'
]);

Route::get('/la-admin', [
    'as' => 'la-admin',
    //'before' => 'csrf',
    'uses' => 'MyController@login'
]);


Route::get('/', [
    'as' => 'home',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@home'
]);


Route::get('home', function () {
    return Redirect::to('/');
});


Route::get('template', [
    'as' => 'template',
    //'before' => 'csrf',
    'uses' => 'ContentController@setting'
]);

Route::get('setting', [
    'as' => 'setting',
    //'before' => 'csrf',
    'uses' => 'ContentController@setting'
]);


Route::get('removetemp/{id}', [
    'as' => 'removetemp',
    //'before' => 'csrf',
    'uses' => 'ContentController@removetemp'
]);


Route::get('newsetting', [
    'as' => 'newsetting',
    //'before' => 'csrf',
    'uses' => 'ContentController@newsetting'
]);


Route::get('updatesetting', [
    'as' => 'updatesetting',
    //'before' => 'csrf',
    'uses' => 'ContentController@updatesetting'
]);


Route::get('addtemplate', [
    'as' => 'addtemplate',
    //'before' => 'csrf',
    'uses' => 'ContentController@addtemplate'
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
Route::get('fblogout', [
    'as' => 'fblogout',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@fblogout'
]);


Route::post('/my/create', array('as' => 'authorm', 'uses' => 'MyController@create'));


Route::get('/my/edit/{name}', array('as' => 'authoredit', 'uses' => 'MyController@edit'));


Route::put('/my/update', array('as' => 'authorupdate', 'uses' => 'MyController@update'));

Route::delete('/my/delete', array('as' => 'authordelete', 'uses' => 'MyController@delete'));

//Route::post('/my/login',  'AuthController@postLogin');


Route::get('/my/login', array('as' => 'logina', 'before' => 'guest', function () {
    return View::make('authors.form');
}));


Route::get('/activate/{id}', [
    'as' => 'activate',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@activate'
]);


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


Route::get('/emails', [
    'as' => 'emails',
    //'before' => 'csrf',
    'uses' => 'ContactController@emails'
]);


Route::get('/confirmmail', [
    'as' => 'confirmmail',
    //'before' => 'csrf',
    'uses' => 'ContactController@confirmmail'
]);


Route::get('/contemplate', [
    'as' => 'contemplate',
    //'before' => 'csrf',
    'uses' => 'ContactController@contemplate'
]);


Route::get('/notitemplate', [
    'as' => 'notitemplate',
    //'before' => 'csrf',
    'uses' => 'ContactController@notitemplate'
]);


Route::get('/allemail', [
    'as' => 'allemail',
    //'before' => 'csrf',
    'uses' => 'ContactController@allemail'
]);


Route::get('/mail/delete/{id}', [
    'as' => 'maildelete',
    //'before' => 'csrf',
    'uses' => 'ContactController@maildelete'
]);

Route::get('/mail/open/{id}', [
    'as' => 'mailopen',
    //'before' => 'csrf',
    'uses' => 'ContactController@mailopen'
]);


Route::get('/emails/send', [
    'as' => 'emailsend',
    //'before' => 'csrf',
    'uses' => 'ContactController@emailsend'
]);


Route::get('/confirmmail/send', [
    'as' => 'confirmmailsend',
    //'before' => 'csrf',
    'uses' => 'ContactController@confirmmailsend'
]);


Route::get('/notitemplate/send', [
    'as' => 'notitemplatesend',
    //'before' => 'csrf',
    'uses' => 'ContactController@notitemplatesend'
]);


Route::get('/contemplate/send', [
    'as' => 'contemplatesend',
    //'before' => 'csrf',
    'uses' => 'ContactController@contemplatesend'
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


Route::get('getmembers', [
    'as' => 'getmembers',
    //'before' => 'csrf',
    'uses' => 'UsersController@getmembers'
]);


Route::get('/updatereg', array('as' => 'updatereg', 'uses' => 'UsersController@updatereg'));


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

Route::get('contactform', [
    'as' => 'contactform',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@contactform'
]);


Route::get('forgetpass', [
    'as' => 'forgetpass',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@forgetpass'
]);

Route::get('accountupdate', [
    'as' => 'accountupdate',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@accountupdate'
]);


Route::get('deleteaccount', [
    'as' => 'deleteaccount',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@deleteaccount'
]);


Route::get('delaccount', [
    'as' => 'delaccount',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@delaccount'
]);


Route::get('provisiter', [
    'as' => 'provisiter',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@provisiter'
]);


Route::get('mm', [
    'as' => 'mm',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@mm'
]);


Route::get('about/{id}', [
    'as' => 'about',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@about'
]);


Route::get('block/{id}', [
    'as' => 'block',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@block'
]);


Route::get('unblock/{id}', [
    'as' => 'unblock',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@unblock'
]);


Route::get('fbsetting', [
    'as' => 'fbsetting',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@fbsetting'
]);


Route::post('/ajaxreq/{id}', [
    'as' => 'ajaxreq',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@ajaxreq'
]);


Route::get('searchusers', [
    'as' => 'searchusers',
    //'before' => 'csrf',
    'uses' => 'AuthController@searchusers'
]);


Route::post('delete/con', [
    'as' => 'deletecon',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@deletecon'
]);


Route::post('language', [
    'as' => 'language',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@chooser'
]);


// Route::get('language/{id}', [
//         'as'     => 'languages',
//     //'before' => 'csrf',
//         'uses'   => 'FrontprofileController@choosers'
//     ]);


Route::get('language/{id}', function ($id) {
    App::setLocale($id);
    Session::put('locale', $id);
    return Redirect::back();


});


Route::get('test', [
    'as' => 'test',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@test'
]);


Route::get('updateforget', [
    'as' => 'updateforget',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@updateforget'
]);


Route::get('createevent', [
    'as' => 'createevent',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@createevent'
]);

Route::get('allevent/{id}', [
    'as' => 'allevent',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@allevent'
]);


Route::get('/opnnchat/{id}', [
    'as' => 'opnnchat',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@opnnchat'
]);


Route::get('chatupdate', [
    'as' => 'chatupdate',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@chatupdate'
]);


Route::get('/eventsdelete/{id}', [
    'as' => 'eventsdelete',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@eventsdelete'
]);


Route::get('resetpass/{id}', [
    'as' => 'resetpass',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@resetpass'
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

Route::post('fbmedia/save', [
    'as' => 'mediasave',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@mediasave'
]);


Route::get('gallery', [
    'as' => 'gallery',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@gallery'
]);


Route::get('news', [
    'as' => 'news',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@news'
]);

Route::get('nextload', [
    'as' => 'nextload',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@nextload'
]);


Route::get('gallery/{id}', [
    'as' => 'othergallery',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@othergallery'
]);

Route::post('gallery/save', [
    'as' => 'gallerysave',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@gallerysave'
]);

Route::post('galleryvideo/save', [
    'as' => 'galleryvideo',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@galleryvideo'
]);


Route::get('postcomdelete/{id}', [
    'as' => 'postcomdelete',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@postcomdelete'
]);

Route::get('postdelete/{id}', [
    'as' => 'postdelete',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@postdelete'
]);


Route::get('gallerydelete/{id}', [
    'as' => 'gallerydelete',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@gallerydelete'
]);

Route::get('/commentpost/{id}', [
    'as' => 'commentpost',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@commentpost'
]);


Route::post('fbcovermedia/save', [
    'as' => 'covermediasave',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@covermediasave'
]);


Route::get('changedefault/{id}', [
    'as' => 'changedefault',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@changedefault'
]);


Route::get('changedefaults/{id}', [
    'as' => 'changedefaults',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@changedefaults'
]);


Route::post('fbpost/save', [
    'as' => 'fbpost',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@fbpost'
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
Route::get('alllanguage', [
    'as' => 'alllanguage',
    //'before' => 'csrf',
    'uses' => 'ContentController@alllanguage'
]);


Route::get('activated/{id}', [
    'as' => 'activated',
    //'before' => 'csrf',
    'uses' => 'ContentController@activated'
]);

Route::get('addlanguage/{id}', [
    'as' => 'addlanguage',
    //'before' => 'csrf',
    'uses' => 'ContentController@addlanguage'
]);


Route::post('savetemplate', [
    'as' => 'savetemplate',
    //'before' => 'csrf',
    'uses' => 'ContentController@savetemplate'
]);


Route::get('savetemplate', [
    'as' => 'savetemplates',
    //'before' => 'csrf',
    'uses' => 'AccessController@notaccess'
]);


Route::get('notaccesspage', [
    'as' => 'notaccesspage',
    //'before' => 'csrf',
    'uses' => 'PermissionController@notaccesspage'
]);


Route::get('/deletemem/{id}', [
    'as' => 'deletemem',
    //'before' => 'csrf',
    'uses' => 'ContentController@deletemem'
]);


Route::get('addplan', [
    'as' => 'addplan',
    //'before' => 'csrf',
    'uses' => 'ContentController@addplan'
]);

Route::get('/updatemem', array('as' => 'updatemem', 'uses' => 'ContentController@updatemem'));


Route::get('pagedelete/{id}', [
    'as' => 'pagedelete',
    //'before' => 'csrf',
    'uses' => 'ContentController@pagedelete'
]);

Route::get('/editmem/{id}', [
    'as' => 'editmem',
    //'before' => 'csrf',
    'uses' => 'ContentController@editmem'
]);


Route::get('pageedit/{id}', [
    'as' => 'pageedit',
    //'before' => 'csrf',
    'uses' => 'ContentController@pageedit'
]);

Route::get('pageupdate', [
    'as' => 'pageupdate',
    //'before' => 'csrf',
    'uses' => 'ContentController@pageupdate'
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


/*Route::get('site', [
        'as'     => 'site',
    //'before' => 'csrf',
        'uses'   => 'FrontController@index'
    ]);*/


Route::get('sites', [
    'as' => 'sites',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@sites'
]);

Route::get('page/{id}', [
    'as' => 'page',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@page'
]);


Route::get('profile', [
    'as' => 'profile',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@profile'
]);


Route::get('profiledetails', [
    'as' => 'profiledetails',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@profiledetails'
]);


Route::get('postupdate/{id}', [
    'as' => 'postupdate',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@postupdate'
]);


Route::get('comupdate/{id}', [
    'as' => 'comupdate',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@comupdate'
]);


Route::get('profileupdated', [
    'as' => 'profileupdated',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@profileupdated'
]);


Route::GET('/notification/{id}', [
    'as' => 'notification',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@notification'
]);

Route::GET('/notaccess', [
    'as' => 'notaccess',
    //'before' => 'csrf',
    'uses' => 'AccessController@notaccess'
]);


Route::GET('notifications', [
    'as' => 'notifications',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@notifications'
]);

Route::GET('/notificationlikes/{id}', [
    'as' => 'notificationlikes',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@notificationlikes'
]);

Route::GET('/notiread/{id}', [
    'as' => 'notiread',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@notiread'
]);


Route::GET('/rating/{id}', [
    'as' => 'rating',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@rating'
]);


Route::get('profileopen/{id}', [
    'as' => 'profileopen',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@profileopen'
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

Route::post('searching', [
    'as' => 'searching',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@searching'
]);

Route::get('advsearch', [
    'as' => 'advsearch',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@advsearch'
]);


Route::get('searching', [
    'as' => 'searching',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@searchingget'
]);


Route::get('allfriendrequest', [
    'as' => 'allfriendrequest',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@allfriendrequest'
]);


Route::get('onlineuser/{id}', [
    'as' => 'onlineuser',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@onlineuser'
]);


Route::get('messages/{id}', [
    'as' => 'messages',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@messages'
]);


Route::get('messagestore/{id}', [
    'as' => 'messagestore',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@messagestore'
]);

Route::get('messagesonline', [
    'as' => 'messagesonline',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@messagesonline'
]);


Route::get('messnotification/{id}', [
    'as' => 'messnotification',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@messnotification'
]);

Route::get('messtext/{id}', [
    'as' => 'messtext',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@messtext'
]);

Route::get('readable/{id}', [
    'as' => 'readable',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@readable'
]);


Route::get('inbox', [
    'as' => 'inbox',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@inbox'
]);


Route::get('acceptfriend', [
    'as' => 'acceptfriend',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@acceptfriend'
]);


Route::get('pendingcancel/{id}', [
    'as' => 'pendingcancel',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@pendingcancel'
]);


Route::get('friendlist', [
    'as' => 'friendlist',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@friendlist'
]);

Route::post('friendrequest', [
    'as' => 'friendrequest',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@friendrequest'
]);


Route::post('unfriendrequest', [
    'as' => 'unfriendrequest',
    //'before' => 'csrf',
    'uses' => 'FrontprofileController@unfriendrequest'
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


Route::post('logo/save', [
    'as' => 'logosave',
    //'before' => 'csrf',
    'uses' => 'OrdersController@logosave'
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


Route::get('getregistersfb', [
    'as' => 'getregistersfb',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@getregistersfb'
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

Route::get('getloginsfb', [
    'as' => 'getloginsfb',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@getloginsfb',
    'https' => true
]);


Route::get('logouts', [
    'as' => 'logouts',
    //'before' => 'csrf',
    'uses' => 'FrontuserController@logouts'
]);


Route::get('logoutsfb', [
    'as' => 'logoutsfb',
    //'before' => 'csrf',
    'uses' => 'FrontfbController@logoutsfb'
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

Route::get('searchuser', [
    'as' => 'searchuser',
    //'before' => 'csrf',
    'uses' => 'OrdersController@searchuser'
]);

Route::get('timeline', [
    'as' => 'timeline',
    //'before' => 'csrf',
    'uses' => 'OrdersController@timeline'
]);


Route::get('logo', [
    'as' => 'logo',
    //'before' => 'csrf',
    'uses' => 'OrdersController@logo'
]);


Route::get('galleryadmin', [
    'as' => 'galleryadmin',
    //'before' => 'csrf',
    'uses' => 'OrdersController@galleryadmin'
]);

Route::get('searchgallery', [
    'as' => 'searchgallery',
    //'before' => 'csrf',
    'uses' => 'OrdersController@searchgallery'
]);

Route::get('searchevent', [
    'as' => 'searchevent',
    //'before' => 'csrf',
    'uses' => 'OrdersController@searchevent'
]);


Route::get('searchtimeline', [
    'as' => 'searchtimeline',
    //'before' => 'csrf',
    'uses' => 'OrdersController@searchtimeline'
]);

Route::get('searchcontact', [
    'as' => 'searchcontact',
    //'before' => 'csrf',
    'uses' => 'OrdersController@searchcontact'
]);


Route::get('eventadmin', [
    'as' => 'eventadmin',
    //'before' => 'csrf',
    'uses' => 'OrdersController@eventadmin'
]);


Route::get('admin', [
    'as' => 'admin',
    //'before' => 'csrf',
    'uses' => 'UsersController@admin'
]);


Route::get('timelines/{id}', [
    'as' => 'timelines',
    //'before' => 'csrf',
    'uses' => 'OrdersController@timelines'
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

Route::get('pages', [
    'as' => 'pages',
    //'before' => 'csrf',
    'uses' => 'ContentController@pages'
]);

Route::get('membership', [
    'as' => 'membership',
    //'before' => 'csrf',
    'uses' => 'ContentController@membership'
]);

Route::get('createmember', [
    'as' => 'createmember',
    //'before' => 'csrf',
    'uses' => 'ContentController@createmember'
]);


Route::get('creatememberplan', [
    'as' => 'creatememberplan',
    //'before' => 'csrf',
    'uses' => 'ContentController@creatememberplan'
]);


Route::get('createpage', [
    'as' => 'createpage',
    //'before' => 'csrf',
    'uses' => 'ContentController@createpage'
]);


Route::get('pagessave', [
    'as' => 'pagessave',
    //'before' => 'csrf',
    'uses' => 'ContentController@pagessave'
]);





/*Route::get('viewcategory', [
        'as'     => 'viewcategory',
    //'before' => 'csrf',
        'uses'   => 'UsersController@viewcategory'
    ]);


*/


/*

Route::get('viewmenu', [
        'as'     => 'viewmenu',
    //'before' => 'csrf',
        'uses'   => 'UsersController@viewmenu'
    ]);

Route::get('/content/edit/{id}', [
        'as'     => 'contentedit',
    //'before' => 'csrf',
        'uses'   => 'ContentController@contentedit'
    ]);


Route::get('/category/edit/{id}', [
        'as'     => 'categoryedit',
    //'before' => 'csrf',
        'uses'   => 'UsersController@categoryedit'
    ]);


Route::get('/menu/edit/{id}', [
        'as'     => 'menuedit',
    //'before' => 'csrf',
        'uses'   => 'UsersController@menuedit'
    ]);



Route::get('/subcategory/edit/{id}', [
        'as'     => 'subcategoryedit',
    //'before' => 'csrf',
        'uses'   => 'UsersController@subcategoryedit'
    ]);

Route::get('/submenu/edit/{id}', [
        'as'     => 'submenuedit',
    //'before' => 'csrf',
        'uses'   => 'UsersController@submenuedit'
    ]);

Route::put('updatecontent', [
        'as'     => 'updatecontent',
    //'before' => 'csrf',
        'uses'   => 'ContentController@updatecontent'
    ]);

Route::put('updatecategory', [
        'as'     => 'updatecategory',
    //'before' => 'csrf',
        'uses'   => 'UsersController@updatecategory'
    ]);

Route::put('updatemenu', [
        'as'     => 'updatemenu',
    //'before' => 'csrf',
        'uses'   => 'UsersController@updatemenu'
    ]);



Route::put('updatesubcategory', [
        'as'     => 'updatesubcategory',
    //'before' => 'csrf',
        'uses'   => 'UsersController@updatesubcategory'
    ]);


Route::put('updatesubmenu', [
        'as'     => 'updatesubmenu',
    //'before' => 'csrf',
        'uses'   => 'UsersController@updatesubmenu'
    ]);
*/
/*
Route::get('specials', [
        'as'     => 'specials',
    //'before' => 'csrf',
        'uses'   => 'FrontuserController@specials'
    ]);
*/


/*Route::get('rating', [
        'as'     => 'rating',
    //'before' => 'csrf',
        'uses'   => 'FrontController@rating'
    ]);*/


/*
Route::get('chatrecord', [
        'as'     => 'chatrecord',
    //'before' => 'csrf',
        'uses'   => 'FrontController@chatrecord'
    ]);*/


// Route::get('getallrecords', [
//         'as'     => 'getallrecords',
//     //'before' => 'csrf',
//         'uses'   => 'FrontController@getallrecords'
//     ]);


// Route::get('blog', [
//         'as'     => 'blog',
//     //'before' => 'csrf',
//         'uses'   => 'FrontController@blog'
//     ]);


// Route::get('blogsingle', [
//         'as'     => 'blogsingle',
//     //'before' => 'csrf',
//         'uses'   => 'FrontController@blogsingle'
//     ]);