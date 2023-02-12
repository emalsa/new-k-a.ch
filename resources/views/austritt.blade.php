<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kirchenaustritt</title>
    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->


    <style>
        body {
            font-family: "Helvetica";
            font-size: 15px;
            line-height: 18px;
        }

        div.page {
            /*    !*border-style: solid;*!*/
            /*    !*border-width: 1px;*!*/
            /*    width: 21cm;*/
            /*    height: 29.7cm;*/
            /*    !*margin: 0 auto;*!*/
            padding-top: 1cm;
            padding-left: 1cm;
            padding-right: 1cm;
        }

        div.wrapper {
            max-width: 19.25cm;
        }

        .sender p, .receiver p {
            margin: 0;
        }

        .receiver {
            margin-top: 0.75cm;
            margin-bottom: 0.5cm;
        }

        .date {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
        }

        p {
            margin: 4mm 0 0 0;
        }

        table {
            margin: 2mm 0 2mm 0;
        }

        table tr {
            margin: 0
        }

        td:first-child {
            padding-right: 1cm;
        }

        td:last-child {
            font-style: italic;
        }

        .receiver-falls-leer {
            margin-bottom: 0.5cm;
            height: 1.75cm;
        }

        .sign {
            padding-top: 0.75cm;
        }

        .sign span {
            padding-right: 1cm;
            font-style: italic;
        }

        .sign .line {
            padding-top: 0.25cm;
        }


    </style>

</head>
<body>
@php
    $showTaufdatumFehlt = NULL;
    if(empty($personData['taufdatum']) || empty($personData['taufort'])) {
      $showTaufdatumFehlt = TRUE;
    }

@endphp

@if($showTaufdatumFehlt || empty($childrenData))
    <style>

        body {
            line-height: 19px;
        }

        /*p {*/
        /*    margin: 5mm 0 0 0;*/
        /*}*/
    </style>
@endif

