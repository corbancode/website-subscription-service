<?php

namespace App\Managers;

use App\Models\Post;
use App\Models\Subscription;
use App\Notifications\PostNotification;

class SubscriptionManager {

    /**
     * Create subscription.
     *
     * @param int $websiteId
     * @param int $userId
     * 
     * @return  \App\Models\Subscription $subscription
     */
    public function create(int $websiteId, int $userId): ?Subscription {
        $data = [
            'website_id' => $websiteId,
            'user_id' => $userId
        ];

        $subscription = Subscription::updateOrCreate($data, $data);
        return $subscription;
    }

    /**
     * Publish post to all post website subscribers
     *
     * @param \App\Models\Post $post
     */
    public function publishPost(Post $post)
    {
        $post->website->subscriptions->each(function(Subscription $subscription) use($post) {
            $subscription->user->notify(new PostNotification($post));
        });
    }
}
