<?php
    $userId = $_GET['uId'];
    $data = array();
    //$data['success'] = true;
?>
<h4>Username Setting</h4>
<!--the first tab to load is the username setting form...-->                                                            
<form role="form">    
    <div class="form-group">
        <label for="email">Current username</label>
        <input ng-model="usernameSettingForm.userId" class="form-control" id="userId" type="text" value="<?php echo $userId;?>"/>
        <input ng-model="usernameSettingForm.currentUsername" class="form-control" id="currentUsername" type="text" placeholder="Email..." disabled/>
    </div>
    <div class="form-group">        
        <label>New Username</label>
        <input ng-model="usernameSettingForm.newUsername" class="form-control" id="newUsername" type="text" placeholder="Enter new username..." required=""/>
    </div>
    <div class="form-group">
        <label for="username">Enter Current Email</label>                    
        <input ng-model="usernameSettingForm.currentEmail" class="form-control" id="currentEmail" type="email" placeholder="Enter your current email address..." required=""/>
    </div>
    <div class="form-group">
        <label>Enter Password</label>
        <input ng-model="usernameSettingForm.password" class="form-control" id="password" type="password" required=""/>
    </div>

    <button type="button" class="btn btn-primary" ng-click="updateUsernameSetting();">Update Username</button>
    <button type="reset" class="btn btn-primary">Reset</button>    
</form>

