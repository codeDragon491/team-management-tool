<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectRequestMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

        /**
     * @var
     */
    public $projectClientId;

    /**
     * Create a new message instance.
     *
     * @param $projectClientId
     */
    public function __construct($projectClientId)
    {
        //
        $this->projectClientId = $projectClientId;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {   
        //$this->from('hello@signifly.com');
        $this->subject('New Project Request from Signifly');

        return $this->markdown('mails.projectRequest');
    }
}
