<div class="blur-bg-overlay"></div>
<div class="form-popup">
    <span class="close-btn material-symbols-rounded">close</span>
    <div class="form-box login">
        <div class="form-content">
            <h2 id="login-text1"><?php echo htmlspecialchars(translate('login')); ?></h2>
            <form method="post">
                <div class="input-field">
                    <input type="text" name="username" required>
                    <label id="type-email1"><?php echo htmlspecialchars(translate('username')); ?></label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label id="type-passw1"><?php echo htmlspecialchars(translate('password')); ?></label>
                </div>
                <button id="loginBtn1" type="submit" name="login"><?php echo htmlspecialchars(translate('loginBtn')); ?></button>
            </form>
            <div id="bottom1" class="bottom-link">
                <?php echo htmlspecialchars(translate('not_registered')); ?>
                <a href="#" id="signup-link"><?php echo htmlspecialchars(translate('signup')); ?></a>
            </div>
        </div>
    </div>
    <div class="form-box signup">
        <div class="form-content">
            <h2 id="login-text2"><?php echo htmlspecialchars(translate('signup')); ?></h2>
            <form method="post">
                <div class="input-field">
                    <input type="text" name="username" required>
                    <label id="type-email2"><?php echo htmlspecialchars(translate('username')); ?></label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label id="type-passw2"><?php echo htmlspecialchars(translate('password')); ?></label>
                </div>
                <button id="loginBtn2" type="submit" name="signup"><?php echo htmlspecialchars(translate('signupBtn')); ?></button>
            </form>
            <div id="bottom2" class="bottom-link">
                <?php echo htmlspecialchars(translate('already_registered')); ?>
                <a href="#" id="login-link"><?php echo htmlspecialchars(translate('login')); ?></a>
            </div>
        </div>
    </div>
</div>
<link rel="icon" type="image/x-icon" href="../svg/logo.svg">
<link rel="stylesheet" href="../styles/global.css">