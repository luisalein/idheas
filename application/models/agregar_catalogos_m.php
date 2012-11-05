<?php

class Agregar_catalogos_m extends CI_Model {
    
    public function __construct () {
        
         parent::__construct();
         
         $this->load->database();
    
    }
    
    public function mAgregarCatalogos($datos_catalogos){
        
        foreach ($datos_catalogos as $catalogo => $dato){
            
            $this->db->insert_batch($catalogo, $dato);
            
        }
        
    }
    
    public function mAgregarDerechosCatalogos($derechos){
        
        foreach ($derechos as $derecho => $valor){
            
            $this->db->insert_batch($derecho, $valor);
            
        }
        
    }
        
}
    
?>