<?php

namespace App\Entity;

use \App\Db\Database;

class Vaga{
   
    /**
     * identificador unico da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string;
     */
    public $titulo;

    /**
     * Descrição da vaga
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga esta ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data de publicação da vaga
     * @var string;
     */
    public $data;

    /**
     * Método responsavel por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar(){
        //definir a data

        $this->data= date('Y-m-d H:i:s');

        //inserir a vaga no banco
        $obDatabase = new Database ('vagas');
        $this->id= $obDatabase->insert ([
            'titulo'=> $this->titulo,
            'descricao'=>$this->descricao,
            'ativo'=> $this->ativo,
            'data' =>$this->data
        ]);

        //atribuir o id da vaga na instancia

        // retornar sucesso
        return true;
    }

    
}