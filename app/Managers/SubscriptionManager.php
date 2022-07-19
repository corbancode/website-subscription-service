<?php

namespace App\Managers;

use App\Models\Post;
use App\Models\Subscription;
use App\Notifications\PostNotification;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionManager {
    /**
     * Get all subscriptions
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all(): ?LengthAwarePaginator {
        $subscriptions = Subscription::paginate(request()->input('page_size'));
        return $subscriptions;
    }

    /**
     * Create subscription.
     *
     * @param int $websiteId
     * @param int $userId
     *
     * @return  \App\Models\Subscription
     */
    public function create(int $websiteId, int $userId): ?Subscription {
        $data = [
            'website_id' => $websiteId,
            'user_id' => $userId
        ];

        $subscription = Subscription::updateOrCreate($data, $data);
        return $subscription;
    }
}
