<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    /**
     * Create Subscription
     *
     * Add user to a website subscription list
     *
     * @response true
     */
    public function store(SubscriptionRequest $request): bool
    {

        try {
            Subscription::query()->updateOrCreate(
                [
                'user_id'    => $request->user_id,
                'website_id' => $request->website_id,
                ]
            );

            return true;
        } catch (\Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
