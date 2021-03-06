<?php

namespace Tests\Unit;

use App\Purchase;

use PHPUnit\Framework\TestCase;

class PurchaseTest extends TestCase
{
    /**
     * Lectura de pedidos de un usuario. (Test para mas adelante, simple prueba)
     */
    public function testCreaPurchase()
    {
        $purchase = new Purchase();
        $purchase->id = 1;
        $purchase->importe = '100.0';
        $purchase->descripcion = 'Un cuadro muy bonito';

        $this->assertEquals($purchase->descripcion, 'Un cuadro muy bonito');
    }
    
}