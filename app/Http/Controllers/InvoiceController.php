<?php

namespace App\Http\Controllers;
use App\Services\ZohoEmailService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Illuminate\Routing\Controller as BaseController;

class InvoiceController extends BaseController
{
    public function index(){
        return view('home');
    }

    public function generate_Pdf()
    {  
        $data = [
            'product_name' => 'Beautiful Marathi Wedding Invitation Video',
            'price' => '99.00'
        ];
         
        $pdf = Pdf::loadView('invoice', ['data' => $data]);
         
        return $pdf->stream(); 
    }

    public function invoice_view(Request $request)
    {  
        // Render the Blade file content
        $invoice_content = View::make('invoice_view')->render();

        return response()->json(['invoice_content' => $invoice_content]);
    }

    public function send_email(Request $request)
    {
        try {
            $transport = Transport::fromDsn(env("MAILER_DSN"));
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from('vikas@invitecrafter.com')
                ->to('rahulatal82@gmail.com')
                ->subject('Premium Invitations')
                ->html('<body><p>New Email from Rahul Atal for testing.</p></body>');

            $mailer->send($email);
        } catch (Exception $e) {
            return Response::json("Message could not be sent. Mailer Error: {$e->getMessage()}");
        }
    
    }

    public function captcha(){
        return view('captcha');
    }

    public function captcha_submit(Request $request){ 
        $rules = [
            'g-recaptcha-response' => 'required|recaptcha',
            // 'simple_text' => 'required',
        ];

        $messages = [
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha',
            // 'simple_text.required' => 'Simple Text is Required',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails() ) {
            return back()->withErrors($validator)->withInput();
        } else {
            return redirect()->back()->with('message','form submitted successfully.');
        }
    }

    public function captcha_v3(){
        return view('captcha_v3');
    }

    public function captcha_vThree_submit(Request $request){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => config('services.recaptcha.secret'),
                'response' => $request->get('g-recaptcha-response'),
                'remoteip' => $remoteip
            ];
        $options = [
                'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                $resultJson = json_decode($result);
                
        if ($resultJson->success != true) {
                return back()->withErrors(['captcha' => 'ReCaptcha Error']);
                }
        if ($resultJson->score >= 0.3) {
                //Validation was successful, add your form submission logic here
                return back()->with('message', 'Thanks for your message!');
        } else {
                return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }

    }

}
