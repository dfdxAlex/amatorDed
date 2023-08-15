<?php
namespace src\lib\php\games\survive;

/**
 * Главный класс игры Выжить
 */

 class GameSurvive
 {
    /**
     * свойство содержит имя класса, которое будет передаваться 
     * в body через класс Header
     * Используется для того, чтобы менять картинку фона в зависимости
     * оттого, где находится персонаж
     */
    private $backgroundForBody = 'non';
    private $adventure;

    public function __construct()
    {
        /**
         * Класс проверяет существуют ли таблицы, необходимые
         * для игры, если их нет, то создает их.
         */
        new FirstStart();

        /**
         * зарегистрировать объект - игра-Выжить в контейнере объектов
         */
         \src\lib\php\ContainerObject::getInstance()->setProperty('SurviveFacade',$this);
         
        /**
         * создается объект путешествия и передается в него 
         * ссылка на этот объект.
         */
        $this->adventure = new Adventure($this);
    }

    // /**
    //  * метод работает, если игрок находится на улице
    //  */
    // public function adventure(ILocationForUser $in)
    // {

    // }

    /**
     * возвращает класс, который необходимо прикрепить к 
     * тегу body
     */
    public function getBGI()
    {
        return $this->backgroundForBody;
    }

    public function setBGI($bgi)
    {
        $this->backgroundForBody = $bgi;
    }
 }
