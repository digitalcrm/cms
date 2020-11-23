<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aricle: print</title>
</head>
<body onload="window.print();">
    <table>
        @foreach($print_article as $print_article)

		<tr>
            <td align="center" style="font-size: 20px; font-weight: bold;">{{$print_article->title}}</td>
        </tr>

		<tr>
            <td>{!! $print_article->body !!}</td>
        </tr>

        @endforeach
	</table>
</body>
</html>
