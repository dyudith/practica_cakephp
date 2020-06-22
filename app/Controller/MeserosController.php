<?php

class MeserosController extends AppController{

    public $helpers = array('Html','Form');
    public $components = array('Session');
    
    public function index() {
        $this->set('meseros', $this->Mesero->find('all'));
    }

    public function view($id = null) {

        if(!$id){
            throw new NotFoundException('Datos Invalidos');
        }

        $mesero = $this->Mesero->findById($id);

        if(!$mesero){
            throw new NotFoundException('El mesero no existe');
        }

        $this->set('mesero', $mesero);

    }

    public function create() {
        if($this->request->is('post')){

            $this->Mesero->create();

            if($this->Mesero->save($this->request->data)){
                $this->Session->setFlash('El mesero ha sdo creado');
                return $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash('No se pudo crear el mesero');
        }
    }

}
