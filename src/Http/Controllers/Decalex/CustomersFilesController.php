<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerFile;

class CustomersFilesController extends Controller {
     
    public function getItems(Request $r) {
        return CustomerFile::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerFile::doAction($action, $r->all());
    }

    public function changeStatus(Request $r) {
        return CustomerFile::changeStatus($r->all());
    }

    public function changeFilesStatus(Request $r) {
        return CustomerFile::changeFilesStatus($r->all());
    }

    public function deleteFiles(Request $r) {
        return CustomerFile::deleteFiles($r->all());
    }

    

    public function attachRegisterFiles(Request $r) {
        return CustomerFile::attachRegisterFiles($r->all());
    }

    public function getRegisterRowFiles(Request $r) {
        return CustomerFile::getRegisterRowFiles($r->all());
    }


    
    
    
}