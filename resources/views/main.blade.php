@extends('layouts.app')
@section('create-news')
  <li><a class="nav-link text-primary" href="{{route('create')}}">{{ __('Добавить новость') }}</a></li>
@endsection
@section('content')
    <div class="container">

        <div class="nav-scroller py-1 mb-2 h5">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted"  disabled>Свежие новости</a>
                @foreach($tags as $tag)
                    <form action="{{route('filter')}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <input type="hidden" value="{{$tag->id}}" name="tag_id" />
                            <button type="submit" class="btn btn-link text-primary "><h5>{{$tag->name}}</h5></button>
                        </div>
                    </form>
                @endforeach
            </nav>
        </div>

        @include('inc.messages')
        <div class="row mb-2">
        @foreach($news as $n)

                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">
                              {{\App\Http\Controllers\NewsController::getTagOfNews($n)}}
                            </strong>
                            <h3 class="mb-0">{!! $n->title  !!}</h3>
                            <div class="mb-1 text-muted">{{$n->created_at->format('d.m.Y')}}</div>
                            <p class="card-text mb-auto">{!! $n->preview !!}</p>
                            <a href="{{$n->id}}" class="stretched-link">Подробнее...</a>
                            <form action="" method="POST">

                            </form>
                        </div>
                    </div>
                </div>

        @endforeach
        </div>


