<!-- FUNCIONES -->
<?php include("funciones.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Hoy</title>
    <link rel="shortcut icon" href="./img/favicon.png">
    <!-- complementos y Framework -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- DateRangePicker -->
    <link href="./css/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="./js/daterangepicker.js"></script>

    <link rel="stylesheet" href="./css/estilos.css">

</head>

<body>
    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- Fin de header -->

    <main class="row">
        <!-- Parte central-->
        <?php include("banner.php"); ?>
        <?php include("eventos-cards.php"); ?>
        <!--Fin de la parte central-->
    </main>

    <!-- Inicio del pie -->
    <?php include("footer.php"); ?>
    <!-- Fin del pie -->

    <?php include("login-modal.php"); ?>
    <?php include("signup-modal.php"); ?>
    <?php include("add-event-modal.php"); ?>

    <script>
        $('#fechas').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD',
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                fromLabel: 'Desde',
                toLabel: 'Hasta',
                customRangeLabel: 'Personalizada',
                weekLabel: 'S',
                daysOfWeek: [
                    'Do',
                    'Lu',
                    'Ma',
                    'Mi',
                    'Ju',
                    'Vi',
                    'Sa'
                ],
                monthNames: [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre'
                ],
                firstDay: 1
            }
        }, function(start, end) {
            $('#fecha_inicio').val(start.format('YYYY/MM/DD'));
            $('#fecha_fin').val(end.format('YYYY/MM/DD'));
        });
    </script>
</body>

</html>