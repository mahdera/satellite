<?php
    require_once '../core/init.php';
    $userId = $_GET['uId'];
    //get the user object using this userId key
    $user = new User();
    $fetchedUser = $user->getUserUsingUserId($userId);
?>
<h4>Email Setting</h4>
<!--the first tab to load is the username setting form...-->                                                            
<form role="form" ng-controller="SettingControllerViaClick">    
    <div class="form-group">
        <label for="email">Current Email</label>
        <input ng-model="settingForm.userId" class="form-control" id="userId" type="hidden" value="<?php echo $userId;?>" />
        <input ng-model="settingForm.currentEmail" class="form-control" id="currentEmail" type="text" value="<?php echo $fetchedUser->email;?>" disabled/>
    </div>
    <div class="form-group">        
        <label>New Email</label>
        <input ng-model="settingForm.newEmail" class="form-control" id="newEmail" type="email" placeholder="Enter new email address..." required=""/>
    </div>
    <div class="form-group">
        <label for="username">Enter Username</label>                    
        <input ng-model="settingForm.username" class="form-control" id="username" type="text" placeholder="Enter your username..." required=""/>
    </div>
    <div class="form-group">
        <label>Enter Password</label>
        <input ng-model="settingForm.password" class="form-control" id="password" type="password" required=""/>
    </div>

    <button type="button" class="btn btn-primary" ng-click="updateEmailSetting();">Update Email</button>
    <button type="reset" class="btn btn-primary">Reset</button>    
</form>
