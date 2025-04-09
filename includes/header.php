<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 p-4">
            <h1 class="text-2xl font-bold mb-8">Finance Manager</h1>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="../index.php" class="flex items-center p-2 rounded hover:bg-blue-700">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="../transactions/list.php" class="flex items-center p-2 rounded hover:bg-blue-700">
                            <i class="fas fa-exchange-alt mr-3"></i>
                            Transactions
                        </a>
                    </li>
                    <li>
                        <a href="../reports/generate.php" class="flex items-center p-2 rounded hover:bg-blue-700">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Reports
                        </a>
                    </li>
                    <li>
                        <a href="../auth/logout.php" class="flex items-center p-2 rounded hover:bg-blue-700">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
