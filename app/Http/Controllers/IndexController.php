<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use GuzzleHttp\Client;

class IndexController extends Controller
{

    // For public home page
    function index(){
        return view('page.home');
    }

    function sendrequest(Request $request){
        session([
            'origin_form' => 'emailrequest'
        ]);
        $form_id = $request->input("form_id");
        if($form_id!="mailcomment"){
            return redirect("/");
        }

        $criteria = [
            'fullname'  =>  'required',
            'email'     =>  'required|email',
            'phone'     =>  'required',
            'comment'   =>  'required',
            'g-recaptcha-response' => 'required'
        ];
        
        $request->validate($criteria);

        $captcha_token = $request->input('g-recaptcha-response');
        
        if($captcha_token){
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params'   => array(
                    'secret'    => '6Ld2-J4UAAAAAHqneJcgFvrWn6loh8t8jSZH-Nzw',
                    'response'  => $captcha_token
                )
            ]);
            $result = json_decode($response->getBody()->getContents());
            
            if(!$result->success){
                return redirect('/');
            }
        }else{
            return redirect('/');
        }

        $data = array(
            'fullname'  => $request->fullname,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'comment'   => $request->comment,
            'purpose'   => 'request'
        );
    
        $mailjob = (new SendEMailJob($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($mailjob);
        return back()->with('success','Thanks for contacting us!');
    }

    function sendclientregistration(Request $request){
        session([
            'origin_form' => 'emailclient'
        ]);
        $form_id = $request->input("form_id");
        if($form_id!="emailclient"){
            return redirect("/");
        }

        $criteria = [
            'name'          => 'required',
            'companyname'   => 'required',
            'address'       => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'code'          => 'required|numeric',
            'email'         => 'required|email',
            'phone'         => 'required|numeric',
            'fax'           => 'required|numeric'
        ];

        $request->validate($criteria);

        $captcha_token = $request->input('g-recaptcha-response');
        
        if($captcha_token){
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params'   => array(
                    'secret'    => '6Ld2-J4UAAAAAHqneJcgFvrWn6loh8t8jSZH-Nzw',
                    'response'  => $captcha_token
                )
            ]);
            $result = json_decode($response->getBody()->getContents());
            
            if(!$result->success){
                return redirect('/');
            }
        }else{
            return redirect('/');
        }


        $data = array(
            'name'          => $request->name,
            'companyname'   => $request->companyname,
            'address'       => $request->address,
            'city'          => $request->city,
            'state'         => $request->state,
            'code'          => $request->code,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'fax'           => $request->fax,
            'purpose'   => 'clientregistration'
        );
    
        $mailjob = (new SendEMailJob($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($mailjob);
        return redirect("/clientsuccess");
    }

    function sendappraiser(Request $request){
        session([
            'origin_form' => 'emailappraiser'
        ]);
        $form_id = $request->input("form_id");
        if($form_id!="emailappraiser"){
            return redirect("/");
        }

        $criteria = [
            'firstname'         => 'required',
            'lastname'          => 'required',
            'email'             => 'required|email',
            'phone'             => 'required',
            'company'           => 'required',
            'street'            => 'required',
            'city'              => 'required',
            'state'             => 'required',
            'code'              => 'required',
            'countriescovered'  => 'required'
        ];

        $request->validate($criteria);

        $captcha_token = $request->input('g-recaptcha-response');
        
        if($captcha_token){
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params'   => array(
                    'secret'    => '6Ld2-J4UAAAAAHqneJcgFvrWn6loh8t8jSZH-Nzw',
                    'response'  => $captcha_token
                )
            ]);
            $result = json_decode($response->getBody()->getContents());
            
            if(!$result->success){
                return redirect('/');
            }
        }else{
            return redirect('/');
        }


        $data = array(
            'firstname'         => $request->firstname,
            'lastname'          => $request->lastname,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'company'           => $request->company,
            'street'            => $request->street,
            'city'              => $request->city,
            'state'             => $request->state,
            'code'              => $request->code,
            'countriescovered'  => $request->countriescovered,
            'purpose'           => 'clientappraiser'
        );
        
        
        $mailjob = (new SendEMailJob($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($mailjob);
        return redirect("/appraisersuccess");
    }
}
