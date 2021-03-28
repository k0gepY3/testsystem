<div class="container">
        <div class="col-lg-8 col-md-10 mx-auto">
            <hr>
            <?php if (isset($result)): ?>
                <p style="text-align: center;"><?='Ваш результат: '.$result?></p>
            <?php endif ?>
            <?php if (isset($quiz)): ?>
                <p style="text-align: center;"><?=$quiz['0']['id'].".".$quiz['0']['quiz'] ?></p>
                <div>
                   <form class="" action="/" method="post" >
                    <select name="quiz" class="form-control">
                        <option value="A"><?=$quiz['0']['A'] ?></option>
                        <option value="B"><?=$quiz['0']['B'] ?></option>
                        <option value="C"><?=$quiz['0']['C'] ?></option>
                        <option value="D"><?=$quiz['0']['D'] ?></option>
                    </select>
                    <button type="submit" name="button" class="send btn btn-success">Отправить</button>
                </form>
                <div id="information"></div>
            </div>
        <?php endif ?>
        <form action="/" method="post">
            <button type="submit" name="reset" class="reset btn btn-primary">Очистить</button>
        </form>
    </div>
<div class="clearfix">
</div>
</div>
</div>
