<?php

namespace LinearAlgebra;
use InvalidArgumentException;

class Vector {
    private $elements;

    public function __construct(array $elements) {
        $this->elements = $elements;
    }

    public function size(): int {
        return count($this->elements);
    }

    public function get(int $index): float {
        return $this->elements[$index];
    }

    public function set(int $index, int $value): void {
        $this->elements[$index] = $value;
    }

    public function add(Vector $other): Vector {
        if ($this->size() != $other->size()) {
            throw new InvalidArgumentException("Vectors must be of the same size");
        }
        $result = [];
        for ($i = 0; $i < $this->size(); $i++) {
            $result[] = $this->elements[$i] + $other->get($i);
        }
        return new Vector($result);
    }

    public function subtract(Vector $other): Vector {
        if ($this->size() != $other->size()) {
            throw new InvalidArgumentException("Vectors must be of the same size");
        }
        $result = [];
        for ($i = 0; $i < $this->size(); $i++) {
            $result[] = $this->elements[$i] - $other->get($i);
        }
        return new Vector($result);
    }

    public function scale(float $scalar): Vector {
        $result = [];
        for ($i = 0; $i < $this->size(); $i++) {
            $result[] = $this->elements[$i] * $scalar;
        }
        return new Vector($result);
    }

    public function dot(Vector $other): float {
        if ($this->size() != $other->size()) {
            throw new InvalidArgumentException("Vectors must be of the same size");
        }
        $result = 0.0;
        for ($i = 0; $i < $this->size(); $i++) {
            $result += $this->elements[$i] * $other->get($i);
        }
        return $result;
    }

    public function norm(): float {
        $result = 0.0;
        foreach ($this->elements as $element) {
            $result += $element * $element;
        }
        return sqrt($result);
    }

    public function print(): void {
        echo "[" . implode(", ", $this->elements) . "]\n";
    }
}
