<?php
require_once '../config/database.php';
include '../includes/header.php';

$conn = getDBConnection();

// Default date range (current month)
$startDate = date('Y-m-01');
$endDate = date('Y-m-t');
$currency = 'all';

// Process filters if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = $_POST['start_date'] ?? $startDate;
    $endDate = $_POST['end_date'] ?? $endDate;
    $currency = $_POST['currency'] ?? 'all';
}

// Get summary data
$summaryQuery = "SELECT 
    SUM(CASE WHEN c.type = 'income' THEN t.amount ELSE 0 END) AS total_income,
    SUM(CASE WHEN c.type = 'expense' THEN t.amount ELSE 0 END) AS total_expense,
    SUM(t.amount) AS net_balance
    FROM transactions t
    JOIN categories c ON t.category_id = c.id
    WHERE t.user_id = ? 
    AND t.transaction_date BETWEEN ? AND ?";

if ($currency !== 'all') {
    $summaryQuery .= " AND t.currency_id = ?";
    $stmt = $conn->prepare($summaryQuery);
    $stmt->execute([$_SESSION['user_id'], $startDate, $endDate, $currency]);
} else {
    $stmt = $conn->prepare($summaryQuery);
    $stmt->execute([$_SESSION['user_id'], $startDate, $endDate]);
}
$summary = $stmt->fetch();
?>

<!-- Rest of the HTML and PHP content remains the same -->
<!-- Only the database interaction parts need to be updated to PDO -->
<!-- [Previous content continues with PDO equivalents] -->
