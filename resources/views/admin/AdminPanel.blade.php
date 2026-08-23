<x-app-layout>
  <div class="min-h-screen bg-[#FFF5EC] flex flex-col lg:flex-row mt-20 lg:mt-20">
    <aside class="w-full lg:w-64 bg-white shadow-lg p-6 flex flex-col rounded-b-2xl lg:rounded-r-2xl lg:rounded-bl-none overflow-y-auto max-h-screen">
    <h1 class="text-4xl font-extrabold mb-10 text-[#2E266F] border-b-2 border-gray-100 pb-4">Admin Panel</h1>
    <nav class="flex flex-col space-y-4 flex-grow">
        <!-- Products -->
        <a href="{{ route('adminProduct') }}" class="flex items-center px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-[#2E266F] hover:text-white rounded-lg transition duration-300 ease-in-out">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            Products
        </a>

        <!-- Users -->
        <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-[#2E266F] hover:text-white rounded-lg transition duration-300 ease-in-out">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm-6-4a4 4 0 00-4 4v1h8v-1a4 4 0 00-4-4z"></path>
            </svg>
            Users
        </a>

        <!-- Roles -->
        <a href="{{ route('roles.index') }}" class="flex items-center px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-[#2E266F] hover:text-white rounded-lg transition duration-300 ease-in-out">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0H9m7 4h2a2 2 0 012 2v5a2 2 0 01-2 2H7a2 2 0 01-2-2v-5a2 2 0 012-2h2"></path>
            </svg>
            Roles
        </a>

        <!-- Orders -->
        <a href="{{ route('adminCommande') }}" class="flex items-center px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-[#2E266F] hover:text-white rounded-lg transition duration-300 ease-in-out">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-3-10h.01M6 20h12a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Orders
        </a>
    </nav>
</aside>


    <main class="flex-1 p-6 lg:p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <section class="bg-white rounded-2xl shadow-xl p-4 col-span-1 md:col-span-2 lg:col-span-1 h-72 flex flex-col">
            <h2 class="text-2xl font-bold mb-4 text-[#2E266F] border-b pb-2">Commands per Day</h2>
            <div class="flex-grow relative">
                <canvas id="commandsChart" class="w-full h-full"></canvas>
            </div>
        </section>

        <section class="bg-white rounded-2xl shadow-xl p-4 col-span-1 md:col-span-2 lg:col-span-1 h-72 flex flex-col">
            <h2 class="text-2xl font-bold mb-4 text-[#2E266F] border-b pb-2">Users per Day</h2>
            <div class="flex-grow relative">
                <canvas id="usersChart" class="w-full h-full"></canvas>
            </div>
        </section>

        <section class="space-y-8 col-span-1 lg:col-span-1">

            @php
                // Ensure these variables are passed from your Laravel controller
                $thisMonthCommands = $thisMonthCommands ?? 150; // Default value if not set
                $lastMonthCommands = $lastMonthCommands ?? 120; // Default value if not set
                $isMoreCommands = $thisMonthCommands > $lastMonthCommands;
            @endphp
            <div class="bg-white rounded-2xl shadow-xl p-6 text-center border border-gray-100">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Commands This Month</h3>
                <p class="text-6xl font-extrabold {{ $isMoreCommands ? 'text-green-600' : 'text-red-600' }} mb-2">
                    {{ $thisMonthCommands }}
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    Compared to last month ({{ $lastMonthCommands }})
                </p>
            </div>

            @php
                // Ensure these variables are passed from your Laravel controller
                $thisMonthGain = $thisMonthGain ?? 7500.50; // Default value if not set
                $lastMonthGain = $lastMonthGain ?? 6800.25; // Default value if not set
                $isMoreGain = $thisMonthGain > $lastMonthGain;
            @endphp
            <div class="bg-white rounded-2xl shadow-xl p-6 text-center border border-gray-100">
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Total Gain This Month</h3>
                <p class="text-6xl font-extrabold {{ $isMoreGain ? 'text-green-600' : 'text-red-600' }} mb-2">
                    {{ number_format($thisMonthGain, 2) }} DA
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    Compared to last month ({{ number_format($lastMonthGain, 2) }} DA)
                </p>
            </div>

        </section>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Make sure $commands and $users are passed from your Laravel controller
    // Example: return view('your.blade.view', ['commands' => $commandsData, 'users' => $usersData]);

    // Commands Chart
    const commandsCtx = document.getElementById('commandsChart').getContext('2d');
    const commandsChart = new Chart(commandsCtx, {
        type: 'line',
        data: {
            // Using Blade syntax to pass data from your Laravel controller
            labels: {!! json_encode($commands->pluck('date')) !!},
            datasets: [{
                label: 'Commands per Day',
                data: {!! json_encode($commands->pluck('total')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            },
            responsive: true,
            maintainAspectRatio: false, // Important for charts to fill their container
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        }
    });

    // Users Chart
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    const usersChart = new Chart(usersCtx, {
        type: 'line',
        data: {
            // Using Blade syntax to pass data from your Laravel controller
            labels: {!! json_encode($users->pluck('date')) !!},
            datasets: [{
                label: 'Users per Day',
                data: {!! json_encode($users->pluck('total')) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            },
            responsive: true,
            maintainAspectRatio: false, // Important for charts to fill their container
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        }
    });
</script>


</x-app-layout>
