<?php

namespace Thd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Thd\Mail\ContactUs;
use Thd\Plan;
use Validator;

class ContactUsController extends Controller
{
  private $_subject = [
    1 => 'I have a question about',
    2 => 'I have a question about House Plans',
    3 => 'I have a question about Modifications',
    4 => 'I have a question about the Cost-to-Build Estimator',
    5 => 'I have a question about the Website',
    6 => 'I’m interested in Advertising on your Website',
    7 => 'I’m interested in your Preferred Builders Program',
    8 => 'I’m interested in one of your Home Products'
  ];

  private $_land = [
    0 => 'Select here',
    1 => 'Yes',
    2 => 'No',
    3 => 'In process of purchasing',
    4 => 'Have multiple lots',
  ];

  private $_when = [
    0 => 'Select here',
    1 => '0-3 months',
    2 => '3-6 months',
    3 => '6-9 months',
    4 => '9-12 months',
    5 => '12+ months'
  ];

  private $_builder = [
    0 => 'Select here',
    1 => 'Yes',
    2 => 'No',
    3 => 'I\'m a builder'
  ];

  private $_how = [
    0 => 'Select here',
    1 => 'Google',
    2 => 'Bing',
    3 => 'Yahoo!',
    4 => 'Referral',
    5 => 'Social Media',
    6 => 'Other'
  ];

  public function index()
  {
    return view('contact-us.index', [
      'subject' => $this->_subject,
      'land' => $this->_land,
      'when' => $this->_when,
      'builder' => $this->_builder,
      'how' => $this->_how,
      'user' => Auth::user(),
    ]);
  }

  public function send(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'first_name' => 'required',
      'lastt_name' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'subject' => 'required|in:' . implode(',', array_keys($this->_subject)),
      'question' => 'required',
      'land' => 'required|in:' . implode(',', array_keys(array_slice($this->_land, 1, null, true))),
      'when' => 'required|in:' . implode(',', array_keys(array_slice($this->_when, 1, null, true))),
      'builder' => 'required|in:' . implode(',', array_keys(array_slice($this->_builder, 1, null, true))),
      'how' => 'required|in:' . implode(',', array_keys(array_slice($this->_how, 1, null, true)))
    ]);

    if ($validator->fails()) {
      return redirect(route('contact-us'))
        ->withErrors($validator)
        ->withInput();
    } else {
      $dataSend = $request->post();
      $dataSend['subject'] = $this->_subject[$dataSend['subject']];
      $dataSend['land'] = $this->_land[$dataSend['land']];
      $dataSend['when'] = $this->_when[$dataSend['when']];
      $dataSend['builder'] = $this->_builder[$dataSend['builder']];
      $dataSend['how'] = $this->_how[$dataSend['how']];

      Mail::to(config('mail.to.address'))->send(new ContactUs($dataSend));

      return redirect()->route('contact-us')
        ->with('message', [
          'type' => 'success',
          'title' => 'Success!',
          'message' => 'Your message was send',
          'autoHide' => 1
        ]);
    }
  }
}
