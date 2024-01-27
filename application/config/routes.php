<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'HomeController/index';
$route['404_override'] = 'homeController/pnf';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'HomeController/index';

// hand arts
$route['hand-made-art'] = 'HandArtController/index';
$route['hand-made-art-details/(:any)'] = 'HandArtController/viewHandArtDetails/$1';
$route['view-shop'] = 'ShopController/index';
$route['view-event'] = 'EventController/index';
$route['view-painting'] = 'HandArtController/viewPainting';
$route['painting-details/(:any)'] = 'HandArtController/viewPaintingDetails/$1';

$route['view-contact'] = 'ContactController/index';
$route['view-blog'] = 'BlogController/index';
$route['view-blog-detail'] = 'BlogController/viewBlogDetails';
$route['artist'] = 'HomeController/artist';
$route['artist-details/(:any)'] = 'HomeController/artistdetails/$1';
$route['art-details/(:any)'] = 'HomeController/artdetails/$1';

$route['view-about'] = 'AboutController/index';

$route['artist-login'] = 'ArtistController/login';
$route['artistlogin'] = 'ArtistController/artistlogin';
$route['artistlogout'] = 'ArtistController/artistlogout';
$route['newregister'] = 'ArtistController/newregister';
$route['artist-register'] = 'ArtistController/artistregister';
$route['artist-panel/dashboard'] = 'ArtistController';
$route['artist-panel/view-profile'] = 'ArtistController/viewprofile';
$route['artist-panel/edit-profile'] = 'ArtistController/editprofile';
$route['artist-panel/view-all-arts'] = 'ArtistController/viewallarts';
$route['artist-panel/add-art'] = 'ArtistController/addart';
$route['artist-panel/my-subscription'] = 'ArtistController/mysubscription';
$route['artist-panel/subscription-history'] = 'ArtistController/subscriptionhistory';
$route['artist-panel/event-list'] = 'ArtistController/eventlist';
$route['artist-panel/add-event'] = 'ArtistController/addevent';
$route['artist-panel/events-payments'] = 'ArtistController/eventspayments';

//================== Admin =====================
$route['administrator'] = 'AdminController';
$route['administrator/login'] = 'AdminController';
$route['administratorlogin'] = 'AdminController/administratorlogin';
$route['administratorlogout'] = 'AdminController/adminlogout';
$route['administrator/dashboard'] = 'AdminController/dashboard';
$route['administrator/artist-list'] = 'AdminController/artistlist';
$route['administrator/artist-detail/(:any)'] = 'AdminController/artistdetail/$1';
$route['administrator/list-arts'] = 'AdminController/listarts';

// banner
$route['administrator/banner-list'] = 'BannerController/ViewBannerList';
$route['addBannerPost'] = 'BannerController/StoreBannerPost';
$route['editBanner'] = 'BannerController/updateBanner';

// Blog
$route['administrator/blog-list'] = 'BlogController/ViewBlogList';
$route['addBlogPost'] = 'BlogController/StoreBlogPost';
$route['editBlog'] = 'BlogController/updateBlog';

// Event
$route['administrator/event-list'] = 'EventController/ViewEventList';
$route['addEventPost'] = 'EventController/StoreEventPost';
$route['EditEventPost'] = 'EventController/updateEvent';

// artist
$route['artist-panel/event-list'] = 'EventController/ViewArtistEvent';
$route['addEventPost'] = 'EventController/StoreEventPost';
$route['EditEventPost'] = 'EventController/updateEvent';

// category
$route['administrator/category-list'] = 'AdminController/ViewCategoryList';
$route['addCategoryPost'] = 'AdminController/StoreCategoryPost';
$route['editCategory'] = 'AdminController/updateCategory';

// Subcategory
$route['administrator/subcategories-list'] = 'AdminController/ViewSubCategoryList';
$route['addSubCategoryPost'] = 'AdminController/StoreSubCategoryPost';
$route['editSubCategory'] = 'AdminController/updateSubCategory';

// art-shop-list
$route['administrator/art-shop-list'] = 'ShopController/ViewArtShopList';
$route['addArtShopPost'] = 'ShopController/StoreArtShopPost';
$route['editArtShopPost'] = 'ShopController/updateArtShop';
$route['view-shop-detail/(:any)'] = 'ShopController/viewShopDetail/$1';

// cart
$route['view-cart'] = 'ShopController/viewShopCart';
$route['view-checkout'] = 'ShopController/viewShopCheckout';

// user login
$route['user-login'] = 'ShopController/viewUserlogin';
$route['userlogin'] = 'ShopController/userlogin';
$route['userlogout'] = 'ShopController/userlogout';
$route['user-register'] = 'ShopController/userregister';
$route['addregisteruser'] = 'ShopController/storeUser';