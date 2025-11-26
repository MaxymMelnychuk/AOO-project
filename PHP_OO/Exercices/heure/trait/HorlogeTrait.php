<?php
trait HorlogeTrait{
  public function afficherHeure(string $class): string
  {
    $now = new DateTime();
    if($class == "Humain"){
      return 'Il est ' . $now->format('d/m/Y H:i:s') . ' pour un humain';
    }else{
      return 'Il est ' . $now->getTimestamp() . ' pour un robot';
    }
  }
}