<?php
class Link
{

  public function getImageLogsLink($name)
  {
    return '../upload/'.$name;
  }

  public function getImageLink($name)
  {
    return $name;
  }
    
}

?>