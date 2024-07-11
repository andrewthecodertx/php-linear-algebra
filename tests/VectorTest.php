<?php

namespace LinearAlgebra\Tests;
use PHPUnit\Framework\TestCase;
use LinearAlgebra\Vector;

class VectorTest extends TestCase {
    public function testSize() {
        $vector = new Vector([1.0, 2.0, 3.0]);
        $this->assertEquals(3, $vector->size());
    }

    public function testGetSet() {
        $vector = new Vector([1.0, 2.0, 3.0]);
        $this->assertEquals(2.0, $vector->get(1));
        $vector->set(1, 4.0);
        $this->assertEquals(4.0, $vector->get(1));
    }

    public function testAdd() {
        $vector1 = new Vector([1.0, 2.0, 3.0]);
        $vector2 = new Vector([4.0, 5.0, 6.0]);
        $result = $vector1->add($vector2);
        $this->assertEquals(new Vector([5.0, 7.0, 9.0]), $result);
    }

    public function testSubtract() {
        $vector1 = new Vector([4.0, 5.0, 6.0]);
        $vector2 = new Vector([1.0, 2.0, 3.0]);
        $result = $vector1->subtract($vector2);
        $this->assertEquals(new Vector([3.0, 3.0, 3.0]), $result);
    }

    public function testScale() {
        $vector = new Vector([1.0, 2.0, 3.0]);
        $result = $vector->scale(2.0);
        $this->assertEquals(new Vector([2.0, 4.0, 6.0]), $result);
    }

    public function testDot() {
        $vector1 = new Vector([1.0, 2.0, 3.0]);
        $vector2 = new Vector([4.0, 5.0, 6.0]);
        $result = $vector1->dot($vector2);
        $this->assertEquals(32.0, $result);
    }

    public function testNorm() {
        $vector = new Vector([1.0, 2.0, 3.0]);
        $result = $vector->norm();
        $this->assertEquals(sqrt(14.0), $result);
    }
}
