<?php

require_once('IFigure.php');

class King extends Figure {
    protected array $icon = ["\u{265A}", "\u{2654}"];

}

// Функция для определения возможных ходов короля
function getKingMoves($row, $col)
{
    // Массив для хранения всех возможных ходов
    $moves = [];
    
    // Определяем все возможные направления движения короля
    $directions = [
        [-1, -1], [-1, 0], [-1, 1],
        [0, -1],          [0, 1],
        [1, -1], [1, 0], [1, 1]
    ];
    
    foreach ($directions as [$dRow, $dCol]) {
        $newRow = $row + $dRow;
        $newCol = $col + $dCol;
        
        // Проверяем, находится ли новая позиция внутри доски
        if ($newRow >= 0 && $newRow <= 7 && $newCol >= 0 && $newCol <= 7) {
            $moves[] = [$newRow, $newCol];
        }
    }
    
    return $moves;
}

// Пример использования функции
$kingPosition = [4, 4]; // Начальная позиция короля
$possibleMoves = getKingMoves($kingPosition[0], $kingPosition[1]);

echo "Возможные ходы короля:\n";
foreach ($possibleMoves as $move) {
    echo "[$move[0], $move[1]]\n";
}
