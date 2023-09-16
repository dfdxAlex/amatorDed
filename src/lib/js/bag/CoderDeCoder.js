class CoderDeCoder
{
/**
 * The function decodes a string from Unicode (UTF-8) to text.
 * Encoding is done in a PHP script to avoid transmitting Cyrillic 
 * characters in cookies.
 * 
 * функция раскодирует строку из юникода(UTF-8) в текст
 * кодировка производится в скрипте php для того, чтобы
 * не пересылать кирилицу в куках.
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
