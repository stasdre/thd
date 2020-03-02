<?php

namespace Thd\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ModifyPlan extends Mailable
{
    use Queueable, SerializesModels;

    public $dataForm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dataForm = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->dataForm['file']) {
            return $this->from($this->dataForm['email'], $this->dataForm['first_name'] . ' ' . $this->dataForm['last_name'])
                ->subject("New plan modify")->view('mail.modify-plan')->attach(
                    $this->dataForm['file']->getRealPath(),
                    [
                        'as' => $this->dataForm['file']->getClientOriginalName(),
                        'mime' => $this->dataForm['file']->getClientMimeType()
                    ]
                );
        } else {
            return $this->from($this->dataForm['email'], $this->dataForm['first_name'] . ' ' . $this->dataForm['last_name'])
                ->subject("New plan modify")->view('mail.modify-plan');
        }
    }
}
