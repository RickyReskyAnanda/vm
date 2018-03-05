<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Partner\PartnerModel;

class PartnerController extends Controller
{
    public function viewPartner(){
    	$data = PartnerModel::all();
    	return view('administrator.partner.partner',compact('data'));
    }
}
