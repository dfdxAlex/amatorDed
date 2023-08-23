
/**
 * функция устанавливает параметры содержимое блоков показа
 * остатка енергий
 * 
 * Параметр id - это название навыка без суфикса max or real
 * Параметр real передает значение реальное, max соответственно
 * максимальное
 * 
 * Запускается функция тут:
 * src\lib\php\games\survive\state\ViewState
 */
function viewState(id, real, max)
{
    var idMax = id+'-max';
    var idReal = id+'-real';
    
    /**
     * выбрать елемент
     */
    var divMax = $('#'+idMax);
    var divReal = $('#'+idReal);

    let val = real/max*100;

    // #07a711 100-80
    // #a2ef45 79-60
    // #e8da1d 59-20
    // #c13b05 <20
    divMax.css('border-radius','5%');
    divMax.css('border','2px solid white');
    divMax.css('background-color','#e7e1e1');
    divMax.css('width','100%');
    divMax.css('height','100%');

    divMax.attr('title',val);
    
    let color='#c13b05';
    if (val>19) color = '#e8da1d';
    if (val>59) color = '#a2ef45';
    if (val>79) color = '#07a711';

    divReal.css('border-radius','5%');
    divReal.css('background-color',color);
    divReal.css('width',val+'%');
    divReal.css('height','100%');
}
