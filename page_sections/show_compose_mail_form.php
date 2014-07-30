<div class="panel-body">
    <div class="tab-pane fade in active">
        <h4>New Mail</h4>
        <!--the first tab to load is the username setting form...-->                                                            
        <form role="form">    
            <div class="form-group">
                <label for="userId">To</label>
                <input ng-model="composeMailForm.userId" class="form-control" id="userId" type="hidden"/>
                <input ng-model="composeMailForm.mailTo" class="form-control" id="mailTo" type="text" placeholder="Enter email addres(s) separated by comma if more than one..." />
            </div>
            <div class="form-group">        
                <label>Title</label>
                <input ng-model="composeMailForm.mailTitle" class="form-control" id="mailTitle" type="text" placeholder="Enter mail title..." required=""/>
            </div>            
            <div class="form-group">
                <label>Your Message</label>
                <textarea ng-model="composeMailForm.mailContent" 
                class="form-control jqte-test" id="mailContent" required=""></textarea>
            </div>
            <div class="error-text">
                {{message}}
            </div>
            <button type="button" class="btn btn-primary" ng-click="sendMail();">Send
            </button>
            <button type="reset" class="btn btn-primary">Reset</button>    
        </form>
        
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('.jqte-test').jqte();         
        // settings of status
        var jqteStatus = true;
        $(".status").click(function()
        {
            jqteStatus = jqteStatus ? false : true;
            $('.jqte-test').jqte({"status" : jqteStatus})
        });
    });//end document.ready function
</script>

