<?php
# ptuit
#
# Copyright © 2011 Naroa Rivacoba <naroa.rivacoba@gmail.com>
#
# This file is part of ptuit.
#
# ptuit is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# ptuit is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with ptuit. If not, see <http://www.gnu.org/licenses/>.


  function obtenerMensajesNuevos($idmensaje){
    
    $tabmensaje = 'mensaje';  // variable que guarda la tabla con la que se trabaja   
    $where =array() ;  //$where es la condicion que debe cumplirse para que el mensaje sea mostrado  este caso sería que id>$idmensaje. HAY QUE HACER.  
    $atributos = array('id', 'usuario', 'fecha', 'texto'); //que atributos se cojen de la tabla 
    include('bbdd/bd.php');
    $obj = new bd;  
    $sms = $obj->select($tabmensaje,$atributos, $where);
    
    if (isset($sms)) {       //comprueba si la variable esta definida
      for ($i = $idmensaje; $i < count($sms) ; $i++) {  
         $mensajes[] = $obj->select($tabmensaje,$atributos, $i);  //se va guardando en un array los datos de los mensajes nuevos que hay en la base de datos. hay que modificar la select. 
      }
      return json_encode($mensajes);   
    }
    else{
      return json_encode(array(FALSE)); //no hay mensajes nuevos  
    }
   
  }
    
?>