<div id='container'>
    <div class="login-form padding20 block-shadow">
        <?php echo form_open('Gateway/login/');?>	
            <h1 class="text-light">Login to Elegent Gradebook</h1></br>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">User email:</label>
                <input type="text" name="txt_username" id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">User password:</label>
                <input type="password" name="txt_password" id="user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary">Login to...</button>
                <button type="button" class="button link">Forgot Password</button>
                <button type="button" class="button link">Sign Up</button>
            </div>
        </form>
    </div>
</div>