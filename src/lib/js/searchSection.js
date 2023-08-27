
/**
 * Функция проверяет есть ли на странице тег section,
 * если тега нет, то задать маржит-топ футеру в 800 px
 * Подключается класс в src\lib\php class FutterDecorator extends Futter
 */

function searchSection()
{
    var footer = $('#footer');
    var margin = footer.offset();

    if (margin.top<500) {
        footer.css('margin-top','600px');
    }
}

// export default searchSection;
