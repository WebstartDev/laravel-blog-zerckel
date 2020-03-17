<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <!-- Fonts -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
@component('components.header')
    {{ $title }}
@endcomponent

<section>
    @component('components.nav')
        @foreach ($categories as $category)
            <h2>
                <a href="/category/{{$category}}">{{ $category }}</a>
            </h2>
            <hr/>

        @endforeach
    @endcomponent
    @if($multiplesArticles)
        @component('components.article')
            <div>
                <h2>
                  {{$article->title}}
                </h2>
                <a href="/author/{{ $article->author }}">{{$article->author}}</a><br/>
                <hr/>
                <span>
                    {{$article->content}}
                </span>
            </div>
        @endcomponent
    @else
        @component('components.articles')

            @if(!$articles->isEmpty())
                @foreach ($articles as $article)
                    <a href="/article/{{$article->id}}">
                        <div class="article">
                            <h2> {{ $article->title }} </h2>
                            Author :    <a href="/author/{{ $article->author }}">{{$article->author}}</a><br/>
                            <span>
                            {{ $article->abstract }}
                            </span>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="article">
                    <h2> No articles for this category </h2>
                </div>
            @endif
        @endcomponent
    @endif
</section>
</body>
</html>
