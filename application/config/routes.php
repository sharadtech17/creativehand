<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home/index';
$route['404_override'] = 'home/pnf';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home/index';
$route['artist'] = 'Home/artist';
$route['artist-details/(:any)'] = 'Home/artistdetails/$1';
$route['art-details/(:any)'] = 'Home/artdetails/$1';

$route['view-about'] = 'About/index';

$route['artist-login'] = 'Artist/login';
$route['artistlogin'] = 'Artist/artistlogin';
$route['artistlogout'] = 'Artist/artistlogout';
$route['newregister'] = 'Artist/newregister';
$route['artist-register'] = 'Artist/artistregister';
$route['artist-panel/dashboard'] = 'Artist';
$route['artist-panel/view-profile'] = 'Artist/viewprofile';
$route['artist-panel/edit-profile'] = 'Artist/editprofile';
$route['artist-panel/view-all-arts'] = 'Artist/viewallarts';
$route['artist-panel/add-art'] = 'Artist/addart';
$route['artist-panel/my-subscription'] = 'Artist/mysubscription';
$route['artist-panel/subscription-history'] = 'Artist/subscriptionhistory';
$route['artist-panel/event-list'] = 'Artist/eventlist';
$route['artist-panel/add-event'] = 'Artist/addevent';
$route['artist-panel/events-payments'] = 'Artist/eventspayments';

$route['administrator'] = 'Admin';
$route['administrator/login'] = 'Admin';
$route['administratorlogin'] = 'Admin/administratorlogin';
$route['administratorlogout'] = 'Admin/adminlogout';
$route['administrator/dashboard'] = 'Admin/dashboard';
$route['administrator/artist-list'] = 'Admin/artistlist';
$route['administrator/artist-detail/(:any)'] = 'Admin/artistdetail/$1';
$route['administrator/list-arts'] = 'Admin/listarts';