{{--    <main role="main" class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8 blog-main">--}}
{{--                <h3 class="pb-4 mb-4 font-italic border-bottom">--}}
{{--                    Последние новости--}}
{{--                </h3>--}}

{{--                <div class="blog-post">--}}
{{--				<h2 class="blog-post-title">Лукашенко заявил о намеках России на присоединение Белоруссии</h2>--}}
{{--                    <p class="blog-post-meta">20.02.2020</p>--}}

{{--				<p>Президент Белоруссии Александр Лукашенко заявил, что Россия намекает на присоединение Белоруссии в обмен на единые цены на энергоносители, передает БелТА.</p>--}}
{{--                    <hr>--}}
{{--				<p>Лукашенко считает, что ни белорусские, ни российские граждане не захотят пойти по этому пути.</p>--}}
{{--                    <blockquote>--}}
{{--					<p>Ранее в СМИ появились слухи, что российский президент Владимир Путин предложил своему коллеге Александру Лукашенко создать сверхдержаву, объединив Россию и Белоруссию. Позднее пресс-секретарь российского лидера Дмитрий Песков опроверг эту информацию.</p>--}}
{{--                    </blockquote>--}}

{{--				<h2>Путин поручил ЦИК организовать голосование по поправкам в Конституцию</h2>--}}
{{--				<p>Президент России Владимир Путин распорядился начать подготовку к общероссийскому голосованию по изменениям в Конституцию. Соответствующее распоряжение опубликовано на официальном интернет-портале правовой информации.«Органам государственной власти и организациям подготовиться к проведению общероссийского голосования по вопросу одобрения изменений в Конституцию», — говорится в тексте.--}}

{{--					Согласно документу, организация подготовки возложена на Центральную избирательную комиссию.--}}

{{--					Отмечается, что объём выделенных бюджетных средств будет не меньше, чем на президентские выборы 2018 года.--}}

{{--					13 февраля глава государства провёл встречу с рабочей группой по подготовке предложений о внесении поправок в основной закон. Он подчеркнул, что «чрезвычайно важно выверить каждое слово, каждую букву».</p>--}}
{{--				<h3>Посол России в Турции сообщил об угрозах из-за событий в Идлибе</h3>--}}
{{--				<p>АНКАРА, 20 фев — РИА Новости. Посол России в Турции Алексей Ерхов сообщил, что ему поступили угрозы из-за обострения ситуации в Идлибе.--}}
{{--					Дипломат отметил, что последние события в сирийской провинции вызвали антироссийскую истерию в турецких соцсетях.</p>--}}

{{--				<p>"Вот эскалация в Сирии. Согласен: очень болезненные события и тревожные дни. Погибли сначала российские офицеры, затем турецкие военнослужащие. Но посмотрите, какая чудовищная свистопляска началась в соцсетях. Не хочется, но процитирую некоторые из высказываний. "Прощайтесь с жизнью", "Никто не будет вас оплакивать", "Настало время вам сгореть" и все такое прочее", — сказал Ерхов в интервью Sputnik Турция.По его словам, подобная ситуация уже была пять лет назад из-за ситуации в Алеппо. </p>--}}
{{--			<p>"Чем кончилось? "Самолетным кризисом" и злодейским убийством посла Андрея Карлова. Кстати, и мне самому уже напрямую угрожают, — добавил посол. — И что, неужели история никого ничему не учит?"--}}
{{--				Ерхов также отметил "кровожадность некоторых авторов блогов и постов, злобу и ненависть, порой отбивающие у них самих охоту и способность даже рассуждать логически".--}}
{{--				"Но вот вторая вещь, на мой взгляд, еще более опасная: это абсолютное нежелание понять партнера, его логику действий, прислушаться к его словам и принять как данность право другого на свою собственную точку зрения, отличную от твоего видения происходящего. Вот такой настрой может обернуться большой бедой", — заключил дипломат.</p>--}}
{{--				<h3>Обострение в Идлибе</h3>--}}
{{--				<p>Ранее Анкара сообщила о пяти погибших при обстреле наблюдательного пункта в Идлибе со стороны сирийской армии.Кроме того, в результате обстрела 3 февраля также погибли восемь турецких военнослужащих. Как заявил президент Тайип Эрдоган, жертвами ответных ударов стали 76 сирийских солдат.</p>--}}

{{--				<p>Глава государства отмечал, что обращался к президенту Владимиру Путину с просьбой оказать давление на сирийского лидера Башара Асада, чтобы правительственные войска прекратили наступление в Идлибе и отошли до конца февраля от турецких наблюдательных пунктов. В противном случае Эрдоган пригрозил военным ответом.--}}
{{--					Турецкий лидер также накануне обвинил Россию и Сирию в обстреле мирных жителей в Идлибе. В свою очередь, Москва эти обвинения отвергла и подчеркнула, что причиной обострения в сирийской провинции стало невыполнение Анкарой своих обязательств. В Минобороны также отметили, что оружие для боевиков поступает из Турции.</p>--}}
{{--                </div><!-- /.blog-post -->--}}

{{--                <div class="blog-post">--}}
{{--				<h2 class="blog-post-title">Себестоимость Sony PlayStation 5 составляет 450 долларов</h2>--}}
{{--                    <p class="blog-post-meta">20.02.2020</p>--}}

{{--				<p>После того как стало известно, из каких компонентов будет состоять консоль PlayStation 5, многие специалисты предположили, что стоимость игровой приставки будет свыше 500 долларов.По данным Bloomberg себестоимость Sony PlayStation 5 сейчас составляет 450 долларов, и такая высокая цена связана с высокой стоимостью комплектующих и их дефицитом.</p>--}}
{{--                    <blockquote>--}}
{{--					<p>Bloomberg пишет, что Sony сейчас ожидает, когда будет озвучена стоимость Xbox Series X от Microsoft, и только после этого озвучит цену на свою приставку.</p>--}}
{{--                    </blockquote>--}}
{{--				<p>Напомним, Sony PlayStation 5 и Xbox Series X поступят в продажу в конце 2020 года. Их выход намечен на ноябрь</p>--}}

{{--                </div><!-- /.blog-post -->--}}

{{--                <div class="blog-post">--}}
{{--				<h2 class="blog-post-title">Сборная России по биатлону стала шестой в смешанной эстафете на ЧМ</h2>--}}
{{--                    <p class="blog-post-meta">20.02.2020 </p>--}}

{{--				<p>Биатлонисты сборной Норвегии завоевали золото в смешанной эстафете (2х6 + 2х7,5 км) на стартовавшем в итальянском Антхольце чемпионате мира. Норвежская команда, в составе которой выступили Марте Рейселанд, Тириль Экхофф, Тарьей Бе и Йоханнес Бе, преодолела дистанцию за 1 час 2 минуты 27,7 секунды. На ее счету семь неточных выстрелов.</p>--}}

{{--				<p>Второй с отставанием в 15,6 секунды стала Италия, на счету которой шесть промахов. Третьей финишировала Чехия – 30,8 секунды отставания с двумя промахами.</p>--}}
{{--				<p>Сборная России (Ирина Старых, Екатерина Юрлова-Перхт, Матвей Елисеев и Александр Логинов), заняла шестое место. У нее восемь промахов и 59,4 секунды отставания от победителей.</p>--}}

{{--					<p>Соревнования в Антхольце будут проходить до 22 февраля.</p>--}}
{{--                </div><!-- /.blog-post -->--}}

{{--            </div><!-- /.blog-main -->--}}

{{--            <aside class="col-md-4 blog-sidebar">--}}
{{--                <div class="p-4 mb-3 bg-light rounded">--}}
{{--                    <h4 class="font-italic">О главном</h4>--}}
{{--				<p class="mb-0">Вертолёт Ми-8, на борту которого находились десять человек, совершил жёсткую посадку в Ямало-Ненецком автономном округе, передаёт РИА. </p>--}}
{{--                </div>--}}

{{--            </aside><!-- /.blog-sidebar -->--}}

{{--        </div><!-- /.row -->--}}

{{--    </main><!-- /.container -->--}}
@endsection

