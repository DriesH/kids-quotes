
<style media="screen">
    .illustration {
        width: 100px;
        height: auto;
    }
</style>
    <div class="container">
        @foreach($themes as $theme)
            <a href="?filter={{$theme->id}}">{{$theme->theme_name}}</a>
        @endforeach
        <a href="?filter=random">random</a>



    @foreach($businessQuotes as $businessQuote)
        <div class="container">
            <img src="/business_imgs/{{$businessQuote->illustration_name}}" alt="" class="illustration"/>
            {{ $businessQuote->quote->quote }}
            <p>
                theme: <strong>{{$businessQuote->theme->theme_name}}</strong>
            </p>
        </div>
    @endforeach





    </div>
