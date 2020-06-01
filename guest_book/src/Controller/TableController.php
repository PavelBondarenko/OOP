<?php

namespace Controller;

use Model\CRUDInterface;
use Table;
use View\View;

class TableController extends AbstractController
{
    protected $table;
    protected $view;

    public function __construct(CRUDInterface $table, View $view)
    {
        $this->table = $table;
        $this->view = $view;
        $this->view->setTemplate('table');
    }

    public function actionShow()
    {
        $this
            ->view->setData(
                ['table' => $this
                    ->table
                    ->get()]
            )
            ->view();
    }

    public function actionAdd(array $data)
    {

        $this->table->add($data['POST']);

        $this->redirect('?action=show');
    }

    public function actionDel(array $data)
    {

        if (isset($data['GET']['id'])) {
            $this->table->delete($data['GET']['id']);
        }
        $this->redirect('?action=show');
    }

    public function actionShowEdit(array $data)
    {
        $id = $data['GET']['id'];
        $viewdata = $this->table->GET($id)[0];
        unset($viewdata['id']);

        $this
            ->view
            ->setTemplate('Edit')
            ->setData(
                ['data' => $viewdata,
                    'id' => $id]
            )
            ->view();
//        print_r($viewdata);


    }

    public function actionEdit(array $data)
    {

        $editData = $data['POST'];
        unset($editData['id']);
        $this->table->edit($data['POST']['id'], $editData);
        $this->redirect('?action=show');
    }


    public function actionDefault()
    {
        $this
            ->view
            ->setTemplate('Default')
            ->view();
    }
}