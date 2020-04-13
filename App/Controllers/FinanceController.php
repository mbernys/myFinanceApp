<?php


namespace App\Controllers;

use Core\Controller;
use Core\Session;
use App\Models\Finance;

class FinanceController extends Controller
{


    public function Index(){
        $session = new Session();
        $session->createSession();
        if($session->isLogged()){
            $this->render('Finance','index');
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

            $finance = new Finance($param);


            $data['categories'] = $finance->getCategories();

            $this->set($data);

            if(isset($_POST['submit'])) {

                $finance->addToDB($_SESSION['user_id'], $_POST['category_id'], $_POST['finance_date'], $_POST['finance_description'], $_POST['finance_value']);

                if ($finance->getIsCreate() == 'true') {

                    $data['validation'] = ['color_class' => 'alert-success', 'errors' => $finance->getResults()];

                } else {

                    $data['validation'] = ['color_class' => 'alert-danger', 'errors' => $finance->getResults()];

                }

                $this->set($data);
            }

            $this->render('Finance','add');
        }
        else {
            header('Location: /myFinanceApp/Home/Index');
        }
    }


}