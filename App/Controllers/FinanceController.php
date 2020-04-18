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

            $finance = new Finance();

            $balanceLastMonth = $finance->getBalance(date('Y-m-d', strtotime(date('Y-m-d') . ' - 1 month')),"'%Y-%m'");
            $balanceThisMonth = $finance->getBalance(date('Y-m-d'),"'%Y-%m'");
            $balanceLastYear = $finance->getBalance(date('Y-m-d', strtotime(date('Y-m-d') . ' - 1 year')),"'%Y'");
            $balanceThisYear = $finance->getBalance(date('Y-m-d'),"'%Y'");

            $data['balance'] = ['this_month' => $balanceThisMonth, 'last_month' => $balanceLastMonth , 'this_year' => $balanceThisYear, 'last_year' => $balanceLastYear];

            $data['all_data'] = $finance->getPeriod("'%Y-%m'");

            $this->set($data);

            $this->render('Finance','index');
        }
        else {
            header('Location: /myFinanceApp/Home/Index');
        }
    }

    public function Add($param = ''){

        $session = new Session();
        $session->createSession();

        if($session->isLogged()) {

            if (!empty($param)) {
                $data['type'] = ['finance_type' => $param];
                $this->set($data);
            }
            $finance = new Finance();
            $finance->setType($param);

            $data['categories'] = $finance->getCategories();

            $this->set($data);

            if(isset($_POST['submit'])) {

                $finance->setCategoryId($_POST['category_id']);
                $finance->setDate($_POST['finance_date']);
                $finance->setDescription($_POST['finance_description']);
                $finance->setValue($_POST['finance_value']);

                $finance->saveToDatabase();

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