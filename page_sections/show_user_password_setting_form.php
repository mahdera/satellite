<?php
    require_once '../core/init.php';
    $userId = Session::get(Config::get('session/session_name'));    
?>
<div class="panel-body">
    <div class="tab-pane fade in active">
        <h4>Password Setting</h4>
        <!--the first tab to load is the username setting form...-->                                                            
        <form role="form">    
            <div class="form-group">
                <label for="userId">Current username</label>
                <input ng-model="passwordSettingForm.userId" class="form-control" id="userId" type="hidden"/>
                <input ng-model="passwordSettingForm.currentUsername" class="form-control" id="currentUsername" type="text" placeholder="Enter your current username..." />
            </div>
            <div class="form-group">
                <label for="currentEmail">Enter Current Email</label>                    
                <input ng-model="passwordSettingForm.currentEmail" class="form-control" id="currentEmail" type="email" placeholder="Enter your current email address..." required=""/>
            </div>
            <div class="form-group">
                <label>Enter Current Password</label>
                <input ng-model="passwordSettingForm.currentPassword" class="form-control" id="currentPassword" type="password" required=""/>
            </div>
            <div class="form-group">        
                <label>Enter New Password</label>
                <input ng-model="passwordSettingForm.newPassword" class="form-control" id="newPassword" type="password"  required=""/>
            </div>
            <div class="form-group">        
                <label>Enter Password Again (Confirmation)</label>
                <input ng-model="passwordSettingForm.confirmationPassword" class="form-control" id="confirmationPassword" type="password" required=""/>
            </div>            
            
            <div class="error-text">
                {{message}}
            </div>
            <button type="button" class="btn btn-primary" ng-click="updatePasswordSetting();">Update Password</button>
            <button type="reset" class="btn btn-primary">Reset</button>    
        </form>
        
    </div>
</div>

