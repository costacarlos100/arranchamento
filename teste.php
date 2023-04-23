<?php
// Define o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

// Define o formato de data que será utilizado
$dateFormat = 'd/m/Y';

// Obtém a data atual
$today = date('Y-m-d');

// Obtém a data da próxima segunda-feira
$nextMonday = date('Y-m-d', strtotime('next Monday', strtotime($today)));

// Define um array com os dias da semana
$daysOfWeek = array(
    'Segunda-feira',
    'Terça-feira',
    'Quarta-feira',
    'Quinta-feira',
    'Sexta-feira'
);

// Loop pelos dias da semana
foreach ($daysOfWeek as $day) {
    // Obtém a data do próximo dia da semana
    $nextDay = date('Y-m-d', strtotime("next $day", strtotime($nextMonday . ' - 1 day')));

    // Formata a data e exibe na tela
    echo "$day: " . date($dateFormat, strtotime($nextDay)) . "<br>";
}
?>
