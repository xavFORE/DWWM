<?php
    use PHPUnit\Framework\TestCase;

    require 'library.php';

    
    class TestPhrase extends TestCase
    {
        public function testLib()
        {
            $this->assertSame( 'Toto',  capitaleFirst( 'toto' ) );
            $this->assertSame( 'Toto',  capitaleFirst( 'TOTO' ) );
            $this->assertSame( 'André va à la plage lété', 
                capitaleFirst( 'andré va à la plage lété' ) );
            $this->assertSame( 'Ber',         capitaleFirst( 'ber' ) );
            $this->assertSame( '',            capitaleFirst( '' ) );
        }
    }
?>