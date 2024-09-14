<?php

abstract class Shape {
    abstract public function calculateArea();
}

class Triangle extends Shape {
    private $base;
    private $height;

    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        return 0.5 * $this->base * $this->height;
    }
}

class RectangleShape extends Shape { 
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }
}

interface Resizable {
    public function resize($factor);
}

class Square implements Resizable {
    private $sideLength;

    public function __construct($sideLength) {
        $this->sideLength = $sideLength;
    }

    public function resize($factor) {
        $this->sideLength *= $factor;
    }

    public function getArea() {
        return $this->sideLength * $this->sideLength;
    }
}

class Rectangle {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }

    public function calculatePerimeter() {
        return 2 * ($this->length + $this->width);
    }
}

abstract class Animal {
    abstract public function eat();
    abstract public function makeSound();
}

class Dog extends Animal {
    public function eat() {
        return "Dog is eating.";
    }

    public function makeSound() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function eat() {
        return "Cat is eating.";
    }

    public function makeSound() {
        return "Meow!";
    }
}

class Bird extends Animal {
    public function eat() {
        return "Bird is eating.";
    }

    public function makeSound() {
        return "Chirp!";
    }
}

class Validation {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePassword($password) {
        return strlen($password) >= 8; 
    }

    public static function validateUsername($username) {
        if (strlen($username) < 3 || strlen($username) > 16) {
            return false;
        }
    
        for ($i = 0; $i < strlen($username); $i++) {
            $char = $username[$i];
            if (!ctype_alnum($char) && $char !== '_') {
                return false; 
            }
        }
    
        return true; 
    }
}


$triangle = new Triangle(10, 5);
echo "Triangle area: " . $triangle->calculateArea() . "<br>"; 

$rectangle = new RectangleShape(10, 5);
echo "Rectangle area: " . $rectangle->calculateArea() . "<br>"; 

$square = new Square(4);
echo "Square area before resize: " . $square->getArea() . "<br>";
$square->resize(2);
echo "Square area after resize: " . $square->getArea() . "<br>"; 

$dog = new Dog();
echo $dog->eat() . "<br>"; 
echo $dog->makeSound() . "<br>"; 

$cat = new Cat();
echo $cat->eat() . "<br>"; 
echo $cat->makeSound() . "<br>"; 

$bird = new Bird();
echo $bird->eat() . "<br>"; 
echo $bird->makeSound() . "<br>"; 


$email = "esraa2alganna@gmail.com";
echo Validation::validateEmail($email) ? "Valid Email<br>" : "Invalid Email<br>"; 

$password = "password123";
echo Validation::validatePassword($password) ? "Valid Password<br>" : "Invalid Password<br>"; 
    
$username = "user_name123";
echo Validation::validateUsername($username) ? "Valid Username<br>" : "Invalid Username<br>"; 

?>
