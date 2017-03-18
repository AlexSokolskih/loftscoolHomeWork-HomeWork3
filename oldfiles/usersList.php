
    <div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
      <h2>Информация выводится из базы данных</h2>
      <table class="table table-bordered">
        <tr>
          <th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Фотография</th>
          <th>Действия</th>
        </tr>
        <tr>
          <td>vasya99</td>
          <td>Вася</td>
          <td>14</td>
          <td>Эксперт в спорах в интернете</td>
          <td><img src="http://lorempixel.com/people/200/200/" alt=""></td>
          <td>
            <a href="">Удалить пользователя</a>
          </td>
        </tr>
        <?php
        $userslist =  $dataBase->getUsersList();
        foreach ($userslist  as  $value) {

          echo '<tr>
            <td>'.$value['login'].'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['age'].'</td>
            <td>'.$value['description'].'</td>
            <td><img src="/img/'.$value['photo'].'" alt=""></td>
            <td>    
              <a href="index.php?page=usersList&event=deleteuser&userid='.$value['id'].'">Удалить пользователя</a>
              <a href="index.php?page=userEditing&event=editinguser&userid='.$value['id'].'">редактировать пользователя</a>
            </td>
          </tr>';
        }

        ?>

      </table>

    </div><!-- /.container -->



