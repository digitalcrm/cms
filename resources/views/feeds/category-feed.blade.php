<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">

    <channel>

        <atom:link type="application/rss+xml" rel="self" href="{{ route('latest.latestpost', ['category' => $categories->name]) }}"/>
        <title>{{ $categories->name }}></title>
        <link>{{ route('latest.latestpost', ['category' => $categories->name]) }}</link>
        <language>{{ $sites['feeds']['main']['language'] }}</language>
        <lastBuildDate>{{ $categories->created_at->toRssString() }}</lastBuildDate>

        @foreach($categories->posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <description><![CDATA[{!! $post->summary_of_body !!}]]></description>
            <link>{{ route('post.viewitem',$post->slug) }}</link>
            <guid>{{ route('post.viewitem',$post->slug) }}</guid>
            <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            <media:content url="{{ optional($post->featured_image)->getUrl('post-thumb') ?? $post->default_fake_image($post->slug, 640, 362) }}" medium="image"/>
        </item>
        @endforeach


    </channel>

</rss>
