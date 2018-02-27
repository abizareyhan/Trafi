<?php
namespace Abizareyhan\Trafi;

class Bounds
{
  private $topLeft = [];
  private $topRight = [];
  private $bottomLeft = [];
  private $bottomRight = [];

  public function __construct(array $topLeft, array $topRight, array $bottomLeft, array $bottomRight){
    $this->topLeft = $topLeft;
    $this->topRight = $topRight;
    $this->bottomLeft = $bottomLeft;
    $this->bottomRight = $bottomRight;
  }

  public function getBoundsString()
  {
    $string = $this->topLeft[0].",".$this->topLeft[1].";";
    $string .= $this->topRight[0].",".$this->topRight[1].";";
    $string .= $this->bottomLeft[0].",".$this->bottomLeft[1].";";
    $string .= $this->bottomRight[0].",".$this->bottomRight[1].";";
    return $string;
  }
}
