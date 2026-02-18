<?php
use App\Http\Controllers\Admin\MembershipUpgradeController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\ConversionController;
use App\Http\Controllers\Admin\CreditDebitController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\FiatBalanceController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ManageEscrowController;
use App\Http\Controllers\Admin\ManageLoanController;
use App\Http\Controllers\Admin\ManagePaymentController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\SendEmailController;
// use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\WithdrawalController;
use Illuminate\Support\Facades\Route;









     Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {
  
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    });


    Route::middleware('auth:admin')->group(function () {

      // Membership Upgrades
      Route::get('/upgrades', [MembershipUpgradeController::class, 'adminIndex'])->name('upgrades.index');
      Route::post('/upgrades/{id}/approve', [MembershipUpgradeController::class, 'adminApprove'])->name('upgrades.approve');
      Route::post('/upgrades/{id}/reject', [MembershipUpgradeController::class, 'adminReject'])->name('upgrades.reject');
          Route::post('/activity/{id}/edit', [\App\Http\Controllers\Admin\ActivityController::class, 'edit'])->name('activity.edit');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::get('/users', [ManageUserController::class, 'ManageUsers'])->name('manage.users');
        Route::post('/users', [ManageUserController::class, 'store'])->name('add.user');
        Route::get('/show', [ManageUserController::class, 'ShowUsers'])->name('show');
        Route::get('/profile/{id}/', [ManageUserController::class, 'userProfile'])->name('profile');
          // Impersonate user (admin logs in as user)
          Route::get('/impersonate/{id}', [ManageUserController::class, 'impersonate'])->name('impersonate');
          Route::get('/stop-impersonate', [ManageUserController::class, 'stopImpersonate'])->name('stop.impersonate');

        Route::post('/update-user/{id}', [ManageUserController::class, 'updateUser'])->name('update.user');
        Route::delete('/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('delete');

        // Support chats routes
        Route::get('/support/chats', [\App\Http\Controllers\Admin\SupportController::class, 'index'])->name('support.chats');
        Route::get('/support/chat/{userId}', [\App\Http\Controllers\Admin\SupportController::class, 'chat'])->name('support.chat');
        Route::get('/support/fetch/{userId}', [\App\Http\Controllers\Admin\SupportController::class, 'fetch'])->name('support.fetch');
        Route::post('/support/send/{userId}', [\App\Http\Controllers\Admin\SupportController::class, 'send'])->name('support.send');

      // User Activities
      Route::get('/user/{id}/activities', [\App\Http\Controllers\Admin\ActivityController::class, 'yindex'])->name('user.activities');
      Route::post('/user/{id}/activities', [\App\Http\Controllers\Admin\ActivityController::class, 'store'])->name('user.activities.store');
      Route::delete('/activity/{id}', [\App\Http\Controllers\Admin\ActivityController::class, 'destroy'])->name('activity.delete');
   

      // Modal update balances (for user.blade.php)
  Route::post('/update-balances/{id}', [\App\Http\Controllers\Admin\BalanceController::class, 'update'])->name('update.balances');

   
      });


  
  Route::post('/add-deposit', [DepositController::class, 'AddUserDeposit'])->name('add.deposit');

    Route::post('/add-conversion', [DepositController::class, 'AddUserConversion'])->name('add.conversion');

// Approve a withdrawal
Route::post('/admin/withdrawal/{id}/approve', [WithdrawalController::class, 'approve'])
    ->name('withdrawal.approve');
   

// Decline a withdrawal
Route::post('/admin/withdrawal/{id}/decline', [WithdrawalController::class, 'decline'])
    ->name('withdrawal.decline');


 // -----------------------------------------------------------------
    // Admin Password
    // -----------------------------------------------------------------
    Route::get('change-password', [AdminController::class, 'adminChangePassword'])->name('change.password');
    Route::post('update-password', [AdminController::class, 'adminUpdatePassword'])->name('update.password');
  
  Route::prefix('admin/mail')->group(function() {
    Route::get('/compose/{user}', [MailController::class, 'compose'])->name('mail.compose');
    Route::post('/send', [MailController::class, 'send'])->name('users.send-mail');
    Route::get('/history', [MailController::class, 'history'])->name('admin.mail.history');



      // -----------------------------------------------------------------
    // Admin Mail
    // -----------------------------------------------------------------
    Route::get('send-mail/{id}', [AdminController::class, 'sendUserMail'])->name('send-user-mail');
    Route::post('send-user-email', [AdminController::class, 'sendUserEmail'])->name('send-user-email');
    Route::get('send-test-mail', [AdminController::class, 'sendTestMail'])->name('user.mail');


//DepositController 
   Route::post('/approve-deposit/{id}', [DepositController::class, 'ApproveDeposit'])->name('approve-deposit');
  Route::post('/decline-deposit/{id}', [DepositController::class, 'DeclineDeposit'])->name('decline-deposit');

  //transaction controller
  // Route::get('user_transactions', [TransactionController::class, 'usersTransaction'])->name('transactions');
    Route::post('add-transaction/{id}', [ManageUserController::class, 'addTransaction'])
    ->name('add.transaction');

     Route::post('withdrawal_tax_code/{id}', [ManageUserController::class, 'WithdrawalTaxCode'])
    ->name('withdrawal.tax.code');

        Route::post('withdrawal_status/{id}', [ManageUserController::class, 'WithdrawalStatus'])
    ->name('withdrawal.status');

            Route::post('convert_status/{id}', [ManageUserController::class, 'ConvertStatus'])
    ->name('convert.status');

              Route::post('suspend-user/{id}', [ManageUserController::class, 'SuspendUser'])
    ->name('suspend.user');

     // Change user password (for admin)
     Route::post('/update-user-password/{id}', [ManageUserController::class, 'updateUserPassword'])->name('update.user.password');


  
//Manage Payment
   Route::get('manage-payment', [ManagePaymentController::class, 'ManagePayment'])->name('manage.payment');

   // Send Mail

Route::get('/send-email', [SendEmailController::class, 'index'])->name('send.email');
Route::post('/send-email', [SendEmailController::class, 'send'])->name('send.email.post');


//wallet update


    Route::post('/choose-wallet', [WalletController::class, 'chooseWallet'])->name('choose.wallet');

    }); // Close Route::middleware('auth:admin')->group

  }); // Close Route::middleware(['web'])->prefix('admin')->name('admin.')->group
