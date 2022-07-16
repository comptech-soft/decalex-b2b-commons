<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Chestionar;

class ChestionareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/chestionare/index.js'));
    }

    public function getItems(Request $r) {
        return Chestionar::getItems($r->all());
    }

    public function saveDraft(Request $r) {
        return Chestionar::saveDraft($r->all());
    }

    public function saveIntrebare(Request $r) {
        return Chestionar::saveIntrebare($r->all());
    }

    public function updateIntrebare(Request $r) {
        return Chestionar::updateIntrebare($r->all());
    }
    
    public function updateRaspuns(Request $r) {
        return Chestionar::updateRaspuns($r->all());
    }

    public function deleteRaspuns(Request $r) {
        return Chestionar::deleteRaspuns($r->all());
    }
    
    public function deleteIntrebare(Request $r) {
        return Chestionar::deleteIntrebare($r->all());
    }

    public function reorderRaspunsuri(Request $r) {
        return Chestionar::reorderRaspunsuri($r->all());
    }
    
    public function reorderIntrebari(Request $r) {
        return Chestionar::reorderIntrebari($r->all());
    }

    public function insertRaspuns(Request $r) {
        return Chestionar::insertRaspuns($r->all());
    }

    public function addSubintrebare(Request $r) {
        return Chestionar::addSubintrebare($r->all());
    }

    public function deleteSubintrebare(Request $r) {
        return Chestionar::deleteSubintrebare($r->all());
    }

    public static function searchIntrebare(Request $r) {
        return Chestionar::searchIntrebare($r->all());
    }

    public static function addIntrebari(Request $r) {
        return Chestionar::addIntrebari($r->all());
    }
        
    public function doAction($action, Request $r) {
        return Chestionar::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return Chestionar::export($r->all());
    }
    
    public function exportPreview($id) {

        $chestionar = \Decalex\Models\Chestionar::where('id', $id)->with(['intrebari.intrebare.tip'])->first();

        return view('exports.chestionar.xls-export', [
           'records' => $chestionar->intrebari,
        ]);
    }

    public function xlsImport(Request $r) {
        return Chestionar::xlsImport($r->all());
    }

    
}