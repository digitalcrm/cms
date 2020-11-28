<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">

    <channel>

        <atom:link type="application/rss+xml" rel="self" href="{{ $sites['feeds']['main']['url'] }}"/>
        <title>{{ $sites['feeds']['main']['title'] }}></title>
        <link>{{ env('APP_URL') }}</link>
        <description>{{ $sites['feeds']['main']['description'] }}</description>
        <copyright>{{ $sites['feeds']['main']['copyright'] }}</copyright>
        <language>{{ $sites['feeds']['main']['language'] }}</language>
        <lastBuildDate>{{ $rss_latest_posts->first()->updated_at->toRssString() }}</lastBuildDate>
        <!--<image>
            <title>{{ $sites['feeds']['main']['title'] }}</title>
            <url>{{ $sites['feeds']['main']['logo_url'] }}</url>
            <link>{{ env('APP_URL') }}</link>
        </image>-->

        @foreach($rss_latest_posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <description><![CDATA[{!! $post->summary_of_body !!}]]></description>
            <link>{{ route('post.viewitem',$post->slug) }}</link>
            <guid>{{ route('post.viewitem',$post->slug) }}</guid>
            <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
        </item>
        @endforeach


    </channel>

</rss>