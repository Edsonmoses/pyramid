<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Newsletter\Newsletter;
use Illuminate\Support\Facades\Request;

class NewsletterComponent extends Component
{
    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);
            return redirect('newsletter')->with('success', 'Thanks For Subscribe');
        }
        return redirect('newsletter')->with('failure', 'Sorry! You have already subscribed ');
    }
    public function render()
    {
        return view('livewire.user.newsletter-component');
    }
}
