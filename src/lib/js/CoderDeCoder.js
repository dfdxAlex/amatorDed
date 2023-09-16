class CoderDeCoder
{
/**
 * функция раскодирует строку из юникода(UTF-8) в текст
 */

deCoderIntToUTF8(str)
{
    let masStr = str.split('_');
    let rez='';

    masStr.forEach(element => {
        rez += String.fromCharCode(element);
    });

    return rez;
}

}
