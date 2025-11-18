<x-landingpage.app :setting="$setting">
    <div class="bg-gray-50 text-gray-800 pt-20">
        <!-- Header -->
        <section class="py-12 px-4 text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-main uppercase mb-4">
                Demografi Penduduk
            </h1>
            <p class="max-w-2xl mx-auto text-gray-600">
                Informasi lengkap mengenai karakteristik demografi penduduk Desa
                Keboharan — mencakup jumlah penduduk, umur, pendidikan, pekerjaan,
                agama, dan lainnya.
            </p>
        </section>


        <!-- Jumlah Penduduk -->
        <section class="max-w-6xl mx-auto grid grid-cols-2 sm:grid-cols-4 gap-4 px-4 mb-12">
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <img src="https://img.icons8.com/color/96/group.png" class="mx-auto mb-2 w-12" />
                <h3 class="font-bold text-main">Total Penduduk</h3>
                <p class="text-2xl font-semibold">{{ number_format($totalPenduduk) }} Jiwa</p>

            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <img src="https://img.icons8.com/color/96/family.png" class="mx-auto mb-2 w-12" />
                <h3 class="font-bold text-main">Kepala Keluarga</h3>
                <p class="text-2xl font-semibold">{{ number_format($totalKK) }} Jiwa</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <img src="https://img.icons8.com/color/96/woman.png" class="mx-auto mb-2 w-12" />
                <h3 class="font-bold text-main">Perempuan</h3>
                <p class="text-2xl font-semibold">{{ number_format($totalPerempuan) }} Jiwa</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <img src="https://img.icons8.com/color/96/man.png" class="mx-auto mb-2 w-12" />
                <h3 class="font-bold text-main">Laki-Laki</h3>
                <p class="text-2xl font-semibold">{{ number_format($totalLaki) }} Jiwa</p>
            </div>
        </section>
        <!-- Grafik Dusun -->
        <section class="max-w-6xl mx-auto px-4 mb-12">
            <h2 class="text-2xl font-bold text-main mb-6">
                Berdasarkan Dusun
            </h2>

            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <!-- Chart di kiri -->
                <div class="w-full md:w-1/2">
                    <canvas id="dusunChart" height="200"></canvas>
                </div>

                <!-- Keterangan di kanan -->
                <div class="w-full md:w-1/2 bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Keterangan</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <span class="inline-block w-4 h-4 bg-main mr-2 rounded"></span>
                            Patoman: <span class="ml-1 text-gray-600" id="patomanValue">1000</span>
                        </li>
                        <li class="flex items-center">
                            <span class="inline-block w-4 h-4 bg-gray-400 mr-2 rounded"></span>
                            Kanigoro: <span class="ml-1 text-gray-600" id="kanigoroValue">500</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Grafik Pendidikan -->
        <section class="max-w-6xl mx-auto px-4 mb-12">
            <h2 class="text-2xl font-bold text-main mb-4">
                Berdasarkan Pendidikan
            </h2>
            <canvas id="pendidikanChart" height="150"></canvas>
        </section>

        <section class="max-w-6xl mx-auto px-4 mb-12">
            <h2 class="text-2xl font-bold text-main mb-4">
                Berdasarkan Pekerjaan
            </h2>

            <canvas id="pekerjaanChart" height="200"></canvas>
        </section>


        <section class="py-8 bg-gray-50">
            <div class="container max-w-6xl mx-auto px-4">
                <h2 class="text-2xl font-bold text-main mb-6">Berdasarkan Agama</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($dataAgama as $agama)
                        <div
                            class="bg-white rounded-2xl shadow-sm p-5 flex items-center space-x-4 border border-gray-100">
                            <img src="
              @switch(strtolower($agama['name']))
                @case('islam') https://cdn-icons-png.flaticon.com/512/1998/1998618.png @break
                @case('kristen') https://cdn-icons-png.flaticon.com/512/1822/1822040.png @break
                @case('katolik') https://cdn-icons-png.flaticon.com/512/4323/4323038.png @break
                @case('hindu') https://cdn-icons-png.flaticon.com/512/3163/3163470.png @break
                @case('buddha') https://cdn-icons-png.flaticon.com/512/4313/4313034.png @break
                @case('konghucu') https://cdn-icons-png.flaticon.com/512/4829/4829168.png @break
                @default https://cdn-icons-png.flaticon.com/512/8212/8212737.png
              @endswitch
            "
                                alt="{{ $agama['name'] }}" class="w-16 h-16" />
                            <div>
                                <h3 class="text-gray-700 font-semibold">{{ $agama['name'] }}</h3>
                                <p class="text-red-600 text-xl font-bold">{{ number_format($agama['jumlah']) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


    </div>
    <script>
        const warnaUtama = "#1D4700";

        // === Grafik Dusun ===
        const labelsDusun = @json($labelsDusun);
        const dataDusun = @json($dataDusun);

        new Chart(document.getElementById("dusunChart"), {
            type: "pie",
            data: {
                labels: labelsDusun,
                datasets: [{
                    data: dataDusun,
                    backgroundColor: [
                        warnaUtama,
                        "#cbd5e1",
                        "#93c5fd",
                        "#fde68a",
                        "#f9a8d4",
                        "#fca5a5",
                    ],
                }, ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom"
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.chart._metasets[0].total;
                                const value = context.parsed;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return ` ${context.label}: ${value} Penduduk (${percentage}%)`;
                            },
                        },
                    },
                },
            },
        });

        // === Grafik Pendidikan ===
        const labelsPendidikan = @json($labelsPendidikan);
        const dataPendidikan = @json($dataPendidikan);

        new Chart(document.getElementById("pendidikanChart"), {
            type: "bar",
            data: {
                labels: labelsPendidikan,
                datasets: [{
                    label: "Jumlah Penduduk",
                    data: dataPendidikan,
                    backgroundColor: warnaUtama,
                }, ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Jumlah Jiwa"
                        }
                    },
                },
            },
        });

         const labelsPekerjaan = @json($labelsPekerjaan);
    const dataPekerjaan = @json($dataPekerjaan);

    new Chart(document.getElementById("pekerjaanChart"), {
        type: "bar",
        data: {
            labels: labelsPekerjaan,
            datasets: [
                {
                    label: "Jumlah Penduduk",
                    data: dataPekerjaan,
                    backgroundColor: "#93c5fd",
                },
            ],
        },
        options: {
            indexAxis: "y", // ⬅️ membuat chart jadi horizontal
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Jumlah Jiwa"
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: "Jenis Pekerjaan"
                    }
                }
            }
        }
    });
    </script>

</x-landingpage.app>
