<?php

namespace App\Http\Controllers;
use App\Models\AllRecInfo; 
use Mail;
use Illuminate\Http\Request;

class OpenOfferController extends Controller
{
  public function sendMail($id){
    $rec_info_re = AllRecInfo::findOrFail($id); 
		$offer_time = date("Y/m/d H:i:s");
		$to = 'abc987@example.com';
		$data = [
			"data" => $rec_info_re,
			"day" => $offer_time,
		];
   // dd($email); 
    Mail::send('email.open_offer_mail', $data, function($message){
    $email = config('constants.emails.admin');
        $message->to($email)->subject('求人公開申請依頼');
    });

    return view('/offer_comp/management_screen/offer_comp_management_view/job_offer_detail',
    compact('id',
            'rec_info_re'
	));
	}
}
