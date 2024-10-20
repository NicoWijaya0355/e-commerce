<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Order and Revenue Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        html, body {
            height: 100%; /* Ensure body takes full height */
            margin: 0; /* Remove default margins */
            padding: 0; /* Remove default padding */
            background-color: #121212; /* Dark background */
            color: #ffffff; /* Light text color */
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px; /* Add padding inside the container */
        }
        canvas {
            background-color: #1e1e1e; /* Dark canvas background */
            border: 1px solid #333; /* Light border for canvas */
            margin-bottom: 20px; /* Spacing between charts */
            display: block; /* Ensure canvas is treated as a block element */
            max-width: 100%; /* Responsive width */
            height: auto; /* Maintain aspect ratio */
        }
        h1 {
            margin: 0 0 20px; /* Remove top margin and set bottom margin */
        }
    </style>
</head>
<body>
  
    <div class="container">
        <h1>Monthly Order and Revenue Charts</h1>
        
        <canvas id="orderChart" width="400" height="200"></canvas>
        <canvas id="revenueChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Total Orders Chart
        const orderCtx = document.getElementById('orderChart').getContext('2d');
        const orderChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Total Orders',
                data: {!! json_encode(array_values($allMonths)) !!}, // Ensure this data is passed from your controller
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Slightly transparent for dark mode
                borderColor: 'rgba(75, 192, 192, 1)', // Bright line color
                borderWidth: 1
            }]
        };

        const orderChart = new Chart(orderCtx, {
            type: 'line',
            data: orderChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#333'
                        },
                        ticks: {
                            color: '#ffffff'
                        }
                    },
                    x: {
                        grid: {
                            color: '#333'
                        },
                        ticks: {
                            color: '#ffffff'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff'
                        }
                    }
                }
            }
        });

        // Total Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Total Revenue',
                data: {!! json_encode(array_values($allMonthsRevenue)) !!}, // Ensure this data is passed from your controller
                backgroundColor: 'rgba(255, 159, 64, 0.6)', // Slightly transparent for dark mode
                borderColor: 'rgba(255, 159, 64, 1)', // Bright line color
                borderWidth: 1
            }]
        };

        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: revenueChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#333'
                        },
                        ticks: {
                            color: '#ffffff'
                        }
                    },
                    x: {
                        grid: {
                            color: '#333'
                        },
                        ticks: {
                            color: '#ffffff'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
