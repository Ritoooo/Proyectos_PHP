<?php
require_once "../CONEXION/ConexionBD.php";
require_once '../BEAN/PersonaBean.php';
class    PersonaDAO
{    
    public    function   BuscarPersonas(PersonaBean       $objpb )
   {  try {
           $sql="select *  from persona  where   APELLIPERSO   like '%$objpb->APELLIPERSO%'   ; ";
           $objc = new ConexionBD();
            $cn=$objc->getConexionBD();   
           $rs= mysql_query($sql,$cn);
           $LISTA['PERSONA']= array();
           while ($fila=  mysql_fetch_assoc($rs))
           {
             array_push($LISTA['PERSONA'], 
             array('CODPERSO'=>$fila['CODPERSO'],'NOMBPERSO'=>$fila['NOMBPERSO'],
                       'APELLIPERSO'=>$fila['APELLIPERSO']));   
           }           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
   }  
   
   
   
   
   
}
?>
