<div class="left" id="content">
<div style="color: red; font-size: 14px; padding: 20px; margin: 0 auto; display: block; width:400px;">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Авторизация</h2>

  <form class="login-container" action="/auth" method="post">
    
    <p><input type="email" name="email" placeholder="E-mail"/></p>
    <p><input type="password" name="password" placeholder="Пароль"/></p>
    <p><input type="submit" name="submit" value="Вход" /></p>
    
    <div style="font-size: 14px; color: #777;">
      <p align="center"> У вас нет аккаунта? <a href="/register">Зарегистрируйтесь.</a></p>
    </div>
    
  </form>
</div>
</div>

