<?php
function reverseLettersInWords($string) {
    $words = preg_split('/(\W+)/u', $string, -1, PREG_SPLIT_DELIM_CAPTURE);
    //$words = preg_split('/\b(?=\w*[^\d\W])\w+\b/u', $string, -1, PREG_SPLIT_NO_EMPTY);
    
    foreach ($words as &$word) {
        if (preg_match('/^\p{L}+$/u', $word)) { // Если слово состоит только из букв
            //if (preg_match('/^\w+$/u', $word) { Если слово состоит только из букв, НО МОЖЕТ СОДЕРЖАТЬ В СЕБЕ ЦИФРЫ
            
            // Разбиваем слово на массив символов
            $letters = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
            
            // Определяем массив для хранения индексов букв верхнего и нижнего регистра
            $upperIndices = [];
            $lowerIndices = [];
            
            // Заполняем массивы индексов
            foreach ($letters as $index => $letter) {
                if (mb_strtoupper($letter, 'UTF-8') !== mb_strtolower($letter, 'UTF-8')) {
                    // Если символ не является заглавной или строчной буквой, пропускаем его
                    if ($letter === mb_strtoupper($letter, 'UTF-8')) {
                        $upperIndices[] = $index;
                    } elseif ($letter === mb_strtolower($letter, 'UTF-8')) {
                        $lowerIndices[] = $index;
                    }
                }
            }
            
            // Переворачиваем порядок букв
            $letters = array_reverse($letters);
            
            // Восстанавливаем порядок регистра
            foreach ($upperIndices as $index) {
                $letters[$index] = mb_strtoupper($letters[$index], 'UTF-8');
            }
            foreach ($lowerIndices as $index) {
                $letters[$index] = mb_strtolower($letters[$index], 'UTF-8');
            }
            
            // Собираем символы обратно в слово
            $word = implode('', $letters);
        }
    }
    
    return implode('', $words);
}

// Пример использования
$string = "123 is 'Cold' <мЫшь> third-part noW";
echo reverseLettersInWords($string); // Вывод: si 'dloc' won
//is 'Cold' <мЫшь> third-part noW
?>