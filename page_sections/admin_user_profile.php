<?php 
    require_once '../core/init.php';
?>
<h4>User Profile Setting</h4>
<form role="form" ng-controller="AdminUserProfileFormController">    
    <div class="form-group">        
        <label>User Type</label>
        <select class="form-control" ng-model="adminProfileForm.usertype">
            <option value="Administrator">Administrator</option>
            <option value="Member">Member</option>            
        </select>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input ng-model="adminProfileForm.userid" type="hidden" id="userid"/>
        <input ng-model="adminProfileForm.username" class="form-control" id="username" type="text" placeholder="Username..." disabled/>
    </div>
    <div class="form-group">
        <label>Full Name</label>
        <input ng-model="adminProfileForm.fullname" class="form-control" id="fullname" value="Mahder"/>
    </div>
    <div class="form-group">
        <label>User Status</label>
        <select class="form-control" ng-model="adminProfileForm.userstatus">
            <option value="Approved">Approved</option>
            <option value="Pending">Pending</option>            
            <option value="Terminated">Terminated</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input ng-model="adminProfileForm.email" class="form-control" id="email" type="text" placeholder="Email..." disabled/>
    </div>
    <div class="form-group">
        <label>User created date</label>
        <input ng-model="adminProfileForm.usercreatedate" class="form-control" id="usercreatedate" placeholder="User create date..." disabled=""/>
    </div>    
    <div class="form-group">
        <label for="modificationdate">Modification Date</label>
        <input ng-model="adminProfileForm.modificationdate" class="form-control" id="modificationdate" type="text" placeholder="Email..." disabled/>
    </div>    
    
    <button type="button" class="btn btn-primary" ng-click="updateAdminProfile();">update</button>
    <button type="reset" class="btn btn-primary">Reset</button>    
</form>

