<?php
require_once 'vendor/autoload.php';
require_once 'index.php'; 

use PHPUnit\Framework\TestCase;

class ReverseLettersInWordsTest extends TestCase {
    public function testReverseLettersInWords() {
        // Тест с простыми словами
        $this->assertEquals("si 'Dloc' <ьШым> 123 driht-trap woN", reverseLettersInWords("is 'Cold' <мЫшь> 123 third-part noW"));
        
        // Тест с пустой строкой
        $this->assertEquals("", reverseLettersInWords(""));
        
        // Тест с одним символом
        $this->assertEquals("a", reverseLettersInWords("a"));
        
        // Тест с символами, не являющимися буквами
        $this->assertEquals("123", reverseLettersInWords("123"));

        $this->assertEquals("1ыв23", reverseLettersInWords("1ыв23"));
        
        // Тест с словами на русском языке
        $this->assertEquals("Тэст эффективности функции", reverseLettersInWords("Тсэт итсонвиткеффэ иицкнуф"));
        
        // Тест с символами разделителями
        $this->assertEquals("hello, world!", reverseLettersInWords("olleh, dlrow!"));
    }
}

?>