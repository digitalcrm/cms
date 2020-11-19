    <a
        href="{{ route('subscribers',['subscribed'=> 'subscribers']) }}"
        class="btn btn-sm btn-outline-secondary mr-1 activeclass {{ request('subscribed') == 'subscribers' ? 'active' : '' }}">
    Subscribers
    </a>

    <a
        href="{{ route('subscribers',['subscribed'=> 'false']) }}"
        class="btn btn-sm btn-outline-secondary mr-1 inactiveclass {{ request('subscribed') == 'false' ? 'active' : '' }}">
    Unsubscriber
    </a>

    @if(request('subscribed') == 'subscribers')
    <a
        href="{{ route('exports_subscribers') }}"
        class="btn btn-sm btn-outline-secondary mr-1 inactiveclass">
    Export
    </a>
    <a
        href="{{ route('imports_subscribers') }}"
        class="btn btn-sm btn-outline-secondary mr-1 inactiveclass">
    Import
    </a>

    @endif

    <a href="{{route('newsletters.create')}}" class="btn btn-success float-right">Send Newsletter</a>
