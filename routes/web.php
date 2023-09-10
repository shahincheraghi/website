<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('key',function (){
    \Artisan::call('key:generate');
    dd("Cache is cleared");
});







Route::get('install/pre-installation', 'InstallController@preInstallation')->name('install.pre_installation');
Route::get('install/configuration', 'InstallController@getConfiguration')->name('install.configuration.show');
Route::post('install/configuration', 'InstallController@postConfiguration')->name('install.configuration.post');
Route::get('install/complete', 'InstallController@complete')->name('install.complete');

Route::get('license', 'LicenseController@create')->name('license.create');
Route::post('license',  'LicenseController@store')->name('license.store');


Route::post('/checkAndSmsInsurance', 'InsuranceController@checkAndSmsInsurance')->name('sendSmsInsurance');
Route::post('/saveRecordInsurance', 'InsuranceController@saveRecordInsurance')->name('saveRecordInsurance');
Route::post('/checkSerial', 'InsuranceSerialController@checkSerial')->name('serial.check');
Route::post('/getInsuranceDetails', 'InsuranceTypeController@getInsuranceDetails')->name('insuranceType.check');

Route::post('/storeComplaint', 'ComplaintController@store')->name('store.complaint');
Route::post('/saveServiceOnline', 'ServiceOnlineController@store')->name('store.ServiceOnline');
Route::post('/OtpServiceOnline', 'ServiceOnlineController@OtpServiceOnline')->name('OtpServiceOnline.ServiceOnline');
Route::post('/checkOtpServiceOnline', 'ServiceOnlineController@checkOtpServiceOnline')->name('checkOtpServiceOnline.ServiceOnline');
Route::post('/getFormStep2Service', 'ServiceOnlineController@getFormStep2Service')->name('getFormStep2Service.ServiceOnline');
Route::post('/getFormStep3Service', 'ServiceOnlineController@getFormStep3Service')->name('getFormStep3Service.ServiceOnline');



Route::post('/getStep2WarrantyExtension', 'Admin\WarrantyExtensionController@getStep2WarrantyExtension')->name('getStep2WarrantyExtension');
Route::post('/getStep3WarrantyExtension', 'Admin\WarrantyExtensionController@getStep3WarrantyExtension')->name('getStep3WarrantyExtension');
Route::post('/OtpWarrantyExtension', 'Admin\WarrantyExtensionController@OtpWarrantyExtension')->name('OtpWarrantyExtension');
Route::post('/checkOtpWarrantyExtension', 'Admin\WarrantyExtensionController@checkOtpWarrantyExtension')->name('checkOtpWarrantyExtension');
Route::post('/saveWarrantyExtension', 'Admin\WarrantyExtensionController@saveWarrantyExtension')->name('saveWarrantyExtension');


Route::post('/getStep3FormTrade', 'Admin\FormTradeController@getStep3FormTrade')->name('getStep3FormTrade');
Route::post('/getStep4FormTrade', 'Admin\FormTradeController@getStep4FormTrade')->name('getStep4FormTrade');
Route::post('/OtpFormTrade', 'Admin\FormTradeController@OtpFormTrade')->name('OtpFormTrade');
Route::post('/checkOtpFormTrade', 'Admin\FormTradeController@checkOtpFormTrade')->name('checkOtpFormTrade');
Route::post('/saveFormTrade', 'Admin\FormTradeController@saveFormTrade')->name('saveFormTrade');


Route::post('/getStep2SwitchMobile', 'Admin\SwitchMobileController@getStep2SwitchMobile')->name('getStep2SwitchMobile');
Route::post('/getStep3SwitchMobile', 'Admin\SwitchMobileController@getStep3SwitchMobile')->name('getStep3SwitchMobile');
Route::post('/OtpSwitchMobile', 'Admin\SwitchMobileController@OtpSwitchMobile')->name('OtpSwitchMobile');
Route::post('/checkOtpSwitchMobile', 'Admin\SwitchMobileController@checkOtpSwitchMobile')->name('checkOtpSwitchMobile');
Route::post('/saveSwitchMobile', 'Admin\SwitchMobileController@saveSwitchMobile')->name('saveSwitchMobile');




//            =================saveFormDynamic=======================
Route::post('saveFormDynamic', 'Admin\FormController@save')->name('Admin.forms.save');
//            =================saveFormDynamic=======================


