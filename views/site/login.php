    <form id="login-form" class="form-horizontal" action="/index.php?r=site%2Fdeal" method="post" role="form">
<input type="hidden" name="_csrf" value="aFRPOUREYW9cFzkJHRAMJwUwDWgGFBkiCTUKUywXKgglPwZwN3MRBQ==">
        <div class="form-group field-loginform-username required">
<label class="col-lg-1 control-label" for="loginform-username">Username</label>
<div class="col-lg-3"><input type="text" id="loginform-username" class="form-control" name="LoginForm[username]" autofocus></div>
<div class="col-lg-8"><div class="help-block help-block-error "></div></div>
</div>
        <div class="form-group field-loginform-password required">
<label class="col-lg-1 control-label" for="loginform-password">Password</label>
<div class="col-lg-3"><input type="password" id="loginform-password" class="form-control" name="LoginForm[password]"></div>
<div class="col-lg-8"><div class="help-block help-block-error "></div></div>
</div>
        <div class="form-group field-loginform-rememberme">
<div class="col-lg-offset-1 col-lg-3"><input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked> <label for="loginform-rememberme">Remember Me</label></div>
<div class="col-lg-8"><div class="help-block help-block-error "></div></div>
</div>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <button type="submit" class="btn btn-primary" name="login-button">Login</button>            </div>
        </div>

    </form>