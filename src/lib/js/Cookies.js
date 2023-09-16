class Cookies extends CoderDeCoder
{
    /**
     * функция ищет все куки заданной категории, то есть с заданным
     * ключём и возвращает массив в виде имя кукиса и его значения.
     */    
    searchCookies(markerCategory)
    {
        let arrayCleaned = [];
        let objRez = {};    

        this.returnMasCuckies().forEach(
            (e)=>{
                  if (e.includes(markerCategory)) {
                  let timeMas = e.split('=');
                       timeMas[0] = timeMas[0].replace(markerCategory,'');
                       timeMas[0] = this.deCoderIntToUTF8(timeMas[0]);
                       timeMas[1] = timeMas[1].replaceAll('%22','');
                       [objRez.propertyName,objRez.propertyVal] = timeMas;
                       arrayCleaned.push(objRez);
                    }
                }
               );
               
    return arrayCleaned;
    }

    returnMasCuckies()
    {
        return document.cookie.split(';');
    }

}
