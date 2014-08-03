<div>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <?php
        $userId = Session::get(Config::get('session/session_name'));
        $user = new User();        
        $userFullName = $user->getUserUsingUserId($userId);

        $userFullName = (isset($userFullName) ? $userFullName->user_full_name : 'Administrator');
    ?>
    <a class="navbar-brand" ng-href="">Satellite Admin | <span style="color: black;"><?php echo $userFullName;?> logged in</span></a>
    
</div>
<!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown" ng-controller="HeaderMailDropdownController">
        <a class="dropdown-toggle" data-toggle="dropdown" ng-href="">
            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <?php
            //now get the first four inbox mails from the database
            $mail = new Mail();
            $inboxMailList = $mail->getAllMailsTo($userId);
            $user = new User();
            $today = date("Y-m-d h:i:sa");
            if(!empty($inboxMailList)){
        ?>
        <ul class="dropdown-menu dropdown-messages">
            <?php            
                $rows = $inboxMailList->getResults();
                foreach($rows as $row){
                    //find the sender user...
                    $senderUser = $user->getUserUsingUserId($row->from_user_id);
                    $mailSentDate = $row->mail_date;
                    $diff = abs(strtotime($today) - strtotime($mailSentDate));
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            ?>
                <li>
                    <a href="#">
                        <div>
                            <strong><?php echo $senderUser->user_full_name;?></strong>
                            <span class="pull-right text-muted">
                            <em><?php echo $days;?></em>
                            </span>
                        </div>
                        <div style="display:inline-block; overflow:hidden; width:250px; height:45px;">
                            <?php echo $row->mail_content;?>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
            <?php
                }//end foreach loop
            ?>
               <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>             
        </ul>
        <?php            
            }//end if
        ?>
        <!-- /.dropdown-messages -->
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" ng-href="">
            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                        <span class="pull-right text-muted small">12 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-tasks fa-fw"></i> New Task
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-alerts -->
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" ng-href="">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li>
                <a ng-href="#/view/adminProfile/<?php echo $userId;?>" >
                    <i class="fa fa-user fa-fw"></i> 
                        User Profile
                </a>
            </li>
            <li>
                <a ng-href="#/view/setting/<?php echo $userId;?>" >
                    <i class="fa fa-gear fa-fw"></i> 
                        Settings - Email
                </a>
            </li>
            <li>
                <a ng-href="#/view/setting/username/<?php echo $userId;?>" >
                    <i class="fa fa-gear fa-fw"></i> 
                        Settings - Username
                </a>
            </li>
            <li>
                <a ng-href="#/view/setting/password/<?php echo $userId;?>" >
                    <i class="fa fa-gear fa-fw"></i> 
                        Settings - Password
                </a>
            </li>
            <li class="divider"></li>
            <li ng-controller="AdminLogoutController">
                <a ng-click="logout();">
                    <i class="fa fa-sign-out fa-fw"></i> 
                        Logout
                </a>
            </li>
</ul>
<!-- /.dropdown-user -->
    </li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->