Route::get('/list', 'Controller@getAgencylist')->name('agency.list');
    Route::namespace('Auth')->prefix('Auth')->group(function () {
        Route::get('/adminLogin', 'AuthController@login')->name('Admin.Auth.login');
        Route::post('/adminDoLogin', 'AuthController@doLogin')->name('Admin.Auth.doLogin');
        Route::get('/login', 'AuthController@loginFront')->name('login');
        Route::post('/doLogin', 'AuthController@doLoginFront')->name('Auth.doLogin');
        Route::get('/register', 'AuthController@registerFront')->name('register');
        Route::post('/doRegister', 'AuthController@doRegisterFront')->name('Auth.doRegister');
        Route::get('/forget', 'AuthController@forget')->name('Auth.forget');
        Route::get('/logout', 'AuthController@logoute')->name('logoute');

        //========================loginUserOtp======================
        Route::post('panel/loginUser', [LoginController::class, 'login'])->name('panel.loginUser');
        //========================loginUserOtp======================
    });


    Route::group(['middleware' => ['auth', 'IsAllow']], function () {
        Route::namespace('Admin')->prefix('Admins')->group(function () {
            Route::get('/', 'IndexController@index')->name('Admin.index');
            Route::post('/uploadfile', 'FileController@saveImages');

            Route::prefix('Insurance')->group(function () {
                Route::get('/', 'InsuranceController@index')->name('Admin.Insurance.index');
            });

            Route::prefix('serviceOnline')->group(function () {
                Route::get('/', 'ServiceOnlineController@index')->name('Admin.serviceOnline.index');
            });

            Route::prefix('settings')->group(function () {
                Route::get('/', 'SettingsController@index')->name('Admin.settings.index');
                Route::get('/create', 'SettingsController@create')->name('Admin.settings.create');
                Route::get('/show', 'SettingsController@show')->name('Admin.settings.show');
                Route::post('/store', 'SettingsController@store')->name('Admin.settings.store');
                Route::get('/edit', 'SettingsController@edit')->name('Admin.settings.edit');
                Route::post('/update', 'SettingsController@update')->name('Admin.settings.update');
                Route::get('/deleteImg/{name}', 'SettingsController@deleteImg')->name('Admin.settings.deleteImg');
            });
            Route::get('/footer', 'FooterController@show')->name('Admin.footer.index');
            Route::post('/saveFooter', 'FooterController@save')->name('Admin.save.index');




//            =================formBuilder=======================
            Route::post('/getFormFields', 'FormController@show')->name('Admin.FormBuilder.show');
            Route::get('/formBuilder', 'FormBuilderController@index')->name('Admin.FormBuilder.index');
            Route::post('/addForm', 'FormController@store')->name('Admin.form.store');
            Route::post('/FormFieldSave', 'FormController@updateFieldsForm')->name('Admin.form.updateFieldsForm');
            Route::get('/formDelete/{id}', 'FormController@destroy')->name('Admin.forms.destroy');
            Route::post('/showEditForm', 'FormController@edit')->name('Admin.forms.edit');
            Route::post('/formBuilderData', 'FormController@formBuilderData')->name('Admin.formBuilderData.gridData');
//            =================formBuilder=======================





             Route::prefix('users')->group(function () {
                Route::get('/userPerm/{userId}', 'UsersController@userPerm')->name('Admin.userPerm.index');
                Route::post('/userPerm/{userId}', 'UsersController@userPermUpdate')->name('Admin.userPerm.update');
                Route::get('/list/{type}', 'UsersController@index')->name('Admin.users.index');
                Route::get('/create', 'UsersController@create')->name('Admin.users.create');
                Route::get('/show', 'UsersController@show')->name('Admin.users.show');
                Route::post('/store', 'UsersController@store')->name('Admin.users.store');
                Route::get('/edit/{id}', 'UsersController@edit')->name('Admin.users.edit');
                Route::post('/update/{id}', 'UsersController@update')->name('Admin.users.update');
                Route::get('/delete/{id}', 'UsersController@destroy')->name('Admin.users.delete');
            });


            Route::prefix('services')->group(function () {
                Route::get('/', 'ServiceController@index')->name('Admin.services.index');
                Route::get('/create', 'ServiceController@create')->name('Admin.services.create');
                Route::get('/show', 'ServiceController@show')->name('Admin.services.show');
                Route::post('/store', 'ServiceController@store')->name('Admin.services.store');
                Route::get('/edit/{id}', 'ServiceController@edit')->name('Admin.services.edit');
                Route::post('/update/{id}', 'ServiceController@update')->name('Admin.services.update');
                Route::get('/delete/{id}', 'ServiceController@destroy')->name('Admin.services.delete');
            });

            Route::prefix('skills')->group(function () {
                Route::get('/', 'SkillsController@index')->name('Admin.skills.index');
                Route::get('/create', 'SkillsController@create')->name('Admin.skills.create');
                Route::get('/show', 'SkillsController@show')->name('Admin.skills.show');
                Route::post('/store', 'SkillsController@store')->name('Admin.skills.store');
                Route::get('/edit/{id}', 'SkillsController@edit')->name('Admin.skills.edit');
                Route::post('/update/{id}', 'SkillsController@update')->name('Admin.skills.update');
                Route::get('/delete/{id}', 'SkillsController@destroy')->name('Admin.skills.delete');
            });

            Route::prefix('comments')->group(function () {
                Route::get('/', 'CommentsController@index')->name('Admin.comments.index');
                Route::get('/create', 'CommentsController@create')->name('Admin.comments.create');
                Route::post('/store', 'CommentsController@store')->name('Admin.comments.store');
                Route::get('/edit/{id}', 'CommentsController@edit')->name('Admin.comments.edit');
                Route::post('/update/{id}', 'CommentsController@update')->name('Admin.comments.update');
                //6565
                Route::get('/confirmation/{id}', 'CommentsController@confirmation')->name('Admin.comments.confirmation');
                Route::get('/delete/{id}', 'CommentsController@destroy')->name('Admin.comments.destroy');
                Route::get('/show/{id}', 'CommentsController@show')->name('Admin.comments.show');
            });

            Route::prefix('blogs')->group(function () {
                Route::get('/', 'BlogsController@index')->name('Admin.blogs.index');
                Route::get('/create', 'BlogsController@create')->name('Admin.blogs.create');
                Route::post('/store', 'BlogsController@store')->name('Admin.blogs.store');
                Route::get('/edit/{id}', 'BlogsController@edit')->name('Admin.blogs.edit');
                Route::post('/update/{id}', 'BlogsController@update')->name('Admin.blogs.update');
                Route::get('/destroy/{id}', 'BlogsController@BlogDelete')->name('Admin.blogs.destroy');
            });

            Route::prefix('pages')->group(function () {
                Route::get('/', 'PageController@index')->name('Admin.pages.index');
                Route::get('/create', 'PageController@create')->name('Admin.pages.create');
                Route::post('/store', 'PageController@store')->name('Admin.pages.store');
                Route::get('/edit/{id}', 'PageController@edit')->name('Admin.pages.edit');
                Route::post('/update/{id}', 'PageController@update')->name('Admin.pages.update');
                Route::get('/destroy/{id}', 'PageController@pageDelete')->name('Admin.pages.destroy');
            });

            Route::prefix('HomeContentInfo')->group(function () {
                Route::get('/', 'HomeContentInfoController@index')->name('Admin.HomeContentInfo.index');
                Route::get('/create', 'HomeContentInfoController@create')->name('Admin.HomeContentInfo.create');
                Route::post('/store', 'HomeContentInfoController@store')->name('Admin.HomeContentInfo.store');
                Route::get('/edit/{id}', 'HomeContentInfoController@edit')->name('Admin.HomeContentInfo.edit');
                Route::post('/update/{id}', 'HomeContentInfoController@update')->name('Admin.HomeContentInfo.update');
                Route::get('/destroy/{id}', 'HomeContentInfoController@HomeContentInfoDelete')->name('Admin.HomeContentInfo.destroy');
            });


            Route::prefix('sliders')->group(function () {
                Route::get('/', 'SlidersController@index')->name('Admin.sliders.index');
                Route::get('/create', 'SlidersController@create')->name('Admin.sliders.create');
                Route::post('/store', 'SlidersController@store')->name('Admin.sliders.store');
                Route::get('/edit/{id}', 'SlidersController@edit')->name('Admin.sliders.edit');
                Route::post('/update/{id}', 'SlidersController@update')->name('Admin.sliders.update');
                Route::get('/destroy/{id}', 'SlidersController@SliderDelete')->name('Admin.sliders.destroy');
            });

            Route::prefix('counters')->group(function () {
                Route::get('/', 'CountersController@index')->name('Admin.counters.index');
                Route::get('/create', 'CountersController@create')->name('Admin.counters.create');
                Route::post('/store', 'CountersController@store')->name('Admin.counters.store');
                Route::get('/edit/{id}', 'CountersController@edit')->name('Admin.counters.edit');
                Route::post('/update/{id}', 'CountersController@update')->name('Admin.counters.update');
                Route::get('/destroy/{id}', 'CountersController@CounterDelete')->name('Admin.counters.destroy');
            });

            Route::prefix('categorys')->group(function () {
                Route::get('/', 'CategorysController@index')->name('Admin.categorys.index');
                Route::get('/create', 'CategorysController@create')->name('Admin.categorys.create');
                Route::post('/store', 'CategorysController@store')->name('Admin.categorys.store');
                Route::get('/edit/{id}', 'CategorysController@edit')->name('Admin.categorys.edit');
                Route::post('/update/{id}', 'CategorysController@update')->name('Admin.categorys.update');
                Route::get('/destroy/{id}', 'CategorysController@CategoryDelete')->name('Admin.categorys.destroy');
            });




            Route::prefix('teams')->group(function () {
                Route::get('/', 'TeamsController@index')->name('Admin.teams.index');
                Route::get('/create', 'TeamsController@create')->name('Admin.teams.create');
                Route::post('/store', 'TeamsController@store')->name('Admin.teams.store');
                Route::get('/edit/{id}', 'TeamsController@edit')->name('Admin.teams.edit');
                Route::post('/update/{id}', 'TeamsController@update')->name('Admin.teams.update');
                Route::get('/destroy/{id}', 'TeamsController@destroy')->name('Admin.teams.destroy');
            });

            Route::prefix('partners')->group(function () {
                Route::get('/', 'PartnersController@index')->name('Admin.partners.index');
                Route::get('/create', 'PartnersController@create')->name('Admin.partners.create');
                Route::post('/store', 'PartnersController@store')->name('Admin.partners.store');
                Route::get('/edit/{id}', 'PartnersController@edit')->name('Admin.partners.edit');
                Route::post('/update/{id}', 'PartnersController@update')->name('Admin.partners.update');
                Route::get('/destroy/{id}', 'PartnersController@destroy')->name('Admin.partners.destroy');
            });


            Route::prefix('TitleComplaints')->group(function () {
                Route::get('/', 'TitleComplaintController@index')->name('Admin.TitleComplaints.index');
                Route::get('/create', 'TitleComplaintController@create')->name('Admin.TitleComplaints.create');
                Route::post('/store', 'TitleComplaintController@store')->name('Admin.TitleComplaints.store');
                Route::get('/edit/{id}', 'TitleComplaintController@edit')->name('Admin.TitleComplaints.edit');
                Route::post('/update/{id}', 'TitleComplaintController@update')->name('Admin.TitleComplaints.update');
                Route::get('/destroy/{id}', 'TitleComplaintController@destroy')->name('Admin.TitleComplaints.destroy');
            });

            Route::prefix('faqs')->group(function () {
                Route::get('/', 'FaqsController@index')->name('Admin.faqs.index');
                Route::get('/create', 'FaqsController@create')->name('Admin.faqs.create');
                Route::post('/store', 'FaqsController@store')->name('Admin.faqs.store');
                Route::get('/edit/{id}', 'FaqsController@edit')->name('Admin.faqs.edit');
                Route::post('/update/{id}', 'FaqsController@update')->name('Admin.faqs.update');
                Route::get('/destroy/{id}', 'FaqsController@destroy')->name('Admin.faqs.destroy');
            });

            Route::prefix('CompetitiveAdvantage')->group(function () {
                Route::get('/', 'HomeContentController@indexCompetitiveAdvantage')->name('Admin.CompetitiveAdvantage.index');
                Route::get('/create', 'HomeContentController@createCompetitiveAdvantage')->name('Admin.CompetitiveAdvantage.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.CompetitiveAdvantage.store');
                Route::get('/edit/{id}', 'HomeContentController@editCompetitiveAdvantage')->name('Admin.CompetitiveAdvantage.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.CompetitiveAdvantage.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.CompetitiveAdvantage.destroy');
            });

            Route::prefix('HomeBox1')->group(function () {
                Route::get('/', 'HomeContentController@indexBox1')->name('Admin.HomeBox1.index');
                Route::get('/create', 'HomeContentController@createBox1')->name('Admin.HomeBox1.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.HomeBox1.store');
                Route::get('/edit/{id}', 'HomeContentController@editBox1')->name('Admin.HomeBox1.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.HomeBox1.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.HomeBox1.destroy');
            });


            Route::prefix('TabBox')->group(function () {
                Route::get('/', 'HomeContentController@indexTabBox')->name('Admin.TabBox.index');
                Route::get('/create', 'HomeContentController@createTabBox')->name('Admin.TabBox.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.TabBox.store');
                Route::get('/edit/{id}', 'HomeContentController@editTabBox')->name('Admin.TabBox.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.TabBox.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.TabBox.destroy');
            });

            Route::prefix('QuestionAnswer')->group(function () {
                Route::get('/', 'HomeContentController@indexQuestionAnswer')->name('Admin.QuestionAnswer.index');
                Route::get('/create', 'HomeContentController@createQuestionAnswer')->name('Admin.QuestionAnswer.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.QuestionAnswer.store');
                Route::get('/edit/{id}', 'HomeContentController@editQuestionAnswer')->name('Admin.QuestionAnswer.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.QuestionAnswer.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.QuestionAnswer.destroy');
            });

            Route::prefix('SliderMiniImg')->group(function () {
                Route::get('/', 'HomeContentController@indexSliderMiniImg')->name('Admin.SliderMiniImg.index');
                Route::get('/create', 'HomeContentController@createSliderMiniImg')->name('Admin.SliderMiniImg.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.SliderMiniImg.store');
                Route::get('/edit/{id}', 'HomeContentController@editSliderMiniImg')->name('Admin.SliderMiniImg.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.SliderMiniImg.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.SliderMiniImg.destroy');
            });


            Route::prefix('QuickAccess')->group(function () {
                Route::get('/', 'HomeContentController@indexQuickAccess')->name('Admin.QuickAccess.index');
                Route::get('/create', 'HomeContentController@createQuickAccess')->name('Admin.QuickAccess.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.QuickAccess.store');
                Route::get('/edit/{id}', 'HomeContentController@editQuickAccess')->name('Admin.QuickAccess.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.QuickAccess.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.QuickAccess.destroy');
            });

            Route::prefix('BigPicInLapTop')->group(function () {
                Route::get('/', 'HomeContentController@indexBigPicInLapTop')->name('Admin.BigPicInLapTop.index');
                Route::get('/create', 'HomeContentController@createBigPicInLapTop')->name('Admin.BigPicInLapTop.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.BigPicInLapTop.store');
                Route::get('/edit/{id}', 'HomeContentController@editBigPicInLapTop')->name('Admin.BigPicInLapTop.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.BigPicInLapTop.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.BigPicInLapTop.destroy');
            });


            Route::prefix('BusinessProcess')->group(function () {
                Route::get('/', 'HomeContentController@indexBusinessProcess')->name('Admin.BusinessProcess.index');
                Route::get('/create', 'HomeContentController@createBusinessProcess')->name('Admin.BusinessProcess.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.BusinessProcess.store');
                Route::get('/edit/{id}', 'HomeContentController@editBusinessProcess')->name('Admin.BusinessProcess.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.BusinessProcess.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.BusinessProcess.destroy');
            });


            Route::prefix('CustomersComment')->group(function () {
                Route::get('/', 'HomeContentController@indexCustomersComment')->name('Admin.CustomersComment.index');
                Route::get('/create', 'HomeContentController@createCustomersComment')->name('Admin.CustomersComment.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.CustomersComment.store');
                Route::get('/edit/{id}', 'HomeContentController@editCustomersComment')->name('Admin.CustomersComment.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.CustomersComment.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.CustomersComment.destroy');
            });


            Route::prefix('TextWithBackground')->group(function () {
                Route::get('/', 'HomeContentController@indexTextWithBackground')->name('Admin.TextWithBackground.index');
                Route::get('/create', 'HomeContentController@createTextWithBackground')->name('Admin.TextWithBackground.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.TextWithBackground.store');
                Route::get('/edit/{id}', 'HomeContentController@editTextWithBackground')->name('Admin.TextWithBackground.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.TextWithBackground.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.TextWithBackground.destroy');
            });

            Route::prefix('MenusFooter')->group(function () {
                Route::get('/', 'MenusFooterController@index')->name('Admin.MenusFooter.index');
                Route::get('/create', 'MenusFooterController@create')->name('Admin.MenusFooter.create');
                Route::post('/store', 'MenusFooterController@store')->name('Admin.MenusFooter.store');
                Route::get('/edit/{id}', 'MenusFooterController@edit')->name('Admin.MenusFooter.edit');
                Route::post('/update/{id}', 'MenusFooterController@update')->name('Admin.MenusFooter.update');
                Route::get('/destroy/{id}', 'MenusFooterController@destroy')->name('Admin.MenusFooter.destroy');
            });

            Route::prefix('HomeBox2')->group(function () {
                Route::get('/', 'HomeContentController@indexBox2')->name('Admin.HomeBox2.index');
                Route::get('/create', 'HomeContentController@createBox2')->name('Admin.HomeBox2.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.HomeBox2.store');
                Route::get('/edit/{id}', 'HomeContentController@editBox2')->name('Admin.HomeBox2.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.HomeBox2.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.HomeBox2.destroy');
            });


            Route::prefix('HomeBox3')->group(function () {
                Route::get('/', 'HomeContentController@indexBox3')->name('Admin.HomeBox3.index');
                Route::get('/create', 'HomeContentController@createBox3')->name('Admin.HomeBox3.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.HomeBox3.store');
                Route::get('/edit/{id}', 'HomeContentController@editBox3')->name('Admin.HomeBox3.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.HomeBox3.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.HomeBox3.destroy');
            });

            Route::prefix('HomeBox4')->group(function () {
                Route::get('/', 'HomeContentController@indexBox4')->name('Admin.HomeBox4.index');
                Route::get('/create', 'HomeContentController@createBox4')->name('Admin.HomeBox4.create');
                Route::post('/store', 'HomeContentController@store')->name('Admin.HomeBox4.store');
                Route::get('/edit/{id}', 'HomeContentController@editBox4')->name('Admin.HomeBox4.edit');
                Route::post('/update/{id}', 'HomeContentController@update')->name('Admin.HomeBox4.update');
                Route::get('/destroy/{id}', 'HomeContentController@destroy')->name('Admin.HomeBox4.destroy');
            });


            Route::prefix('products')->group(function () {
                Route::get('/list', 'ProductController@index')->name('Admin.products.index');
                Route::get('/create', 'ProductController@create')->name('Admin.products.create');
                Route::post('/store', 'ProductController@store')->name('Admin.products.store');
                Route::get('/edit/{id}', 'ProductController@edit')->name('Admin.products.edit');
                Route::post('/update/{id}', 'ProductController@update')->name('Admin.products.update');
                Route::get('/delete/{id}', 'ProductController@destroy')->name('Admin.products.delete');

            });


            Route::prefix('formCategory')->group(function () {
                Route::get('/list', 'FormCategoryController@index')->name('Admin.FormCategoryController.index');
                Route::get('/create', 'FormCategoryController@create')->name('Admin.FormCategoryController.create');
                Route::post('/store', 'FormCategoryController@store')->name('Admin.FormCategoryController.store');
                Route::post('/edit', 'FormCategoryController@show')->name('Admin.FormCategoryController.show');
                Route::post('/update', 'FormCategoryController@update')->name('Admin.FormCategoryController.update');
                Route::get('/delete/{id}', 'FormCategoryController@destroy')->name('Admin.FormCategoryController.destroy');

            });



            Route::prefix('FormProduct')->group(function () {
                Route::get('/list', 'FormProductController@index')->name('Admin.FormProductController.index');
                Route::get('/create', 'FormProductController@create')->name('Admin.FormProductController.create');
                Route::post('/store', 'FormProductController@store')->name('Admin.FormProductController.store');
                Route::post('/edit', 'FormProductController@show')->name('Admin.FormProductController.show');
                Route::post('/update', 'FormProductController@update')->name('Admin.FormProductController.update');
                Route::get('/delete/{id}', 'FormProductController@destroy')->name('Admin.FormProductController.destroy');
            });

            Route::prefix('FormModel')->group(function () {
                Route::get('/list', 'FormModelController@index')->name('Admin.FormModelController.index');
                Route::get('/create', 'FormModelController@create')->name('Admin.FormModelController.create');
                Route::post('/store', 'FormModelController@store')->name('Admin.FormModelController.store');
                Route::post('/edit', 'FormModelController@show')->name('Admin.FormModelController.show');
                Route::post('/update', 'FormModelController@update')->name('Admin.FormModelController.update');
                Route::get('/delete/{id}', 'FormModelController@destroy')->name('Admin.FormModelController.destroy');
            });

            Route::prefix('Color')->group(function () {
                Route::get('/list', 'ColorController@index')->name('Admin.ColorController.index');
                Route::get('/create', 'ColorController@create')->name('Admin.ColorController.create');
                Route::post('/store', 'ColorController@store')->name('Admin.ColorController.store');
                Route::post('/edit', 'ColorController@show')->name('Admin.ColorController.show');
                Route::post('/update', 'ColorController@update')->name('Admin.ColorController.update');
                Route::get('/delete/{id}', 'ColorController@destroy')->name('Admin.ColorController.destroy');
            });



            Route::prefix('manageHomeContent')->group(function () {
                Route::get('/list', 'ManageHomeContentController@index')->name('Admin.manageHomeContent.index');
                Route::get('get-data-home-content', 'ManageHomeContentController@getHomeContent')->name('Admin.manageHomeContent.getHomeContent');
                Route::post('getDetailHomeContentById', 'ManageHomeContentController@getDetailHomeContentById')->name('Admin.manageHomeContent.getDetailHomeContentById');
                Route::post('/FormManageHomeContent', 'ManageHomeContentController@store')->name('Admin.manageHomeContent.store');
                Route::post('/editFormManageHomeContent', 'ManageHomeContentController@show')->name('Admin.manageHomeContent.show');
                Route::post('/FormManageHomeContentUpdate', 'ManageHomeContentController@update')->name('Admin.manageHomeContent.update');
                Route::get('/delete/{id}', 'ManageHomeContentController@destroy')->name('Admin.ManageHomeContentController.destroy');
            });



            Route::prefix('Problem')->group(function () {
                Route::get('/list', 'ProblemController@index')->name('Admin.ProblemController.index');
                Route::get('/create', 'ProblemController@create')->name('Admin.ProblemController.create');
                Route::post('/store', 'ProblemController@store')->name('Admin.ProblemController.store');
                Route::post('/edit', 'ProblemController@show')->name('Admin.ProblemController.show');
                Route::post('/update', 'ProblemController@update')->name('Admin.ProblemController.update');
                Route::get('/delete/{id}', 'ProblemController@destroy')->name('Admin.ProblemController.destroy');
            });

            Route::prefix('ProblemEvent')->group(function () {
                Route::get('/list', 'ProblemEventController@index')->name('Admin.ProblemEventController.index');
                Route::get('/create', 'ProblemEventController@create')->name('Admin.ProblemEventController.create');
                Route::post('/store', 'ProblemEventController@store')->name('Admin.ProblemEventController.store');
                Route::post('/edit', 'ProblemEventController@show')->name('Admin.ProblemEventController.show');
                Route::post('/update', 'ProblemEventController@update')->name('Admin.ProblemEventController.update');
                Route::get('/delete/{id}', 'ProblemEventController@destroy')->name('Admin.ProblemEventController.destroy');
            });

            Route::prefix('menus')->group(function () {
                Route::get('/', 'MenuController@index')->name('Admin.menus.index');
                Route::get('/menus-show', 'MenuController@show')->name('Admin.menus.create');
                Route::post('/', 'MenuController@store')->name('Admin.menus.store');
                Route::post('/deleteMenu', 'MenuController@destroy')->name('Admin.menus.delete');
            });



            //menu
//            Route::get('menus','MenuController@index')->name('menus'); //index

            Route::post('menustop/reorder','MenuController@postIndex'); //re-order

            Route::post('menustop/new','MenuController@postNew')->name('topnew'); //create

            Route::post('update-menus-parents','MenuController@updateMenusParents')->name('updateMenusParents'); //create

            Route::post('showEditMenu','MenuController@show')->name('Admin.menus.show'); //show

            Route::post('update-menus-parents','MenuController@updateMenusParents')->name('updateMenusParents'); //edit

            Route::post('destroyMenuDynamic','MenuController@destroy')->name('Admin.menu.destroy'); //edit
            Route::post('FormUpdateMenuDynamic','MenuController@FormUpdateMenuDynamic')->name('Admin.menu.FormUpdateMenuDynamic'); //edit

            Route::get('menustop/{id}','MenuController@getEdit'); //edit page

            Route::put('menustop/{id}','MenuController@postEdit')->name('topeditupdate'); //update data (edit)


            Route::get('getCategoryDetails/{id}','MenuController@getCategoryDetails'); //get category title and slug based on selected option





            Route::prefix('shipments')->group(function () {
                Route::get('/', 'ShipmentController@index')->name('Admin.shipments.index');
                Route::get('/create', 'ShipmentController@create')->name('Admin.shipments.create');
                Route::post('/store', 'ShipmentController@store')->name('Admin.shipments.store');
                Route::get('/edit/{id}', 'ShipmentController@edit')->name('Admin.shipments.edit');
                Route::post('/update/{id}', 'ShipmentController@update')->name('Admin.shipments.update');
                Route::get('/destroy/{id}', 'ShipmentController@destroy')->name('Admin.shipments.destroy');
                Route::post('/storeTariff/{id}', 'ShipmentController@storeTariff')->name('Admin.shipments.storeTariff');
                Route::post('/updateTariff/{id}', 'ShipmentController@updateTariff')->name('Admin.shipments.updateTariff');
                Route::get('/tariff/{id}', 'ShipmentController@tariff')->name('Admin.shipments.tariff');
                Route::get('/tariffEdit/{id}', 'ShipmentController@tariffEdit')->name('Admin.shipments.tariffEdit');
            });


      Route::prefix('orders')->group(function () {
                Route::get('/list', 'OrderController@index')->name('Admin.orders.index');
                Route::get('/new', 'OrderController@new')->name('Admin.orders.new');
                Route::get('/confirmed', 'OrderController@confirmed')->name('Admin.orders.confirmed');
                Route::get('/posted', 'OrderController@posted')->name('Admin.orders.posted');
                Route::get('/delivered', 'OrderController@delivered')->name('Admin.orders.delivered');
                Route::get('/details/{order_id}', 'OrderController@show')->name('Admin.orders.details');
                Route::get('/invoice/{order_id}', 'OrderController@invoice')->name('Admin.orders.invoice');
                Route::get('/delete/{order_id}', 'OrderController@delete')->name('Admin.orders.delete');
                Route::get('/detailsChange/{order_id}/{status}', 'OrderController@detailsChange')->name('Admin.orders.detailsChange');
            });


            Route::prefix('contacts')->group(function () {
                Route::get('/', 'ContactsController@index')->name('Admin.contacts.index');
                Route::get('/', 'ContactsController@index')->name('Admin.contacts.index');
                Route::get('/show/{id}', 'ContactsController@show')->name('Admin.contacts.show');
                Route::get('/destroy/{id}', 'ContactsController@ContactDelete')->name('Admin.contacts.destroy');
            });

            Route::prefix('subscribes')->group(function () {
                Route::get('/', 'ContactsController@indexSubscribe')->name('Admin.subscribes.index');
            });
            Route::prefix('Counseling')->group(function () {
                Route::get('/', 'ContactsController@indexCounseling')->name('Admin.Counseling.index');
            });


            Route::prefix('users')->group(function () {
                Route::prefix('profile')->group(function () {
                    Route::get('/edit', 'UsersController@profileEdit')->name('Admin.users.profile.edit');
                    Route::post('/update', 'UsersController@profileUpdate')->name('Admin.users.profile.update');
                    Route::post('/updateSocial', 'UsersController@updateSocial')->name('Admin.users.profile.Social.update');
                });
            });
        });
    });

    Route::namespace('Front')->middleware('Visitors')->group(function () {
        Route::get('/', 'IndexController@index')->name('Front.index');
        Route::post('/getCity', 'IndexController@getCity')->name('Front.getCity');
        Route::get('/blogsText/{id}', 'BlogController@blogText')->name('Front.blogSingle');
        Route::get('/blog/{id?}', 'BlogController@index')->name('Front.blogs');



        Route::get('/pages/id={id}/{slug?}', 'PageController@pageText')->name('Front.pageSingle');


        Route::post('/subscribeStore', 'SubscribeController@store')->name('subscribes.store');

        Route::post('CounselingStore', 'CounselingController@store')->name('counseling.store');

        Route::get('/team', 'TeamController@index')->name('Front.team');
        Route::get('addNewsLetters', 'NewslettersController@add')->name('Front.addNewsLetters');
//        Route::get('/about', 'AboutController@index')->name('Front.about');
        Route::get('/service/{id?}', 'ServiceController@index')->name('Front.service');
        Route::get('/serviceText/{id}', 'ServiceController@serviceText')->name('Front.serviceSingle');
        Route::get('/contact', 'ContactController@index')->name('Front.contact');
        Route::get('/product', 'ProductController@index')->name('Front.product');
        Route::get('/productText/{id}', 'ProductController@productText')->name('Front.productSingle');
        Route::get('/faq', 'FaqController@index')->name('Front.faq');

//        =============================ActivationHamta===============================
        Route::get('/hamta', 'ActivationHamtaController@index')->name('ActivationHamta.index');
        Route::post('/checkModelDeviceActivationHamta', 'ActivationHamtaController@checkModelDeviceActivationHamta')->name('ActivationHamta.checkModelDeviceActivationHamta');
        Route::post('/sendOtpActivationHamta', 'ActivationHamtaController@sendOtpActivationHamta')->name('ActivationHamta.sendOtpActivationHamta');
        Route::post('/checkAndSaveOtpActivationHamta', 'ActivationHamtaController@checkAndSaveOtpActivationHamta')->name('ActivationHamta.checkAndSaveOtpActivationHamta');
        Route::post('/hamta/send-sms', 'ActivationHamtaController@resendSms')->name('ActivationHamta.resendSms');
        Route::get('/ussdHamta', 'ActivationHamtaController@ussdHamta')->name('ActivationHamta.ussdHamta');

//        =============================ActivationHamta===============================




        Route::post('contactStore', 'ContactController@contactStore')->name('contacts.store');
        Route::post('commentsStore/{id}', 'BlogController@commentsStore')->name('comments.store');
        Route::post('commentsStoreProduct/{id}', 'ProductController@commentsStoreProduct')->name('commentsProduct.store');


            Route::prefix('account')->middleware('CheckUserAccount')->group(function () {
            Route::get('/', 'AccountController@index')->name('Front.account.index');
            Route::get('/editProfile', 'AccountController@editProfile')->name('Front.account.editProfile');

            Route::post('/updateProfile', 'AccountController@updateProfile')->name('Front.account.updateProfile');
            Route::get('/address', 'AddressController@index')->name('Front.address.index');
            Route::post('/addressStore', 'AddressController@store')->name('Front.address.store');
            Route::get('/editAddress/{id}', 'AddressController@editAddress')->name('Front.account.editAddress');
            Route::post('/addressUpdate/{id}', 'AddressController@Update')->name('Front.address.Update');
            Route::post('/addressDelete/{id}', 'AddressController@delete')->name('Front.address.delete');
            Route::get('/favorite', 'FavoriteController@list')->name('Front.favorite.list');
            Route::post('/deleteFavorite/{id}', 'FavoriteController@delete')->name('Front.favorite.delete');
            Route::get('/listOrder', 'AccountController@listOrder')->name('Front.order.list');
            Route::get('/detailOrder/{orderId}', 'AccountController@detailOrder')->name('Front.order.detail');

            Route::get('/listTicket', 'TicketController@index')->name('Front.ticket.list');
            Route::get('/newTicket', 'TicketController@ticketsNew')->name('Front.ticket.new');

            Route::get('/showTicket/{id}', 'TicketController@show')->name('Front.ticket.show');
            Route::post('/answerStore/{id}', 'TicketController@answerStore')->name('Front.ticket.answer');
            Route::post('/ticketStore', 'TicketController@ticketsStore')->name('Front.ticket.ticketStore');
            Route::get('/ticketGetFilds/{id}', 'TicketController@getFilds')->name('Front.ticket.ticketGetFilds');


        });



        Route::prefix('carts')->group(function () {
            Route::get('insertCart/{product_id?}/{count?}', 'CartController@insertCart')->name('Front.carts.insertCart');
            Route::get('index', 'CartController@index')->name('Front.carts.index');

            Route::get('shipping', 'CartController@shipping')->middleware('auth')->name('Front.carts.shipping');
            Route::get('deleteCart/{product_id?}', 'CartController@deleteCart')->name('Front.carts.deleteCart');
            Route::get('shipment/{shipment_id?}/{city_id?}', 'CartController@shipment')->name('Front.carts.shipment');
            Route::get('setAddress/{address_id?}', 'CartController@setAddress')->name('Front.carts.setAddress');
            Route::get('payment', 'CartController@payment')->name('Front.carts.payment');
            Route::get('paymentPrice/{type}', 'PaymentController@paymentPrice')->name('Front.carts.paymentPrice');
            Route::get('verify', 'PaymentController@verify')->name('Front.carts.verify');
            Route::get('verifyZarinpal', 'PaymentController@verifyZarinpal')->name('Front.carts.verifyZarinpal');
            Route::get('discountCode/{discount_code?}', 'CartController@discountCode')->name('Front.carts.discountCode');
            Route::get('updateCart/{product_id?}/{event?}', 'CartController@updateCart')->name('Front.carts.updateCart');
        });


    });


