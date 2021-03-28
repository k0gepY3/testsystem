<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" type="text"  name="description"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Вопрос</label>
                                <textarea class="form-control" type="text"  name="quiz"><?php echo htmlspecialchars($data['quiz'], ENT_QUOTES); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Правильный ответ</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['trueanswer'], ENT_QUOTES); ?>" name="trueanswer">
                            </div>
                            <div class="form-group">
                                <label>A</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['A'], ENT_QUOTES); ?>" name="A">
                            </div>
                            <div class="form-group">
                                <label>B</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['B'], ENT_QUOTES); ?>" name="B">
                            </div>
                            <div class="form-group">
                                <label>C</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['C'], ENT_QUOTES); ?>" name="C">
                            </div>
                            <div class="form-group">
                                <label>D</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['D'], ENT_QUOTES); ?>" name="D">
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>