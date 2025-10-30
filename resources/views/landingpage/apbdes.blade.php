<x-landingpage.app :setting="$setting">
     <div class="bg-gray-50 text-gray-800 pt-20">
  <!-- HEADER -->
  <section class="py-10 px-6 text-center">
    <h1 class="text-3xl sm:text-4xl font-extrabold text-main uppercase mb-4">
      APB Desa Keboharan <span id="judulTahun">2024</span>
    </h1>
    <p class="text-gray-600 mb-6">
      Laporan Anggaran Pendapatan dan Belanja Desa per Tahun
    </p>

    <!-- Pilihan Tahun -->
<div class="mb-10">
  <label for="tahunSelect" class="block text-lg font-semibold text-main mb-2">
    Pilih Tahun
  </label>
  <div class="relative inline-block">
    <select
      id="tahunSelect"
      class="appearance-none border border-gray-300 rounded-xl px-4 py-2.5 pr-10 bg-white text-gray-700 font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-main/60 focus:border-main transition-all duration-200 ease-in-out hover:border-main/70"
    >
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024" selected>2024</option>
    </select>
    <!-- Ikon panah -->
    <svg
      class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-main pointer-events-none"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </div>
</div>


    <!-- Kartu Statistik -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6" id="statCards">
      <!-- Kartu akan diperbarui lewat JavaScript -->
    </div>
  </section>

  <!-- GRAFIK -->
  <section class="py-10 px-6 bg-white shadow-inner">
    <h2 class="text-2xl font-bold text-main mb-6 text-center">Pendapatan dan Belanja Desa</h2>
    <div class="max-w-5xl mx-auto">
      <canvas id="chartPendapatanBelanja"></canvas>
    </div>
  </section>

  <section class="py-10 px-6">
    <h2 class="text-2xl font-bold text-main mb-6 text-center">Pendapatan Desa</h2>
    <div class="max-w-4xl mx-auto">
      <canvas id="chartPendapatan"></canvas>
    </div>
  </section>

  <section class="py-10 px-6 bg-white">
    <h2 class="text-2xl font-bold text-main mb-6 text-center">Belanja Desa</h2>
    <div class="max-w-4xl md:mx-auto mx-0">
      <canvas id="chartBelanja"></canvas>
    </div>
  </section>

  <section class="py-10 px-6">
    <h2 class="text-2xl font-bold text-main mb-6 text-center">Pembiayaan Desa</h2>
    <div class="max-w-4xl mx-auto">
      <canvas id="chartPembiayaan"></canvas>
    </div>
  </section>
</div>
  <script>
  // Kirim data dari Laravel ke JavaScript
  const dataAPBDes = @json($dataPerTahun);

  const tahunSelect = document.getElementById("tahunSelect");
  const judulTahun = document.getElementById("judulTahun");
  const statCards = document.getElementById("statCards");

  function updateData(tahun) {
    const data = dataAPBDes[tahun];
    judulTahun.textContent = tahun;

    statCards.innerHTML = `
      <div class="bg-white rounded-xl shadow p-5 border-t-4 border-main">
        <h3 class="font-semibold text-gray-600 mb-1">Pendapatan</h3>
        <p class="text-2xl font-bold text-main">Rp${data.pendapatan.toLocaleString("id-ID")}</p>
      </div>
      <div class="bg-white rounded-xl shadow p-5 border-t-4 border-red-600">
        <h3 class="font-semibold text-gray-600 mb-1">Belanja</h3>
        <p class="text-2xl font-bold text-red-600">Rp${data.belanja.toLocaleString("id-ID")}</p>
      </div>
      <div class="bg-white rounded-xl shadow p-5 border-t-4 border-main">
        <h3 class="font-semibold text-gray-600 mb-1">Pembiayaan (Penerimaan)</h3>
        <p class="text-2xl font-bold text-main">Rp${data.pembiayaan.toLocaleString("id-ID")}</p>
      </div>
      <div class="bg-white rounded-xl shadow p-5 border-t-4 border-gray-400">
        <h3 class="font-semibold text-gray-600 mb-1">Surplus / Defisit</h3>
        <p class="text-2xl font-bold text-gray-600">Rp${(data.pendapatan - data.belanja).toLocaleString("id-ID")}</p>
      </div>
    `;

    updateCharts(tahun);
  }

  const chart1 = new Chart(document.getElementById("chartPendapatanBelanja"), {
    type: "bar",
    data: {
      labels: Object.keys(dataAPBDes),
      datasets: [
        { label: "Pendapatan", backgroundColor: "#1D4700", data: Object.values(dataAPBDes).map(d => d.pendapatan) },
        { label: "Belanja", backgroundColor: "#F87171", data: Object.values(dataAPBDes).map(d => d.belanja) },
      ]
    },
    options: { responsive: true }
  });

  const chart2 = new Chart(document.getElementById("chartPendapatan"), {
    type: "bar",
    data: {
      labels: ["Pendapatan Asli Desa", "Pendapatan Transfer", "Pendapatan Lain-lain"],
      datasets: [{ label: "Jumlah", backgroundColor: "#1D4700", data: [] }]
    },
    options: { responsive: true }
  });

  const chart3 = new Chart(document.getElementById("chartBelanja"), {
    type: "bar",
    data: {
      labels: ["Pemerintahan Desa", "Pembangunan", "Pembinaan", "Pemberdayaan", "Bencana"],
      datasets: [{ label: "Belanja", backgroundColor: "#F87171", data: [] }]
    },
    options: { responsive: true }
  });

  const chart4 = new Chart(document.getElementById("chartPembiayaan"), {
    type: "bar",
    data: {
      labels: ["Penerimaan", "Pengeluaran"],
      datasets: [{ label: "Jumlah", backgroundColor: ["#1D4700", "#ccc"], data: [] }]
    },
    options: { responsive: true }
  });

  function updateCharts(tahun) {
    const d = dataAPBDes[tahun];
    chart2.data.datasets[0].data = d.pendapatanRincian;
    chart3.data.datasets[0].data = d.belanjaRincian;
    chart4.data.datasets[0].data = d.pembiayaanRincian;
    chart2.update();
    chart3.update();
    chart4.update();
  }

  tahunSelect.addEventListener("change", e => updateData(e.target.value));
  updateData(Object.keys(dataAPBDes).slice(-1)[0]); // tampilkan tahun terakhir
</script>

</x-landingpage.app>
