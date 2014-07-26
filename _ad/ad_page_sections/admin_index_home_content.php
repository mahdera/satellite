<div id="home-content1" ng-app="adminLoginApp" class="left mobile-collapse" style="text-align: center;width: 100%">
    <h2 class="replace">Sign in to continue to Satellite</h2>
    <div  ng-controller="AdminLoginController">                 
        <form name="formData" id="contact_form" method="post" novalidate="" role="form">
            <div style="width: 50%;margin: 0 auto;" class="google-login-form">
                <br/><br/><br/><br/><br/>
                <div class="form_field">
                    <img src="images/admin_avatar.png" width="20%" alt="Admin avatar"/>
                </div>
                <div class="form_field">                
                    <input type="text" required ng-minlength="3" ng-maxlength="8" id="username" class="text round_6" size="44" placeholder="Username..."
                           ng-model="formData.username"/>
                </div>
                <div class="form_field">                
                    <input type="email" required id="email" class="text round_6" size="44" placeholder="Email..."
                           ng-model="formData.email"/>
                </div>
                <div class="form_field">                
                    <input type="password" required ng-model="formData.password" id="password" class="text round_6" size="44" placeholder="Password..."/>
                </div>  
                <div ng-show="message" class="error-text">
                    {{message}}
                </div>
                <div class="form_field">                
                    <input type="button" class="orange large fancy" value="Sign in" style="width: 53%"
                           ng-click="validateForm();"/>                   
                </div>
            </div>
        </form>        
        <script type="text/javascript" src="ad_page_sections/admin_angular_js/angular.js"></script>        
        <script type="text/javascript" src="ad_page_sections/admin_angular_js/adminLoginPageApp.js"></script>
        <script type="text/javascript" src="ad_page_sections/admin_angular_js/controllers/AdminLoginController.js"></script>        
    </div>
</div>
