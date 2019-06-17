<?php
require_once "../CONEXION/ConexionBD.php";
require_once '../BEAN/PersonaBean.php';
class    PersonaDAO
{    
  public static   function   ListarPersonas( )
   {  try {
           $sql="select *  from persona ; ";
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
   
   public  function InsertarPersonas(PersonaBean  $obj)
   {  try {
           $sql="INSERT INTO PERSONA(CODPERSO,NOMBPERSO,APELLIPERSO)VALUES('$obj->CODPERSO','$obj->NOMBPERSO','$obj->APELLIPERSO') ;  ";
           $objc = new ConexionBD();
           $cn=$objc->getConexionBD();   
           mysql_query($sql,$cn);
           $LISTA=  self::ListarPersonas( );
                 
       } catch (Exception $e)
       {                 
       }     
     return  $LISTA;       
       
   }
}
?>