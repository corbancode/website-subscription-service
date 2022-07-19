<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Managers\SubscriptionManager;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Create a new instance
     * @param \App\Managers\SubscriptionManager $subscriptionManager
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(protected SubscriptionManager $subscriptionManager)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = $this->subscriptionManager->all();
        return response()->success('Users retrieved', $subscriptions);
    }

    /**
     * Store a new subscription in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $data = $request->validated();
        $subscription = $this->subscriptionManager->create($data['website_id'], $data['user_id']);
        return response()->success('Subscription created', $subscription);
    }
}
