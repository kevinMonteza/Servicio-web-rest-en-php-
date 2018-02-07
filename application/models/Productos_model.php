<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get($nombre = null)               // buscar un  
    {
        if (!is_null($nombre)) {
            $query = $this->db->select('*')->from('productos')->where('nombre', $nombre)->get(); // para pedir un valor en base al id 
            if ($query->num_rows() === 1) {                                             //$query='select * from clientes';
                return $query->row_array();                                             //$this->db->query(&query);
            }
            return null;
        }
        $query = $this->db->select('*')->from('productos')->get(); // todos los valores de la base de datos
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }

     public function save($producto)
    {
        $this->db->set($this->_setProducto($producto))->insert('productos');

        if ($this->db->affected_rows() === 1) {
            //return $this->db->insert_id();
            return array('funciono');
        }

        return null;
    }

    public function update($prod)
    {
        $nombre = $prod['nombre'];

        $this->db->set($this->_setProducto($prod))->where('nombre', $nombre)->update('productos');

        if ($this->db->affected_rows() === 1) {
            return array('funciono');
        }

        return null;
    }
    public function delete($nombre)
    {
        $this->db->where('nombre', $nombre)->delete('productos');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }


    private function _setProducto($producto){
        return array(
            'nombre'  => $producto['nombre'],
            'id'=>$producto['id'],
            'descripcion'=>$producto['descripcion'],
            'categoria'=>$producto['categoria'],
              'precio'=>$producto['precio'],
                'existencia'=>$producto['existencia'],
           /* 'descripcion'=>$prodtucto['descripcion'],
            'precio'=>$producto['precio'],
            'existencias'=>$prodtucto['existencias']*/
            );

}

}
