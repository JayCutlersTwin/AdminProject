@extends('layouts.layout')

@section('content')
    <div class="main-content">

        <section class="welcomeSection" id="WELCOME">
            <div class="container">
                <div class="welcomeDiv">
                    <h4>Welcome {{ session('LoggedUser') }}</h4>
                </div>
            </div>
        </section>

        <?php
            $todaysDate = date("Y-m-d");

            $url = 'https://newsapi.org/v2/everything?q=tesla&language=en&pageSize=5';
            $url .= '&from=' . $todaysDate . '&sortBy=publishedAt&apiKey=978bed0e4f6a494b8882706c5dc74600';
            $response = file_get_contents($url);
            $newsData = json_decode($response);
        ?>

        <section class="fakeNewsSection" id="FAKENEWS">
            <div class="container">
                <div class="fakeNewsHolder">
                    <div class="container">
                        <div class="content">
                            <h1>The News</h1>
                            <?php
                                foreach ($newsData->articles as $news) {
                            ?>
                            <div class="contentImage">
                                <img src="<?php echo $news->urlToImage ?>" alt="News Article Image">
                            </div>
                            <h3 class="newsTitle"><a href="<?php echo $news->url ?>"><?php echo $news->title ?></a></h3>
                            <p class="newsDescription"><?php echo $news->description ?></p>
                            <p class="newsPublished"><?php echo $news->publishedAt ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
