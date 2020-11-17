<a
href="{{ route('subscribers') }}"
class="btn btn-sm btn-outline-secondary mr-1 activeclass {{ request()->routeIs('subscribers') ? 'active' : '' }}">
Subscribers
</a>
<a
href="{{ route('subscribers',['subscribed'=> 'false']) }}"
class="btn btn-sm btn-outline-secondary mr-1 inactiveclass {{ request('subscribed') == 'false' ? 'active' : '' }}">
Unsubscriber
</a>
<a
href="{{ route('newsletter.emails') }}"
class="btn btn-sm btn-outline-secondary mr-1 inactiveclass {{ request()->routeIs('newsletter.emails') ? 'active' : '' }}">
Newsletter Emails
</a>
<a href="{{route('newsletters.create')}}" class="btn btn-success float-right">Send Newsletter</a>
