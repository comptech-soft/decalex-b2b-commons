<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerFile;

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

    public function attachRegisterFiles(Request $r) {
        return CustomerFile::attachRegisterFiles($r->all());
    }

    public function getRegisterRowFiles(Request $r) {
        return CustomerFile::getRegisterRowFiles($r->all());
    }


    
    
    
}