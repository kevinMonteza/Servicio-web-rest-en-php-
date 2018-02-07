<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class Productos extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('productos_model');
    }


public function index_get()  // retorna todas los productos dela base de datos
    {

      {
        $productos = $this->productos_model->get();
        if (!is_null($productos)) {

            $this->response(array('response' => $productos), 200);
        } else {
            $this->response(array('error index_get' => 'No hay productos en la base de datos ...'), 404);
        }
    }
    }

   public function find_get($nombre)                    // busca una productos por nombre
    {
        if (!$nombre) {
            $this->response(null, 400);
        }
        $productos = $this->productos_model->get($nombre);
        if (!is_null($productos)) {
            $this->response(array('response' => $productos, 200));
        } else {
            $this->response(array('error' => 'productos no encontrados...'), 404);
        }

    }



    public function index_post()             // registrar peroductos
    {
          $producto= array();
          $producto["id"] = $this->input->post("id");
          $producto["nombre"] = $this->input->post("nombre");
          $producto['descripcion']= $this->input->post("descripcion");
          $producto['categoria']=$this->input->post("categoria");
          $producto['precio']=$this->input->post("precio");
          $producto['existencia']=$this->input->post("existencia");
       /* if (!$this->post('producto')) {
           $this->response(array('a la verga everyALL'), 400);
        }*/
        $id= $this->productos_model->save($producto);   // $id= $this->productos_model->save($this->post($producto));
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
           $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }
    }


     public function update_post()                   // actualizar libro cambia el estado del libro a 1 que es prestado  
    {
       $producto= array();
          $producto["id"] = $this->input->post("id");
          $producto["nombre"] = $this->input->post("nombre");
          $producto['descripcion']= $this->input->post("descripcion");
          $producto['categoria']=$this->input->post("categoria");
          $producto['precio']=$this->input->post("precio");
          $producto['existencia']=$this->input->post("existencia");
        $update = $this->producto_model->update($producto); 
        if (!is_null($update)) {
           $this->response(array('response' => 'producto actualizado!'), 200);
        } else {
           $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }

    }
    public function delete_post($nombre)
    {
        if (!$nombre) {
            $this->response(null, 400);
        }

        $delete = $this->productos_model->delete($nombre);

        if (!is_null($delete)) {
            $this->response(array('response' => 'Producto eliminado!'), 200);
        } else {
            $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }
    }


}