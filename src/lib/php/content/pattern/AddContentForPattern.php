<?php
namespace src\lib\php\content\pattern;

class AddContentForPattern
{
    public function __construct()
    {
        /**
         * Конструктор выводит форму для добавления контента
         * в раздел паттернов.
         * Форма должна появляться тогда, когда навигационное 
         * меню выкинет в гет запросс переменную addcontent
         */
        if (isset($_GET['addcontent']))
            echo '
            <form action="#">
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Get</span>
            <input name="getName" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon2">Link for Git</span>
              <input name="linkForGit" type="url" class="form-control" aria-label="Recipients username" aria-describedby="basic-addon2">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon22">Link for Video</span>
              <input name="linkForVideo" type="url" class="form-control" aria-label="Recipients username" aria-describedby="basic-addon22">
            </div>

            <div class="input-group">
              <span class="input-group-text">Content</span>
              <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
            </div>
              <input type="submit" name="push" class="btn btn-outline-secondary" id="button-addon1">
            </form>
        ';
    }
}
