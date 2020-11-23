<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArticleLinkSendToFriend extends Mailable
{
    use Queueable, SerializesModels;

    public $getArticleURL;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($getArticleURL)
    {
        $this->getArticleURL = $getArticleURL;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Article Shared')
                    ->markdown('emails.post.article');
    }
}
