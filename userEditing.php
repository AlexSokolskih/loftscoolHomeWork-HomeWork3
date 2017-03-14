

<div class="container">

    <div class="form-container">
        <form class="form-horizontal" action="index.php?page=usersList&event=userEditing" method="post">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10 ">
                    <input type="text" class="form-control" id="name" placeholder="Имя" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="age" placeholder="Возраст" name="age">
                </div>
            </div>
            <div class="form-group">
                <label for="decscription" class="col-sm-2 control-label">о себе</label>
                <div class="col-sm-10">
                    <textarea name="decscription" id="decscription" cols="45" rows="10" placeholder="О себе"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Фото</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto" placeholder="Фотография" name="foto">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.php?page=mainPage">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->