<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;
use App\Models\Finances as ModelFinances;

class Finances extends Controller
{


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

            $finances = new ModelFinances($param);


            $data['categories'] = $finances->getCategories();

            $this->set($data);

            if(isset($_POST['submit'])) {

                $finances->addToDB($_SESSION['username'], $_POST['category_id'], $_POST['finance_date'], $_POST['finance_description'], $_POST['finance_value']);

                if ($finances->getIsCreate() == 'true') {

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


}