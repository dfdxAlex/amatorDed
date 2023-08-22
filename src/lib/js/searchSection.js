
/**
 * Функция проверяет есть ли на странице тег section,
 * если тега нет, то задать маржит-топ футеру в 800 px
 * Подключается класс в src\lib\php class FutterDecorator extends Futter
 */

function searchSection()
{
    
    var section = document.getElementsByClassName('container-fluid');
    if (section.length<2) {
        var footer = document.getElementById('footer');
        footer.style.marginTop = "600px";
    }
}
