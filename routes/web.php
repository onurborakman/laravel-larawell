<?php

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

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
/*
|--------------------------------------------------------------------------
| GET Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {return view('home\welcome');})->name('root');
Route::get('/home', 'HomeController@index')->name('home')->middleware('security');
Route::get('/profile', 'NavigationController@showProfile')->name('profile')->middleware('security');
Route::get('/admin', 'NavigationController@showAdmin')->name('admin')->middleware('security', 'admin');
Route::get('/admin/jobs', 'NavigationController@showJobAdmin')->name('admin.job')->middleware('security', 'admin');
Route::get('/admin/{id}/job/applicants', 'NavigationController@showApplicants')->name('admin.job.applicants')->middleware('security', 'admin');
Route::get('/admin/groups', 'NavigationController@showGroupAdmin')->name('admin.group')->middleware('security', 'admin');
Route::get('/update', 'NavigationController@showUpdate')->name('update')->middleware('security');
Route::get('/admin/jobs/edit', 'NavigationController@showJobUpdate')->name('admin.job.edit')->middleware('security', 'admin');
Route::get('/portfolio', 'NavigationController@showPortfolio')->name('portfolio')->middleware('security');
Route::get('/portfolio/job', 'NavigationController@showJobHistory')->name('portfolio.job')->middleware('security');
Route::get('/portfolio/skill', 'NavigationController@showSkill')->name('portfolio.skill')->middleware('security');
Route::get('/portfolio/education', 'NavigationController@showEducation')->name('portfolio.education')->middleware('security');
Route::get('/post/job', 'NavigationController@showPostJob')->name('post.job')->middleware('security', 'admin');
Route::get('/{id}/portfolio', 'NavigationController@visitPortfolio')->name('visit.profile')->middleware('security');
Route::get('/{id}/job', 'NavigationController@visitJob')->name('visit.job')->middleware('security');
Route::get('/search', 'NavigationController@showSearch')->name('search')->middleware('security');
Route::get('/memberships', 'NavigationController@showMemberships')->name('memberships')->middleware('security');
Route::get('/groups/{id}', 'NavigationController@showGroupPage')->name('group.page')->middleware('security');
Route::get('/group/create', 'NavigationController@showCreateGroup')->name('group.create')->middleware('security', 'admin');
Route::get('/group/edit', 'NavigationController@showEditGroup')->name('group.edit')->middleware('security', 'admin');
Route::get('/applications', 'NavigationController@showApplications')->name('applications')->middleware('security');

/*
|--------------------------------------------------------------------------
| POST Routes
|--------------------------------------------------------------------------
*/
Route::post('/profile', 'UserController@showUpdate')->name('profile.update')->middleware('security');
Route::post('/admin/user/delete', 'UserController@showDelete')->name('admin.user.delete')->middleware('security', 'admin');
Route::post('/admin/user/suspend', 'UserController@showSuspend')->name('admin.user.suspend')->middleware('security', 'admin');
Route::post('/admin/user/reactivate', 'UserController@showReactivate')->name('admin.user.reactivate')->middleware('security', 'admin');
Route::post('/portfolio/education/delete', 'UserController@deleteEducation')->name('education.delete')->middleware('security');
Route::post('/portfolio/skill/delete', 'UserController@deleteSkill')->name('skill.delete')->middleware('security');
Route::post('/portfolio/job/delete', 'UserController@deleteJobHistory')->name('job.history.delete')->middleware('security');
Route::post('/portfolio/education/add', 'UserController@addEducation')->name('education.add')->middleware('security');
Route::post('/portfolio/skill/add', 'UserController@addSkill')->name('skill.add')->middleware('security');
Route::post('/portfolio/job/add', 'UserController@addJobHistory')->name('job.history.add')->middleware('security');
Route::post('/post/job/add', 'JobController@addJob')->name('job.add')->middleware('security', 'admin');
Route::post('/admin/jobs/delete', 'JobController@deleteJob')->name('admin.job.delete')->middleware('security', 'admin');
Route::post('admin/jobs/update', 'JobController@updateJob')->name('admin.job.update')->middleware('security', 'admin');
Route::post('/group/update', 'GroupController@updateGroup')->name('group.update')->middleware('security', 'admin');
Route::post('/group/delete', 'GroupController@deleteGroup')->name('group.delete')->middleware('security', 'admin');
Route::post('/group/create', 'GroupController@createGroup')->name('group.create')->middleware('security', 'admin');
Route::post('/group/join', 'GroupController@joinGroup')->name('group.join')->middleware('security');
Route::post('/group/leave', 'GroupController@leaveGroup')->name('group.leave')->middleware('security');
Route::post('/{id}/job/apply', 'JobController@applyJob')->name('job.apply')->middleware('security');
Route::post('/admin/job/applicants/approve', 'JobController@approveApplicant')->name('admin.job.approve')->middleware('security', 'admin');
Route::post('/admin/job/applicants/reject', 'JobController@rejectApplicant')->name('admin.job.reject')->middleware('security', 'admin');
/*
|--------------------------------------------------------------------------
| REST API
|--------------------------------------------------------------------------
*/
Route::get('/rest/users', 'RestController@userIndex')->name('rest.users');
Route::get('/rest/user/{id}', 'RestController@userShow')->name('rest.user');
Route::get('/rest/jobs', 'RestController@jobIndex')->name('rest.jobs');
Route::get('/rest/job/{id}', 'RestController@jobShow')->name('rest.job');
