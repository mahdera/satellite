<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Notifications Panel
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="list-group">
                      
            <a ng-href="#/view/mail/inbox/<?php echo $userId;?>" class="list-group-item">
                <i class="fa fa-envelope fa-fw"></i> Mail Inbox
                <span class="pull-right text-muted small"><em>27 minutes ago</em>
                </span>
            </a>
            <a ng-href="#/view/mail/sent/<?php echo $userId;?>" class="list-group-item">
                <i class="fa fa-bolt fa-fw"></i> Sent Mail
                <span class="pull-right text-muted small"><em>11:13 AM</em>
                </span>
            </a>
            <a ng-href="#/view/mail/compose/<?php echo $userId;?>" class="list-group-item">
                <i class="fa fa-upload fa-fw"></i> Compose Mail
                <span class="pull-right text-muted small"><em>11:32 AM</em>
                </span>
            </a>
            <a ng-href="#" class="list-group-item">                
                <i class="fa fa-tasks fa-fw"></i> New Members
                <span class="pull-right text-muted small">4 minutes ago</span>                
            </a>
        
            <a ng-href="#" class="list-group-item">
                <i class="fa fa-comment fa-fw"></i> New Comment
                <span class="pull-right text-muted small"><em>4 minutes ago</em>
                </span>
            </a>  
            
        </div>
        <!-- /.list-group -->
        <a ng-href="#" class="btn btn-default btn-block">View All Alerts</a>
    </div>
    <!-- /.panel-body -->
</div>