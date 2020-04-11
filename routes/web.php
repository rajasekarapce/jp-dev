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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('clear', 'HomeController@clearCache')->name('clear_cache');

Route::get('new-register', 'HomeController@newRegister')->name('new_register');
Route::get('job-seeker-register', 'UserController@registerJobSeeker')->name('register_job_seeker');
Route::post('job-seeker-register', 'UserController@registerJobSeekerPost');

Route::post('job-seeker-register', 'UserController@registerJobSeekerPost');


Route::get('employer-register', 'UserController@registerEmployer')->name('register_employer');
Route::post('employer-register', 'UserController@registerEmployerPost')->name('register_employer');

Route::get('agent-register', 'UserController@registerAgent')->name('register_agent');
Route::post('agent-register', 'UserController@registerAgentPost');
Route::post('get-institute-list','DropdownController@getInstituteList');

Route::post('get-university-list','DropdownController@getUniversitiesList');
Route::post('get-states-options', 'LocationController@getStatesOption')->name('get_state_option_by_country');

Route::post('get-branchs-options', 'LocationController@getBranchsOption')->name('get_branch_option_by_qualification');

Route::post('get-institution-options', 'LocationController@getInstitutionOption')->name('get_institution_option_by_state');

Route::post('get-university-options', 'LocationController@getUniversityOption')->name('get_university_option_by_state');



Route::post('get-qualification', 'LocationController@getQualificationOption')->name('get_degree_option_by_qualification');


Route::get('apply_job', function (){
    return redirect(route('home'));
});
Route::post('apply_job', ['as' => 'apply_job', 'uses'=>'JobController@applyJob']);
Route::post('flag-job/{id}', ['as' => 'flag_job_post', 'uses'=>'JobController@flagJob']);
Route::post('share-by-email', ['as' => 'share_by_email', 'uses'=>'JobController@shareByEmail']);
Route::get('employer/{user_name}/jobs', 'JobController@jobsByEmployer')->name('jobs_by_employer');
Route::post('follow-unfollow', 'FollowerController@followUnfollow')->name('follow_unfollow');


Route::get('jobs/', 'JobController@jobsListing')->name('jobs_listing');

Route::get('p/{slug}', ['as' => 'single_page', 'uses' => 'PostController@showPage']);

Route::get('blog', 'PostController@blogIndex')->name('blog_index');
Route::get('blog/{slug}', 'PostController@view')->name('blog_post_single');

Route::get('pricing', 'HomeController@pricing')->name('pricing');

Route::get('contact-us', 'HomeController@contactUs')->name('contact_us');
Route::post('contact-us', 'HomeController@contactUsPost');


//checkout
Route::get('checkout/{package_id}', 'PaymentController@checkout')->name('checkout')->middleware('auth');
Route::post('checkout/{package_id}', 'PaymentController@checkoutPost')->middleware('auth');

Route::get('payment/{transaction_id}', 'PaymentController@payment')->name('payment');
Route::post('payment/{transaction_id}', 'PaymentController@paymentPost');

Route::any('payment/{transaction_id}/success', 'PaymentController@paymentSuccess')->name('payment_success');
Route::any('payment-cancel', 'PaymentController@paymentCancelled')->name('payment_cancel');

//PayPal
Route::post('payment/{transaction_id}/paypal', 'PaymentController@paypalRedirect')->name('payment_paypal_pay');
Route::any('payment/paypal-notify/{transaction_id?}', 'PaymentController@paypalNotify')->name('paypal_notify');


Route::post('payment/{transaction_id}/stripe', 'PaymentController@paymentStripeReceive')->name('payment_stripe_receive');

Route::post('payment/{transaction_id}/bank-transfer', 'PaymentController@paymentBankTransferReceive')->name('bank_transfer_submit');


