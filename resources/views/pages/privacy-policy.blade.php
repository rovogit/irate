@extends('layouts.app', ['h' => 'header2'])

@section('title', 'Политика конфиденциальности iRate')
@section('description', 'Политика конфиденциальности проекта iRate. Мы заботимся о сохранности данных наших посетителей.')

@section('content')
    <!-- Breadcrumb Area-->
    <div class="breadcrumb--area bg-img bg-overlay--gray jarallax" style="background-image: url('/img/custom-img/privacy-policy.jpg');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="breadcrumb-title">{{ __('Privacy policy') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Privacy policy') }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="privacy-policy--area section-padding-120">
        <div class="container">
            <div class="col-12 col-md-10">
                <div class="mb-80">
                    <p> Настоящая политика конфиденциальности (далее – «Политика») разработана в соответствии с Федеральным законом от 27.07.2006 № 152-ФЗ «О персональных данных» и устанавливает правила использования сервиса iRate (далее – «Сервис»), персональной информации, получаемой от пользователей сайта irate.info, являющихся гражданами Российской Федерации (далее – «Пользователи»).
                    </p>
                    <p>
                        Текст Политики доступен Пользователям в сети Интернет по сетевому адресу <a href="/privacy-policy">политика конфиденциальности</a>.
                    </p>
                    <p>
                        Использование сайта irate.info (далее – «Сайт») означает выражение Пользователем безоговорочного согласия с Политикой и указанными условиями обработки информации.
                    </p>
                    <p>
                        1. Информация, получаемая Сервисом.
                    </p>
                    <p>
                        1.1. Сервис собирает, получает доступ и использует в определенных Политикой целях персональные данные Пользователя, техническую и иную информацию, связанную с Пользователем.
                    </p>
                    <p>
                        1.2. Под технической информацией понимается информация, которая автоматически передается Сервису в процессе использования Сайта с помощью установленного на устройстве Пользователя программного обеспечения. Техническая информация не является персональными данными. Сервис использует файлы cookies и аналогичные технологии, которые позволяют идентифицировать устройство Пользователя. Файлы cookies – это текстовые файлы, доступные Сервису для обработки информации об активности устройства Пользователя. Пользователь может отключить возможность использования файлов cookies в настройках браузера.
                    </p>
                    <p>
                        1.3. Под персональными данными Пользователя понимается информация, которую Пользователь предоставляет Сервису с помощью Сайта и при последующем взаимодействии с Сервисом, в том числе:
                    </p>
                    <p>
                        1.3.1. фамилия, имя, отчество;
                    </p>
                    <p>
                        1.3.2. адрес электронной почты;
                    </p>
                    <p>
                        1.3.3. страна и город проживания;
                    </p>
                    <p>
                        1.3.4. номер электронного кошелька Пользователя в платежных системах.
                    </p>
                    <p>
                        1.4. Сервис обрабатывает персональные данные, техническую информацию и иную информацию Пользователя в течение всего срока действия заключенного с Пользователем соглашения, а в случае отсутствия такого соглашения – в течение 10 (десяти) лет с момента предоставления указанной информации.
                    </p>
                    <p>
                        1.5. Сайт не является общедоступным источником персональных данных. При этом в случае совершения Пользователем определенных действий его персональные данные могут стать доступными неопределенному кругу лиц, о чем настоящим Пользователь дает свое согласие.
                    </p>
                    <p>
                        2. Цели использования информации, предоставляемой Пользователем.
                    </p>
                    <p>
                        2.1. Информация, предоставленная Пользователем, используется Сервисом исключительно в целях:
                    </p>
                    <p>
                        2.1.1. заключения между Сервисом и Пользователем соглашения, а также исполнения Сервисом такого соглашения;
                    </p>
                    <p>
                        2.1.2. обеспечения Пользователя технической поддержкой;
                    </p>
                    <p>
                        2.1.3. рассмотрения обращений и претензий Пользователя;
                    </p>
                    <p>
                        2.1.4. направления Пользователю рекламных и/или информационных материалов;
                    </p>
                    <p>
                        2.1.5. улучшения работы и модернизации Сайта;
                    </p>
                    <p>
                        3. Способы обработки.
                    </p>
                    <p>
                        3.1. Обработка персональных данных Пользователя означает запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных Пользователя, не подпадающих под специальные категории, на обработку которых Сервису, согласно действующему законодательству Российской Федерации, требуется письменное согласие Пользователя.
                    </p>
                    <p>
                        3.2. Пользователь дает свое согласие Сервису на обработку персональных данных Пользователя, предоставляемых при заполнении любой формы на Сайте и в ходе дальнейшего взаимодействия с Сайтом, в том числе на передачу таких персональных данных третьим лицам во исполнение соглашения между Сервисом и Пользователем, даже когда такая передача осуществляется на территорию иных государств (трансграничная передача).
                    </p>
                    <p>
                        3.3. Обработка персональных данных Пользователя производится Сервисом с использованием баз данных, расположенных на территории Российской Федерации.
                    </p>
                    <p>
                        4. Меры, принимаемые для защиты предоставляемой Пользователем информации, и гарантии Сервисом.
                    </p>
                    <p>
                        4.1. Сервис принимает необходимые и достаточные правовые, организационные и технические меры для защиты информации, предоставляемой Пользователями, от неправомерного или случайного доступа, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий с ней третьих лиц, путем ограничения доступа к такой информации иных Пользователей Сайта, Сервиса, сотрудников и партнеров Сервиса, третьих лиц (за исключением предоставления Сервисом информации, необходимой для исполнения Сервисом обязательств перед Пользователем и требований российского законодательства), а также наложения на таких лиц санкций за нарушение режима конфиденциальности в отношении таких данных.
                    </p>
                    <p>
                        4.2. Сервис гарантирует, что предоставленная Пользователями информация не объединяется со статистическими данными, не предоставляется третьим лицам и не разглашается, за исключением случаев, предусмотренных в Политике.
                    </p>
                    <p>
                        5. Права Сервиса.
                    </p>
                    <p>
                        5.1. Сервис вправе проводить статистические и иные исследования на основе обезличенной информации, предоставленной Пользователем. Сервис вправе предоставлять доступ к таким исследованиям третьим лицам для осуществления таргетинга рекламы. Пользователь также может самостоятельно (при наличии технической возможности на устройстве Пользователя или в программных средствах на устройстве Пользователя) запретить устройству или программным средствам передавать через Сайт информацию, необходимую для осуществления таргетинга рекламы.
                    </p>
                    <p>
                        5.2. Сервис вправе предоставить информацию о Пользователях третьим лицам для выявления и пресечения мошеннических действий, для устранения технических неполадок или проблем с безопасностью, а также в иных случаях, предусмотренных законодательством Российской Федерации.
                    </p>
                    <p>
                        5.3. Сервис вправе предоставлять доступ к информации о Пользователе третьим лицам, если такая передача необходима для исполнения Сервисом соглашения, заключенного с Пользователем.
                    </p>
                    <p>
                        5.4. В случае отзыва Пользователем согласия на обработку персональных данных, Сервис вправе ограничить доступ Пользователя к некоторым или всем функциям Сайта.
                    </p>
                    <p>
                        6. Права Пользователя.
                    </p>
                    <p>
                        6.1. Пользователь может в любое время отозвать согласие на обработку персональных данных, направив Сервису соответствующее письменное уведомление на почтовый адрес Сервиса <a href="mailto:hello@irate.info">hello@irate.info</a>. При этом Пользователь понимает, что Сервис вправе продолжить обработку такой информации в случаях, допустимых применимым законодательством.
                    </p>
                    <p>
                        6.2. Согласие на получение рекламных материалов может быть отозвано Пользователем в любое время путем перехода по соответствующей ссылке, которая содержится в сообщении с рекламными материалами, пришедшем на адрес электронной почты Пользователя, указанный при заполнении регистрационной формы на Сайте.
                    </p>
                    <p>
                        7. Новые редакции
                    </p>
                    <p>
                        7.1. Сервис оставляет за собой право вносить изменения в Политику. На Пользователе лежит обязанность при каждом обращении к Сайту знакомиться с текстом Политики.
                    </p>
                    <p>
                        7.2. Новая редакция Политики вступает в силу по истечении 5 календарных дней с момента ее размещения. Продолжение использования Сайта после вступления в силу новой редакции Политики означает принятие Политики и ее условий Пользователем.
                    </p>
                    <p>
                        7.3. Пользователь не должен пользоваться Сайтом, если Пользователь не согласен с условиями Политики.
                    </p>
                    <p>
                        8. Исключение противоречий.
                    </p>
                    <p>
                        8.1. В случае, когда соглашение между Сервисом и Пользователем содержит положения об использовании персональной информации и/или персональных данных Пользователя, применяются положения Политики и такого соглашения в части, не противоречащей Политике.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="border-top"></div>
    </div>

@endsection
