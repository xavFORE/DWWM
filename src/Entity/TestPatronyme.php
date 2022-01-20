<?php
    use PHPUnit\Framework\TestCase;
    
    class TestPatronyme extends TestCase
    {
        public function testLib()
        {
            $this->assertSame( 'Toto', 'Toto'  );
        }
    }
?>