<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Managers\SubscriptionManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(protected SubscriptionManager $subscriptionManager)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $this->subscriptionManager->publishPost($event->post);
    }
}
