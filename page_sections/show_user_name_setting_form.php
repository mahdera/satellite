<?php
    require_once '../core/init.php';
    $userId = Session::get(Config::get('session/session_name'));    
?>
<div class="panel-body">
    <div class="tab-pane fade in active">
        <h4>Username Setting</h4>
        <!--the first tab to load is the username setting form...-->                                                            
        <form role="form">    
            <div class="form-group">
                <label for="userId">Current username</label>
                <input ng-model="usernameSettingForm.userId" class="form-control" id="userId" type="hidden"/>
                <input ng-model="usernameSettingForm.currentUsername" class="form-control" id="currentUsername" type="text" placeholder="Enter your current username..." />
            </div>
            <div class="form-group">        
                <label>New Username</label>
                <input ng-model="usernameSettingForm.newUsername" class="form-control" id="newUsername" type="text" placeholder="Enter the new username..." required=""/>
            </div>
            <div class="form-group">
                <label for="currentEmail">Enter Current Email</label>                    
                <input ng-model="usernameSettingForm.currentEmail" class="form-control" id="currentEmail" type="email" placeholder="Enter your current email address..." required=""/>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input ng-model="usernameSettingForm.password" class="form-control" id="password" type="password" required=""/>
            </div>
            <div class="error-text">
                {{message}}
            </div>
            <button type="button" class="btn btn-primary" ng-click="updateUsernameSetting();">Update Username</button>
            <button type="reset" class="btn btn-primary">Reset</button>    
        </form>
        
    </div>
</div>

