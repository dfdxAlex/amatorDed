<?php
namespace src\lib\php\games\survive;

/**
 * Класс отвечающий за путешествие и связанные с этим действия
 * 
 * Вызывается отсюда src\lib\php\games\survive\ GameSurvive
 */
 
 use \src\lib\php\ContainerObject;
 use \src\lib\php\games\survive\state\State;
 use \src\lib\php\games\survive\location\LocationFirst;
 use \src\lib\php\games\survive\state\CorrectState;
 use \src\lib\php\games\survive\state\wallet\WalletViev;
 use \src\lib\php\games\survive\state\bag\Bag;
 use \src\lib\php\games\survive\state\bag\BagViev;
 use \src\lib\php\games\survive\state\bag\EventBag;
 use \src\lib\php\games\survive\state\bag\Energy;

 class Adventure
 {
    private $gameSurvive;
    /**
     * Данный класс вызывается главным классом и выполняет 
     * разные задачи для него. Чтобы пользоваться ресурсами
     * главного класса, в этот класс передается ссылка на 
     * главный класс через входной параметр.
     * Не используется контейнер объектов для того, чтобы алгоритм
     * был проще и прозрачнее.
     */
    public function __construct($in)
    {
        $this->gameSurvive = $in;

        /**
         * Найти локацию пользователя
         * -1 - игрок ещё никуда не входил
         */
        $searchLocationUser = new LocationForUser();
        $location = $searchLocationUser->getLocation();
        
        /**
         * Метод изменяет локация игрока. Локация меняется
         * в базе данных и в переменной сессий.
         */
        // $searchLocationUser->setLocation(-1);
        //////////////////////////////////////////////

        /**
         * Далее мне нужны два фабричных метода.
         * Первый отвечает за фон, в зависимости от локации
         * Второй работает с диалогами с пользователем
         */
        // создать объект фабрики для получения стилевого класса
        $bgiFactoru = new BGIFactory();
        // вызвать фабричный метод, для получения объекта с названием стиля
        $bgiObj = $bgiFactoru->factoryReturnBGI($location);
        //получить название стиля из объекта
        $classStyle = $bgiObj->returnBGI();
        ////////////////////////////////////////////////////////

        /**
         * используя ссылку на главный объект, который делегировал сюда
         * решение вопросса выбора стилевого класса в зависимости от 
         * локации игрока, записать значение стилевого класса в свойство
         * главного объекта class GameSurvive
         */
        $this->gameSurvive->setBGI($classStyle);
        /////////////////////////////////////////////////////////

        /**
         * Объект храних данные о состоянии игрока
         * в своем суперклассе
         */
        $state = new State;
        ContainerObject::getInstance()
                         ->setProperty('State', $state);
        /**
         * Метод читает данные о пользователе из базы данных,
         * если их там нет, то создает новые
         */
        $state->loadData();
        

        /**
         * Здесь должен быть сформирован фабрикой объект локации
         */
        $location = new LocationFirst();

        /**
         * Объект занимается коррекцией данных о состоянии игрока
         * Объект принимает объект с данными и объект с локацией
         * и вносит изменения в объект с данными
         */
        
        $correct = new CorrectState($state, $location);
        // echo $correct->getPropertyCorrect('fatiqueReal');
        // echo $correct->state->getProperty('milisecInput');
        
        /**
         * объект рисует кошелек
         */
        new WalletViev($state);

        /**
         * Запуск проверки содержимого в куках для поиска
         * того, что находится в сумке
         */
        // setcookie('user_bag_Snikers',0.6,time()+5620);
        // setcookie('user_bag_Mars',0.6,time()+5620);
        // setcookie('user_bag_Baunty',0.6,time()+5620);
        
        /**
         * Нарисовать сумку
         */
        new BagViev(new Bag);

        //echo \class\nonBD\cripto\CodingStr::coding('Привет');
        //echo \class\nonBD\cripto\CodingStr::deCoding(\class\nonBD\cripto\CodingStr::coding('Привет'));
        
        /**объект хранит енергетическую ценность еды */
        new Energy;

        /**
         * Слушаем пост на предмет события Кушать
         */
        new EventBag;
    }


 }

