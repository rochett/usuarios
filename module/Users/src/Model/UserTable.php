<?php
/**
 * Created by PhpStorm.
 * User: roche
 * Date: 11/06/2018
 * Time: 12:22
 */

namespace Users\Model;

use Zend\Db\TableGateway\Exception\RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class UserTable
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function save(User $user)
    {
        $data = [
            'nome'=>$user->nome,
            'email'=>$user->email,
            'senha'=>$user->senha
        ];

        $id = (int) $user->id;

        if ($id === 0){
            $this->tableGateway->insert($data);
            return;
        }

        if(!$this->find($id)){
            throw new RuntimeException(sprintf(
                'Nenhuma linha encontrada para %d', $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);

    }

    public function find($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id'=>$id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf(
                'Nenhuma linha encontrada para %d', $id
            ));
        }

        return $row;
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => $id]);
    }

}