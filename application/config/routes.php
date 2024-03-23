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

//Contact
$route['view-contact'] = 'ContactController/index';
$route['addContact'] = 'ContactController/StoreContactPost';
$route['administrator/contact-list'] = 'ContactController/ViewContactList';

//inquiry
$route['view-inquiry'] = 'InquiryController/index';
$route['addInquiry'] = 'InquiryController/StoreinquiryPost';
$route['artist/inquiry-list'] = 'InquiryController/ViewinquiryList';

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
$route['administrator/subscriptionhistory'] = 'AdminController/subscriptionOrderHistory';

$route['administrator/subscriptionList'] = 'SubscriptionController/ViewSubscriptionList';
$route['addSubscriptionPost'] = 'SubscriptionController/StoreSubscriptionPost';
$route['editSubscription'] = 'SubscriptionController/updateSubscription';
$route['addSubscription/(:any)'] = 'SubscriptionController/storeSubscriptionBilling/$1';

// banner
$route['administrator/banner-list'] = 'BannerController/ViewBannerList';
$route['addBannerPost'] = 'BannerController/StoreBannerPost';
$route['editBanner'] = 'BannerController/updateBanner';

// Promotive
$route['administrator/promotive-list'] = 'PromotiveController/ViewPromotiveList';
$route['addPromotivePost'] = 'PromotiveController/StorePromotivePost';
$route['editPromotive'] = 'PromotiveController/updatePromotive';
// News
$route['administrator/news-list'] = 'PromotiveController/ViewNewsList';
$route['addNewsPost'] = 'PromotiveController/StoreNewsPost';
$route['editNews'] = 'PromotiveController/updateNews';

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
$route['searchArtShop'] = 'ShopController/searchArtShopData';


// cart
$route['view-cart'] = 'ShopController/viewShopCart';
$route['view-checkout'] = 'ShopController/viewShopCheckout';

// user login
$route['user-login'] = 'ShopController/viewUserlogin';
$route['user/login'] = 'ShopController/user_login';
$route['user/logout'] = 'ShopController/userLogout';
$route['user-register'] = 'ShopController/userregister';
$route['addregisteruser'] = 'ShopController/storeUser';
$route['editUser'] = 'ShopController/updateUser';
$route['user/account'] = 'ShopController/viewUserProfile';
$route['user/address'] = 'ShopController/viewAddress';
$route['edit/Address'] = 'ShopController/editAddress';

//cart
$route['addToCart/(:any)/(:any)'] = 'ShopController/StoreCart/$2/$1';
$route['updateCart'] = 'ShopController/updateCartItem';
$route['cartproduct/remove/(:any)'] = 'ShopController/deleteCart/$1';

//order
$route['user/orders'] = 'ShopController/viewOrderHistory';
$route['order/place'] = 'ShopController/orderPlace';


// admin order
$route['administrator/orders'] = 'ShopController/viewOrderList';
$route['administrator/view-Order-Details/(:any)'] = 'ShopController/viewOrderDetails/$1';