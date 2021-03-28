<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method="post" >
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="text" name="description">
                            </div>
                            <div class="form-group">
                                <label>Вопрос</label>
                                <textarea class="form-control" rows="10" name="quiz"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Правильный ответ</label>
                                <input class="form-control" type="textarea" rows="3" name="trueanswer">
                            </div>
                            <div class="form-group">
                                <label>A</label>
                                <input class="form-control" type="textarea" rows="3" name="A">
                            </div>
                            <div class="form-group">
                                <label>B</label>
                                <input class="form-control" type="textarea" rows="3" name="B">
                            </div>
                            <div class="form-group">
                                <label>C</label>
                                <input class="form-control" type="textarea" rows="3" name="C">
                            </div>
                            <div class="form-group">
                                <label>D</label>
                                <input class="form-control" type="textarea" rows="3" name="D">
                            </div>
                           
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>