//Dashboard Route
Route::group(['prefix'=>'dashboard', 'middleware' => 'dashboard'], function(){
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');

    Route::get('applied-jobs', 'DashboardController@dashboard')->name('applied_jobs');


    Route::group(['middleware'=>'admin_agent_employer'], function(){

        Route::group(['prefix'=>'employer'], function(){

            Route::group(['prefix'=>'job'], function(){
                Route::get('new', 'JobController@newJob')->name('post_new_job');
                Route::post('new', 'JobController@newJobPost');
                Route::get('edit/{job_id}', 'JobController@edit')->name('edit_job');
                Route::post('edit/{job_id}', 'JobController@update');
                Route::get('posted', 'JobController@postedJobs')->name('posted_jobs');
            });

            Route::get('applicant', 'UserController@employerApplicant')->name('employer_applicant');
            Route::get('shortlisted', 'UserController@shortlistedApplicant')->name('shortlisted_applicant');
            Route::get('applicant/{application_id}/shortlist', 'UserController@makeShortList')->name('make_short_list');

            Route::get('profile', 'UserController@employerProfile')->name('employer_profile');
            Route::post('profile', 'UserController@employerProfilePost');
            



        });
        Route::group(['prefix'=>'jobs'], function(){
            Route::get('/', 'JobController@pendingJobs')->name('pending_jobs');
            Route::get('pending', 'JobController@approvedJobs')->name('approved_jobs');
            Route::get('blocked', 'JobController@blockedJobs')->name('blocked_jobs');
            Route::get('status/{id}/{status}', 'JobController@statusChange')->name('job_status_change');

            Route::get('applicants/{job_id}', 'JobController@jobApplicants')->name('job_applicants');
        });


        Route::get('flagged', 'JobController@flaggedMessage')->name('flagged_jobs');


        Route::group(['prefix'=>'cms'], function(){
            Route::get('/', 'PostController@index')->name('pages');
            Route::get('page/add', 'PostController@addPage')->name('add_page');
            Route::post('page/add', 'PostController@store');

            Route::get('page/edit/{id}', 'PostController@pageEdit')->name('page_edit');
            Route::post('page/edit/{id}', 'PostController@pageEditPost');

            Route::get('posts', 'PostController@indexPost')->name('posts');
            Route::get('post/add', 'PostController@addPost')->name('add_post');
            Route::post('post/add', 'PostController@storePost');

            Route::get('post/edit/{id}', 'PostController@postEdit')->name('post_edit');
            Route::post('post/edit/{id}', 'PostController@postUpdate');

        });

    });


    Route::group(['middleware'=>'only_admin_access'], function(){

        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', ['as'=>'dashboard_categories', 'uses' => 'CategoriesController@index']);
            Route::post('/', ['uses' => 'CategoriesController@store']);

            Route::get('edit/{id}', ['as'=>'edit_categories', 'uses' => 'CategoriesController@edit']);
            Route::post('edit/{id}', ['uses' => 'CategoriesController@update']);

            Route::post('delete-categories', ['as'=>'delete_categories', 'uses' => 'CategoriesController@destroy']);
        });

        //Qualifications
        Route::group(['prefix'=>'qualifications'], function(){
            Route::get('/', ['as'=>'dashboard_qualifications', 'uses' => 'QualificationsController@index']);
            Route::post('/', ['uses' => 'QualificationsController@store']);

            Route::get('edit/{id}', ['as'=>'edit_qualifications', 'uses' => 'QualificationsController@edit']);
            Route::post('edit/{id}', ['uses' => 'QualificationsController@update']);

            Route::post('delete-qualifications', ['as'=>'delete_qualifications', 'uses' => 'QualificationsController@destroy']);
        });

        
        //Branches
         Route::group(['prefix'=>'branches'], function(){
            Route::get('/', ['as'=>'dashboard_branches', 'uses' => 'BranchesController@index']);
            Route::post('/', ['uses' => 'BranchesController@store']);

            Route::get('edit/{id}', ['as'=>'edit_branches', 'uses' => 'BranchesController@edit']);
            Route::post('edit/{id}', ['uses' => 'BranchesController@update']);

            Route::post('delete-branches', ['as'=>'delete_branches', 'uses' => 'BranchesController@destroy']);
        });

        //Institutions
        Route::group(['prefix'=>'institutions'], function(){
            Route::get('/', ['as'=>'dashboard_institutions', 'uses' => 'InstitutionsController@index']);
            Route::post('/', ['uses' => 'InstitutionsController@store']);

            Route::get('edit/{id}', ['as'=>'edit_institutions', 'uses' => 'InstitutionsController@edit']);
            Route::post('edit/{id}', ['uses' => 'InstitutionsController@update']);

            Route::post('delete-institutions', ['as'=>'delete_institutions', 'uses' => 'InstitutionsController@destroy']);
        });

        //Universities
        Route::group(['prefix'=>'universities'], function(){
            Route::get('/', ['as'=>'dashboard_universities', 'uses' => 'UniversitiesController@index']);
            Route::post('/', ['uses' => 'UniversitiesController@store']);

            Route::get('edit/{id}', ['as'=>'edit_universities', 'uses' => 'UniversitiesController@edit']);
            Route::post('edit/{id}', ['uses' => 'UniversitiesController@update']);

            Route::post('delete-universities', ['as'=>'delete_universities', 'uses' => 'UniversitiesController@destroy']);
        });

        //Skills
        Route::group(['prefix'=>'skills'], function(){
            Route::get('/', ['as'=>'dashboard_skills', 'uses' => 'SkillsController@index']);
            Route::post('/', ['uses' => 'SkillsController@store']);

            Route::get('edit/{id}', ['as'=>'edit_skills', 'uses' => 'SkillsController@edit']);
            Route::post('edit/{id}', ['uses' => 'SkillsController@update']);

            Route::post('delete-skills', ['as'=>'delete_skills', 'uses' => 'SkillsController@destroy']);
        });

        //Settings
        Route::group(['prefix'=>'settings'], function(){
            Route::get('/', 'SettingsController@GeneralSettings')->name('general_settings');

            Route::get('theme-settings', 'SettingsController@ThemeSettings')->name('theme_settings');
            Route::get('gateways', 'SettingsController@GatewaySettings')->name('gateways_settings');
            Route::get('pricing', 'SettingsController@PricingSettings')->name('pricing_settings');
            Route::post('pricing', 'SettingsController@PricingSave');

            //Save settings / options
            Route::post('save-settings', ['as'=>'save_settings', 'uses' => 'SettingsController@update']);
        });
    });


    Route::group(['prefix'=>'payments'], function() {
        Route::get('/', 'PaymentController@index')->name('payments');

        Route::get('view/{id}', ['as'=>'payment_view', 'uses' => 'PaymentController@view']);
        Route::get('status-change/{id}/{status}', ['as'=>'status_change', 'uses' => 'PaymentController@markSuccess']);
    });

    Route::group(['prefix'=>'u'], function(){
        Route::get('applied-jobs', 'UserController@appliedJobs')->name('applied_jobs');
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::get('profile/edit', 'UserController@profileEdit')->name('profile_edit');
        Route::get('education/edit', 'EducationDetailsController@edit')->name('education_edit');

        Route::get('profile/upload_resume', 'UserController@upload_resume')->name('upload_resume');
        Route::post('profile/upload_resume', 'UserController@upload_resume_post');
        Route::get('career/edit', 'CareerDetailsController@createOrEdit')->name('career_edit');
        Route::get('preference/edit', 'PreferenceController@createOrEdit')->name('career_edit');
        Route::post('profile/edit', 'UserController@profileEditPost');
        Route::get('edit_edu_details', 'UserController@edit_edu_profile')->name('edit_edu_details');
        Route::post('education_details', 'EducationDetailsController@addOrUpdate')->name('education_details');
        Route::post('education_details', 'EducationDetailsController@addOrUpdate')->name('education_details');
        Route::post('preference_details', 'PreferenceController@addOrUpdate')->name('preference_details');

        Route::group(['prefix'=>'users'], function(){
            Route::get('/', 'UserController@index')->name('users');
            Route::get('view/{slug}', ['as'=>'users_view', 'uses' => 'UserController@show']);
            Route::get('user_status/{id}/{status}', 'UserController@statusChange')->name('user_status');

            //Edit
            Route::get('edit/{id}', ['as'=>'users_edit', 'uses' => 'UserController@profileEdit']);
            Route::post('edit/{id}', ['uses' => 'UserController@profileEditPost']);
            Route::get('profile/change-avatar/{id}', ['as'=>'change_avatar', 'uses' => 'UserController@changeAvatar']);
        });

        /**
         * Change Password route
         */
        Route::group(['prefix' => 'account'], function() {
            Route::get('change-password', ['as' => 'change_password', 'uses' => 'UserController@changePassword']);
            Route::post('change-password', 'UserController@changePasswordPost');
        });

    });

    Route::group(['prefix' => 'account'], function() {
        Route::get('change-password', 'UserController@changePassword')->name('change_password');
        Route::post('change-password', 'UserController@changePasswordPost');
    });

});


//Single Sigment View
Route::get('{slug}', 'JobController@view')->name('job_view');