<?php
namespace src\lib\php\games\survive;

/**
 * Главный класс игры Выжить
 */

 use \src\lib\php\ContainerObject;
 use \class\nonBD\accordionBootstrap\AccordionContainer;

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
         * Класс обновляет данные пользователя, если их нет
         * в переменных сессий.
         * Если пользователя нет в базе данных, то создает его,
         * локация при этом становится -1
         */
        new DataUser();

        /**
         * зарегистрировать объект - игра-Выжить в контейнере объектов
         * пока не понятно пригодится ли это...
         */
         ContainerObject::getInstance()
                          ->setProperty('SurviveFacade',$this);
         /**
          * создать аккордион контейнер-диалогов
          * и поместить его в контейнер объектов, для дальнейшего использования
          */
         $accordion = new AccordionContainer();
         ContainerObject::getInstance()
                          ->setProperty('AccordionContainer',$accordion);
        /**
         * создается объект путешествия и передается в него 
         * ссылка на этот объект.
         * ссылка $this передается для того, чтобы можно было
         * из класса Adventure манипулировать свойствами
         * этого класса.
         */
        $this->adventure = new Adventure($this);

    }

    /**
     * возвращает класс, который необходимо прикрепить к 
     * тегу body. Возвращается текстовое название класса, 
     * которое потом передается в класс HeaderFacade.
     * Класс HeaderFacade приписывает данный стилевой класс
     * к тегу боди. 
     * Используется этот трюк для изменения фона тега body, 
     * когда пользователь вошел в игру.
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
