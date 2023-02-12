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
            margin-top: 0.5cm;
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
            height: 1cm;
        }

        .sign span {
            padding-right: 1cm;
            font-style: italic;
        }

        .sign .line {
            padding-top: 1cm;
        }


    </style>

</head>
<body>
<?php
    $showTaufdatumFehlt = NULL;
    if(empty($personData['taufdatum']) || empty($personData['taufort'])) {
      $showTaufdatumFehlt = TRUE;
    }
?>

<div class="page">
    <div class="wrapper">
        <div class="sender">
            <p><?php echo e($personData['vorname']); ?>&nbsp;<?php echo e($personData['nachname']); ?></p>
            <p><?php echo e($personData['streetAddress']); ?></p>
            <p><?php echo e($personData['streetAdditionalAddress']); ?></p>
            <p><?php echo e($personData['postalAddress']); ?>&nbsp;<?php echo e($personData['locationAddress']); ?></p>
        </div>

        <?php if(!empty($churchAddressData)): ?>
            <div class="receiver">
                <p class="einschreiben"><b>Einschreiben</b></p>
                <!--            <p><?php echo e($personData['vorname']); ?>&nbsp;<?php echo e($personData['nachname']); ?></p>-->
                <p><?php echo e($churchAddressData['streetAddress']); ?></p>
                <p><?php echo e($churchAddressData['streetAddress']); ?></p>
                <p><?php echo e($churchAddressData['streetAdditionalAddress']); ?></p>
                <p><?php echo e($churchAddressData['postalAddress']); ?>&nbsp;<?php echo e($churchAddressData['locationAddress']); ?></p>
            </div>
        <?php else: ?>
            <div class="receiver receiver-falls-leer">
                Empfänger
            </div>
        <?php endif; ?>


        <div class="date">
            <p><?php echo e($currentDate); ?></p>
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
                    römisch-katholischen Kirche mit sofortiger Wirkung.
                </p>
            </div>
            <div class="person-data">
                <table>
                    <tr>
                        <td>Vorname:</td>
                        <td><i></i><?php echo e($personData['vorname']); ?></td>
                    </tr>
                    <tr>
                        <td>Nachname:</td>
                        <td><?php echo e($personData['nachname']); ?></td>
                    </tr>
                    <tr>
                        <td>Geburtsdatum:</td>
                        <td><?php echo e($personData['geburtsdatum']); ?></td>
                    </tr>
                    <?php if(!empty($personData['taufort'])): ?>
                        <tr>
                            <td>Taufort:</td>
                            <td><?php echo e($personData['taufort']); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if(!empty($personData['taufdatum'])): ?>
                        <tr>
                            <td>Taufdatum:</td>
                            <td><?php echo e($personData['taufdatum']); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Konfession:</td>
                        <td><?php echo e($personData['konfession']); ?></td>
                    </tr>
                </table>
            </div>

            <?php if(!empty($childrenData)): ?>
                <div class="text-falls-kinder">
                    <p>
                        Meine unten aufgeführten Kinder haben ebenfalls entschieden sofort aus der Kirchgemeinde und aus
                        der römisch-katholischen Kirche austreten.
                    </p>
                </div>
                <div class="tabelle-falls-kinder person-data">
                    <?php $__currentLoopData = $childrenData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if(!$showTaufdatumFehlt && (empty($child['taufdatum']) || empty($child['taufort']))) {
                              $showTaufdatumFehlt = TRUE;
                            }

                        ?>

                        <table>

                            <tr>
                                <td>Vorname:</td>
                                <td><?php echo e($child['vorname']); ?></td>
                            </tr>
                            <tr>
                                <td>Nachname:</td>
                                <td><?php echo e($child['nachname']); ?></td>
                            </tr>
                            <tr>
                                <td>Geburtsdatum:</td>
                                <td><?php echo e($child['geburtsdatum']); ?></td>
                            </tr>
                            <?php if(!empty($child['taufort'])): ?>
                                <tr>
                                    <td>Taufort:</td>
                                    <td><?php echo e($child['taufort']); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if(!empty($child['taufdatum'])): ?>
                                <tr>
                                    <td>Taufdatum:</td>
                                    <td><?php echo e($child['taufdatum']); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td>Konfession:</td>
                                <td><?php echo e($child['konfession']); ?></td>
                            </tr>
                        </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <!-- @todo: Children handle taufdatum/ort?-->
            <?php if($showTaufdatumFehlt): ?>
                <div class="text-falls-taufdaten-fehlen">
                    <p>
                        Das Fehlen des Taufdatums oder Tauforts ist kein Hindernis und darf nicht als Grund für die
                        Ablehnung des Kirchenaustritts verwendet werden.
                    </p>
                </div>
            <?php endif; ?>
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

            <?php if(!empty($childrenData)): ?>
                <div class="text-falls-kinder-2">
                    <p>
                        Die oben genannten Punkte gelten auch für die erwähnten Kinder. Der Austritt wurde gründlich mit
                        ihnen besprochen und ich versichere Ihnen, dass sie sich bewusst sind über die
                        damit einhergehenden Konsequenzen, einschließlich des Verzichts auf zukünftige Sakramente und
                        ähnliches.
                    </p>
                </div>
            <?php endif; ?>
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
    <?php $__currentLoopData = $childrenData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $child['sign'] = TRUE;
        ?>

        <?php if($child['sign']): ?>
            <div class="sign unterschrift-falls-kinder">
                <div class="line">___________________________________________________________________________</div>
                <p>
                    <?php echo e($child['vorname']); ?>&nbsp;<?php echo e($child['nachname']); ?>

                </p>
                <p>
                    <span>Ort, Datum</span><span>Unterschrift</span>
                </p>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</body>
</html>
<?php /**PATH /app/resources/views/austritt.blade.php ENDPATH**/ ?>