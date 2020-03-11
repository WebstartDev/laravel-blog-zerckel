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
            <h2>{{ $category }}</h2>
            <hr/>
        @endforeach
    @endcomponent
    @if($multiplesArticles)
        @component('components.article')@endcomponent
    @else
        @component('components.articles')
            @foreach ($articles as $article)
                @if($article->is_published)
                    <div class="article">
                       <h2> {{ $article->title }} </h2>
                        <span>
                        {{ $article->abstract }}
                    </span>
                    </div>
                @endif
            @endforeach
        @endcomponent
    @endif
</section>
</body>
</html>
