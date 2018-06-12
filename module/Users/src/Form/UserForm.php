<?php
/**
 * Created by PhpStorm.
 * User: roche
 * Date: 11/06/2018
 * Time: 15:51
 */

namespace Users\Form;


use Zend\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('user');

        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' => 'nome',
            'type' => 'text',
            'options' => [
                'label' => 'Nome'
            ],
            'attributes' => array(
                'placeholder' => 'Informe o NOME do Usuario',
                'required' => true
            )
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'options' => [
                'label' => 'E-mail'
            ],
            'attributes' => array(
                'placeholder' => 'Informe o E-MAIL do Usuario',
                'required' => true
            )
        ]);

        $this->add([
            'name' => 'senha',
            'type' => 'text',
            'options' => [
                'label' => 'Senha'
            ],
            'attributes' => array(
                'placeholder' => 'Informe a SENHA do Usuario',
                'required' => true
            )
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'options' => [
                'Value' => 'Cadastrar',
                'id' => 'submitbutton'
            ]
        ]);
    }

}