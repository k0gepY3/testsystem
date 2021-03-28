<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">Вход в панель Администратора</div>
        <div class="card-body">
            <form action="/login" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </form>
            <div class="text-center">
                <small>&copy; <?php echo date('Y')?> | k0gepY3</small>
            </div>
        </div>
    </div>
</div>