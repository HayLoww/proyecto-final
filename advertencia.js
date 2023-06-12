trago ( {
    título : "¿ Estás seguro? " , 
    texto : "¡ Una vez eliminado, no podrá recuperar este archivo imaginario! " , 
    icono : " advertencia " , 
    botones : verdadero , 
    modo de peligro : verdadero , 
  } )
  . luego ( ( eliminará ) =>  { 
    si ( eliminará ) {  
      swal ( "¡ Puf! ¡Tu archivo imaginario ha sido eliminado! " , { 
        icono : " éxito " , 
      } ) ;
    } más {  
      swal ( "¡ Tu archivo imaginario está a salvo! " ) ;
    }
  } ) ;
  