<div class="page">
    <div class="wrapper">
        <div class="sender">
            <p>{{$personData['vorname']}}&nbsp;{{$personData['nachname']}}</p>
            <p>{{$personData['streetAddress']}}</p>
            <p>{{$personData['streetAdditionalAddress']}}</p>
            <p>{{$personData['postalAddress']}}&nbsp;{{$personData['locationAddress']}}</p>
        </div>

        @if(!empty($churchAddressData))
            <div class="receiver">
                <p class="einschreiben"><b>Einschreiben</b></p>
                <!--            <p>{{$personData['vorname']}}&nbsp;{{$personData['nachname']}}</p>-->
                <p>{{$churchAddressData['streetAddress']}}</p>
                <p>{{$churchAddressData['streetAddress']}}</p>
                <p>{{$churchAddressData['streetAdditionalAddress']}}</p>
                <p>{{$churchAddressData['postalAddress']}}&nbsp;{{$churchAddressData['locationAddress']}}</p>
            </div>
        @else
            <div class="receiver receiver-falls-leer">

            </div>
        @endif


        <div class="date">
            <p>{{ $currentDate }}</p>
        </div>
        <div class="subject">
            <p><b>Kirchenaustritt</b></p>
        </div>
        <div class="text">
            <div class="salutation">
                <p>Sehr geehrte Damen und Herren</p>
            </div>
            <div class="text-1">
                <p>
                    Nach reiflicher Überlegung habe ich mich entschieden, aus der Kirche auszutreten.
                    Hiermit erkläre ich meinen vollständigen Austritt sowohl aus der Kirchgemeinde als auch aus der
                    {{$confessionFull}} Kirche mit sofortiger Wirkung.
                </p>
            </div>
            <div class="person-data">
                <table>
                    <tr>
                        <td>Vorname:</td>
                        <td>{{$personData['vorname']}}</td>
                    </tr>
                    <tr>
                        <td>Nachname:</td>
                        <td>{{$personData['nachname']}}</td>
                    </tr>
                    <tr>
                        <td>Geburtsdatum:</td>
                        <td>{{$personData['geburtsdatum']}}</td>
                    </tr>
                    @if(!empty($personData['taufort']))
                        <tr>
                            <td>Taufort:</td>
                            <td>{{$personData['taufort']}}</td>
                        </tr>
                    @endif
                    @if(!empty($personData['taufdatum']))
                        <tr>
                            <td>Taufdatum:</td>
                            <td>{{$personData['taufdatum']}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td>Konfession:</td>
                        <td>{{$personData['konfession']}}</td>
                    </tr>
                </table>
            </div>

            @if(!empty($childrenData))
                <div class="text-falls-kinder">
                    <p>
                        Meine unten aufgeführten Kinder haben ebenfalls entschieden ab sofort aus der Kirchgemeinde und
                        aus
                        der {{$confessionFull}} Kirche auszutreten.
                    </p>
                </div>
                <div class="tabelle-falls-kinder person-data">
                    @foreach($childrenData as $child)
                        @php
                            if(!$showTaufdatumFehlt && (empty($child['taufdatum']) || empty($child['taufort']))) {
                              $showTaufdatumFehlt = TRUE;
                            }

                        @endphp

                        <table>

                            <tr>
                                <td>Vorname:</td>
                                <td>{{$child['vorname']}}</td>
                            </tr>
                            <tr>
                                <td>Nachname:</td>
                                <td>{{$child['nachname']}}</td>
                            </tr>
                            <tr>
                                <td>Geburtsdatum:</td>
                                <td>{{$child['geburtsdatum']}}</td>
                            </tr>
                            @if(!empty($child['taufort']))
                                <tr>
                                    <td>Taufort:</td>
                                    <td>{{$child['taufort']}}</td>
                                </tr>
                            @endif
                            @if(!empty($child['taufdatum']))
                                <tr>
                                    <td>Taufdatum:</td>
                                    <td>{{$child['taufdatum']}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Konfession:</td>
                                <td>{{$child['konfession']}}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            @endif
            <!-- @todo: Children handle taufdatum/ort?-->
            @if($showTaufdatumFehlt)
                <div class="text-falls-taufdaten-fehlen">
                    <p>
                        Das Fehlen des Taufdatums oder Tauforts ist kein Hindernis und darf nicht als Grund für die
                        Ablehnung des Kirchenaustritts verwendet werden.
                    </p>
                </div>
            @endif
            <div class="text-2">
                <p>
                    Ich möchte keine Kontaktaufnahme von der Kirche erhalten und lehne jegliche Gespräche dankend ab.
                    Ich beabsichtige, keine Gründe für meinen Austritt zu nennen. Dies ist für einen Austritt nicht
                    notwendig.
                    Ich bin nur für eine Kontaktaufnahme bereit, falls es Gründe gibt, die meinen Austritt unumgänglich
                    verhindern würden.
                    Ich bitte Sie höflich, mich sofort zu informieren, sollte ein solcher Fall eintreten.
                    Ich bin damit einverstanden, dass nicht korrekte oder falsch aufgeführte Informationen in meiner
                    Kirchenakte belassen werden können.
                </p>
            </div>

            @if(!empty($childrenData))
                <div class="text-falls-kinder-2">
                    <p>
                        Die oben genannten Punkte gelten auch für die erwähnten Kinder. Der Austritt wurde gründlich mit
                        ihnen besprochen und ich versichere Ihnen, dass sie sich bewusst sind über die
                        damit einhergehenden Konsequenzen, einschließlich des Verzichts auf zukünftige Sakramente und
                        ähnliches.
                    </p>
                </div>
            @endif
        </div>
    </div>
    <div class="text-3">
        <p>
            Ich bin mir der möglichen Folgen und Konsequenzen meines Austritts aus der Kirche vollständig bewusst und
            ich bin informiert über die Rechte,
            auf die ich mit meinem Austritt verzichte.
            Ich bitte Sie, alle notwendigen Schritte einzuleiten und die relevanten Stellen, wie die Einwohnerkontrolle
            und die Kirchgemeinde, zu informieren.
        </p>
    </div>
    <div class="text-4">
        <p>
            Ich erwarte Ihre schriftliche Bestätigung über den Austritt.
        </p>
    </div>
    <div class="text-4">
        <p>Freundliche Grüsse<br/>
            Daniele Nicastro
        </p>
    </div>

    <div class="sign">
        <p>
            <span>Ort, Datum</span><span>Unterschrift</span>
        </p>
    </div>
    @foreach($childrenData as $child)
        @if($child['sign'])
            <div class="sign unterschrift-falls-kinder">
                <div class="line">___________________________________________________________________________</div>
                <p>
                    {{$child['vorname']}}&nbsp;{{$child['nachname']}}
                </p>
                <p>
                    <span>Ort, Datum</span><span>Unterschrift</span>
                </p>
            </div>
        @endif
    @endforeach
</div>
</body>
</html>
