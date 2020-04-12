<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;
use App\Models\Finances as ModelFinances;

class Finances extends Controller
{
    private $categories = [];

    public function Index(){
        $session = new Session();
        $session->createSession();
        if($session->isLogged()){
            $this->render('Finances','index');
        }
        else {
            header('Location: /myFinanceApp/Home/Index');
        }
    }

    public function Add($param = ''){

        $session = new Session();
        $session->createSession();
        if($session->isLogged()){
            $this->setString($param);

            $this->setSelectCategories($param);

            if(isset($_POST['submit'])) {

                $finances = new ModelFinances($_SESSION['username'], $param, $_POST['category_id'], $_POST['date'], $_POST['description'], $_POST['value']);

                if ($finances == 'true') {

                    $data['validation'] = ['color_class' => 'alert-success', 'errors' => $finances->getResults()];

                } else {

                    $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $finances->getResults()];

                }

                $this->set($data);
            }

            $this->render('Finances','add');
        }
        else {
            header('Location: /myFinanceApp/Home/Index');
        }
    }

    private function setSelectCategories(string $param)
    {
        // TODO: FetchFromDB
        $this->categories = array_merge($this->categories, $categories);
    }

}