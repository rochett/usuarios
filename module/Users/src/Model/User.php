<?php
/**
 * Created by PhpStorm.
 * User: roche
 * Date: 11/06/2018
 * Time: 12:22
 */

namespace Users\Model;


class User
{

    public $id;
    public $nome;
    public $email;
    public $senha;

    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id']: null;
        $this->nome = (!empty($data['nome'])) ? $data['nome']: null;
        $this->email = (!empty($data['email'])) ? $data['email']: null;
        $this->senha = (!empty($data['senha'])) ? $data['senha']: null;
    }

    public function getArrayCopy()
    {
        return [
            'id'=>$this->id,
            'nome'=>$this->nome,
            'email'=>$this->email,
            'senha'=>$this->senha,
        ];

    }

}