<?php

namespace LinearAlgebra;
use InvalidArgumentException;

class Matrix {
    private $elements;
    private $rows;
    private $cols;

    public function __construct(array $elements) {
        $this->elements = $elements;
        $this->rows = count($elements);
        $this->cols = count($elements[0]);
    }

    public function numRows(): int {
        return $this->rows;
    }

    public function numCols(): int {
        return $this->cols;
    }

    public function get(int $row, int $col): float {
        return $this->elements[$row][$col];
    }

    public function set(int $row, int $col, float $value): void {
        $this->elements[$row][$col] = $value;
    }

    public function add(Matrix $other): Matrix {
        if ($this->rows != $other->numRows() || $this->cols != $other->numCols()) {
            throw new InvalidArgumentException("Matrices must be of the same dimensions");
        }
        $result = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $this->cols; $j++) {
                $row[] = $this->elements[$i][$j] + $other->get($i, $j);
            }
            $result[] = $row;
        }
        return new Matrix($result);
    }

    public function subtract(Matrix $other): Matrix {
        if ($this->rows != $other->numRows() || $this->cols != $other->numCols()) {
            throw new InvalidArgumentException("Matrices must be of the same dimensions");
        }
        $result = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $this->cols; $j++) {
                $row[] = $this->elements[$i][$j] - $other->get($i, $j);
            }
            $result[] = $row;
        }
        return new Matrix($result);
    }

    public function multiply(Matrix $other): Matrix {
        if ($this->cols != $other->numRows()) {
            throw new InvalidArgumentException("Number of columns of first matrix must equal number of rows of second matrix");
        }
        $result = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $other->numCols(); $j++) {
                $sum = 0.0;
                for ($k = 0; $k < $this->cols; $k++) {
                    $sum += $this->elements[$i][$k] * $other->get($k, $j);
                }
                $row[] = $sum;
            }
            $result[] = $row;
        }
        return new Matrix($result);
    }

    public function transpose(): Matrix {
        $result = [];
        for ($i = 0; $i < $this->cols; $i++) {
            $row = [];
            for ($j = 0; $j < $this->rows; $j++) {
                $row[] = $this->elements[$j][$i];
            }
            $result[] = $row;
        }
        return new Matrix($result);
    }

    public function print(): void {
        foreach ($this->elements as $row) {
            echo implode(" ", $row) . "\n";
        }
    }
}
