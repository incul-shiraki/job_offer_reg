<?php

namespace App\Http\Controllers;
use App\Models\AllRecInfo; 
use Mail;
use Illuminate\Http\Request;

class OpenOfferController extends Controller
{
  public function sendMailJob($id){
    $rec_info_re = AllRecInfo::findOrFail($id); 
    $offer_time = date("Y/m/d H:i:s");
    $data = [
      "data" => $rec_info_re,
      "day" => $offer_time,
    ];
   // dd($email); 
    Mail::send('email.open_offer_mail', $data, function($message){
    $email = config('constants.emails.admin');
        $message->to($email)->subject('求人公開申請依頼');
    });

    return view('/offer_comp/recruitment/job_offer_detail',
    compact('id',
            'rec_info_re'
  ));
  }

//残タスク：接続DB変更対応
  public function sendMailLead($id){
    $rec_info_re = AllRecInfo::findOrFail($id); 
    $offer_time = date("Y/m/d H:i:s");
    $data = [
      "data" => $rec_info_re,
      "day" => $offer_time,
    ];
   // dd($email); 
    Mail::send('email.open_offer_lead_mail', $data, function($message){
    $email = config('constants.emails.admin');
        $message->to($email)->subject('案件公開申請依頼');
    });

    return view('/offer_comp/business_commission/lead_offer_detail',
    compact('id',
            'rec_info_re'
  ));
  }

}
