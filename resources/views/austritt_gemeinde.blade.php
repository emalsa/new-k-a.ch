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
            height: 1.85cm;
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
    if($mode == 'kath'){
      $confessionFull='Römisch-Katholische';
    }
    else {
      $confessionFull='Evangelisch Reformierte';
    }


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

        @if(!empty($gemeindeAddressData))
            <div class="receiver">
                <p>{{$gemeindeAddressData['anschriftAddress']}}</p>
                <p>{{$gemeindeAddressData['streetAdditionalAddress']}}</p>
                <p>{{$gemeindeAddressData['streetAddress']}}</p>
                <p>{{$gemeindeAddressData['postalAddress']}}&nbsp;{{$gemeindeAddressData['locationAddress']}}</p>
            </div>
        @endif


        <div class="date">
            <p>{{ $currentDate }}</p>
        </div>
        <div class="subject">
            <p><b>Kopie f&uuml;r Gemeinde/Steueramt: Kirchenaustritt</b></p>
        </div>
        <div class="text">
            <div class="salutation">
                <p>Sehr geehrte Damen und Herren</p>
            </div>
            <div class="text-1-1">
                <p>
                    <b>
                        Ein entsprechendes Schreiben wurde der Kirchgemeinde zugestellt.
                        Dieses Schreiben dient zu Informationszwecken, um die Gemeinde von meinem Kirchenaustritt zu
                        informieren und um gegebenenfalls die nötigen Schritte bereits einzuleiten.
                    </b>
                </p>
            </div>
            <div class="text-1-2">
                <p>
                    Nach reiflicher &Uuml;berlegung habe ich mich entschieden, aus der öffentlich-rechtlichen
                    Institution der Landeskirche auszutreten.
                    Hiermit erkl&auml;re ich meinen vollst&auml;ndigen Austritt sowohl aus der Kirchgemeinde als auch
                    aus der {{$confessionFull}} Kirche mit sofortiger Wirkung.
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
                        <td>{{substr($confessionFull, 0, -1)}}</td>
                    </tr>
                </table>
            </div>

            @if(!empty($childrenData))
                <div class="text-falls-kinder">
                    <p>
                        Meine unten aufgef&uuml;hrten Kinder haben ebenfalls entschieden ab sofort aus der Kirchgemeinde
                        und aus der {{$confessionFull}} Kirche auszutreten.
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
                                <td>{{substr($confessionFull, 0, -1)}}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            @endif
            <!-- @todo: Children handle taufdatum/ort?-->
            @if($showTaufdatumFehlt)
                <div class="text-falls-taufdaten-fehlen">
                    <p>
                        Das Fehlen des Taufdatums oder Tauforts ist kein Hindernis und darf nicht als Grund f&uuml;r die
                        Ablehnung des Kirchenaustritts verwendet werden.
                    </p>
                </div>
            @endif
            <div class="text-2">
                <p>
                    Ich w&uuml;nsche keine Kontaktaufnahme von der Kirche und lehne jegliche Gespr&auml;che dankend ab.
                    Ich beabsichtige, keine Gr&uuml;nde f&uuml;r meinen Austritt zu nennen. Dies ist f&uuml;r einen
                    Austritt nicht notwendig.
                    Ich bin nur f&uuml;r eine Kontaktaufnahme bereit, falls es Gr&uuml;nde gibt, die meinen Austritt
                    unumg&auml;nglich verhindern w&uuml;rden.
                    Ich bitte Sie h&ouml;flich, mich sofort zu informieren, sollte ein solcher Fall eintreten.
                    Ich bin damit einverstanden, dass nicht korrekte oder falsch aufgef&uuml;hrte Informationen in
                    meiner Kirchenakte belassen werden k&ouml;nnen.
                </p>
            </div>

            @if(!empty($childrenData))
                <div class="text-falls-kinder-2">
                    <p>
                        Die oben genannten Punkte gelten auch f&uuml;r die erw&auml;hnten Kinder. Der Austritt wurde gr&uuml;ndlich
                        mit ihnen besprochen und ich versichere Ihnen, dass sie sich bewusst sind &uuml;ber die
                        damit einhergehenden Konsequenzen, einschließlich des Verzichts auf zuk&uuml;nftige Sakramente
                        und &auml;hnliches.
                    </p>
                </div>
            @endif
        </div>
    </div>
    <div class="text-3">
        <p>
            Ich bin mir der m&ouml;glichen Folgen und Konsequenzen meines Austritts aus der Kirche vollst&auml;ndig
            bewusst und ich bin informiert &uuml;ber die Rechte, auf die ich mit meinem Austritt verzichte.
            Ich bitte Sie, alle notwendigen Schritte einzuleiten und die relevanten Stellen, wie die Einwohnerkontrolle
            und die Kirchgemeinde, zu informieren.
        </p>
    </div>
    <div class="text-4">
        <p>Freundliche Gr&uuml;sse<br/>
            {{$personData['vorname']}}&nbsp;{{$personData['nachname']}}
        </p>
    </div>
</div>
</body>
</html>
