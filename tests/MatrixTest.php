<?php

namespace LinearAlgebra\Tests;
use PHPUnit\Framework\TestCase;
use LinearAlgebra\Matrix;

class MatrixTest extends TestCase {
    public function testNumRows() {
        $matrix = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $this->assertEquals(2, $matrix->numRows());
    }

    public function testNumCols() {
        $matrix = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $this->assertEquals(2, $matrix->numCols());
    }

    public function testGetSet() {
        $matrix = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $this->assertEquals(2.0, $matrix->get(0, 1));
        $matrix->set(0, 1, 5.0);
        $this->assertEquals(5.0, $matrix->get(0, 1));
    }

    public function testAdd() {
        $matrix1 = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $matrix2 = new Matrix([[5.0, 6.0], [7.0, 8.0]]);
        $result = $matrix1->add($matrix2);
        $this->assertEquals(new Matrix([[6.0, 8.0], [10.0, 12.0]]), $result);
    }

    public function testSubtract() {
        $matrix1 = new Matrix([[5.0, 6.0], [7.0, 8.0]]);
        $matrix2 = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $result = $matrix1->subtract($matrix2);
        $this->assertEquals(new Matrix([[4.0, 4.0], [4.0, 4.0]]), $result);
    }

    public function testMultiply() {
        $matrix1 = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $matrix2 = new Matrix([[5.0, 6.0], [7.0, 8.0]]);
        $result = $matrix1->multiply($matrix2);
        $this->assertEquals(new Matrix([[19.0, 22.0], [43.0, 50.0]]), $result);
    }

    public function testTranspose() {
        $matrix = new Matrix([[1.0, 2.0], [3.0, 4.0]]);
        $result = $matrix->transpose();
        $this->assertEquals(new Matrix([[1.0, 3.0], [2.0, 4.0]]), $result);
    }
}
