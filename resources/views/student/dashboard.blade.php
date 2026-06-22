<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Paneli | Dersekoş</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome (İkonlar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a', // Koyu Mavi
                        secondary: '#ea580c', // Turuncu
                        vip: '#7e22ce', // VIP Mor
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 h-screen flex overflow-hidden">

    <!-- ARKA PLAN KARARTMASI (Mobil için) -->
    <div id="sidebar-overlay" onclick="toggleMenu()" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden transition-opacity"></div>

    <!-- SOL MENÜ (SIDEBAR) -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-primary text-white flex flex-col justify-between shadow-2xl z-50 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out">
        <div>
            <!-- Logo Alanı ve Mobil Kapatma Butonu -->
            <div class="h-16 md:h-20 flex items-center justify-between md:justify-center px-4 border-b border-blue-900">
                <h1 class="text-xl md:text-2xl font-bold tracking-wider uppercase"><i class="fa-solid fa-graduation-cap mr-2"></i>Dersekoş</h1>
                <button onclick="toggleMenu()" class="md:hidden text-white hover:text-gray-300 focus:outline-none text-xl">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            
            <!-- Navigasyon -->
            <nav class="mt-6 px-4">
                <ul class="space-y-2">
                    <li>
                        <button onclick="switchTab('dashboard', this); closeMenuOnMobile();" class="tab-btn w-full flex items-center gap-3 px-4 py-3 bg-blue-800 rounded-lg text-white font-medium transition-colors text-left">
                            <i class="fa-solid fa-house w-5"></i>
                            <span>Ana Sayfa</span>
                        </button>
                    </li>
                    <li>
                        <button onclick="switchTab('account', this); closeMenuOnMobile();" class="tab-btn w-full flex items-center gap-3 px-4 py-3 hover:bg-blue-800 rounded-lg text-gray-300 hover:text-white font-medium transition-colors text-left">
                            <i class="fa-solid fa-user w-5"></i>
                            <span>Hesabım</span>
                        </button>
                    </li>
                    <li>
                        <!-- Üyelik Planlarım Butonu (Test için bunu da tıklayabilirsiniz) -->
                        <button onclick="switchTab('membership', this); closeMenuOnMobile();" class="tab-btn w-full flex items-center gap-3 px-4 py-3 hover:bg-blue-800 rounded-lg text-gray-300 hover:text-white font-medium transition-colors text-left">
                            <i class="fa-solid fa-crown w-5 text-yellow-400"></i>
                            <span>Üyelik Planlarım</span>
                        </button>
                    </li>
                    <li>
                        <button onclick="switchTab('homework', this); closeMenuOnMobile();" class="tab-btn w-full flex items-center gap-3 px-4 py-3 hover:bg-blue-800 rounded-lg text-gray-300 hover:text-white font-medium transition-colors text-left">
                            <i class="fa-solid fa-book-open w-5"></i>
                            <span>Ödevlerim</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        
        <!-- Alt Profil -->
        <div class="p-4 border-t border-blue-900">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-secondary flex items-center justify-center text-white font-bold text-lg shadow-md">
                    AY
                </div>
                <div>
                    <p class="text-sm font-semibold">Ali Yılmaz</p>
                    <p class="text-xs text-blue-300">8. Sınıf Öğrencisi</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- ANA İÇERİK ALANI -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- MOBİL ÜST BAR (Hamburger Menü) -->
        <div class="md:hidden flex items-center justify-between bg-primary text-white p-4 h-16 shadow-md z-30 flex-shrink-0">
            <h1 class="text-xl font-bold uppercase"><i class="fa-solid fa-graduation-cap mr-2"></i>Dersekoş</h1>
            <button onclick="toggleMenu()" class="text-2xl focus:outline-none hover:text-gray-300 transition">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- KAYDIRILABİLİR İÇERİK ALANI -->
        <div class="flex-1 overflow-y-auto">
            
            <!-- ================= ANA SAYFA (DASHBOARD) GÖRÜNÜMÜ ================= -->
            <div id="tab-dashboard" class="tab-content">
                <header class="h-20 bg-white shadow-sm flex items-center justify-between px-4 md:px-8 border-b border-gray-200">
                    <h2 class="text-lg md:text-2xl font-bold text-gray-800">Haftalık Ders Programı</h2>
                </header>
                <div class="p-4 md:p-8">
                    <p class="text-gray-600 mb-8">Ders takviminiz ve kartlarınız bu alanda listelenir...</p>
                </div>
            </div>

            <!-- ================= HESABIM (ACCOUNT) GÖRÜNÜMÜ ================= -->
            <div id="tab-account" class="tab-content hidden">
                <header class="h-20 bg-white shadow-sm flex items-center px-4 md:px-8 border-b border-gray-200">
                    <h2 class="text-lg md:text-2xl font-bold text-gray-800">Hesap Bilgileri</h2>
                </header>
                <div class="p-4 md:p-8">
                    <p class="text-gray-600 mb-8">Profil bilgileriniz bu alanda listelenir...</p>
                </div>
            </div>

            <!-- ================= ÜYELİK PLANLARIM (MEMBERSHIP) GÖRÜNÜMÜ ================= -->
            <div id="tab-membership" class="tab-content hidden">
                <!-- Üst Bilgi -->
                <header class="h-20 bg-white shadow-sm flex items-center justify-between px-4 md:px-8 border-b border-gray-200">
                    <h2 class="text-lg md:text-2xl font-bold text-gray-800">Üyelik Planları</h2>
                    <span class="bg-purple-100 text-vip px-3 py-1 rounded-full text-sm font-semibold border border-purple-200">
                        Mevcut Plan: Ücretsiz
                    </span>
                </header>

                <div class="p-4 md:p-8 max-w-7xl mx-auto pb-10">
                    <div class="text-center mb-10">
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-4">Senin İçin En Uygun Planı Seç</h3>
                        <p class="text-gray-500 max-w-2xl mx-auto">Hedeflerine ulaşman için ihtiyaç duyduğun desteği seçerek öğrenme serüvenine hız kat. İstediğin zaman planını güncelleyebilirsin.</p>
                    </div>

                    <!-- Fiyatlandırma Kartları Grid Yapısı -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                        
                        <!-- 1. ÜCRETSİZ PLAN KARTI -->
                        <div class="bg-white rounded-2xl shadow-md border border-gray-200 flex flex-col hover:shadow-lg transition duration-300">
                            <div class="p-6 bg-gray-50 rounded-t-2xl border-b border-gray-100 text-center">
                                <h4 class="text-xl font-bold text-gray-800 mb-2">Ücretsiz Plan</h4>
                                <p class="text-sm text-gray-500">Sistemi keşfetmek için ideal</p>
                                <div class="mt-4 text-3xl font-black text-gray-800">₺0<span class="text-sm font-medium text-gray-500"> / ay</span></div>
                            </div>
                            <div class="p-6 flex-1">
                                <ul class="space-y-4 text-sm font-medium">
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Haftada 3 Canlı Ders
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Ders kayıtlarını izleme
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Kontenjan Sınırı Yok
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Soru çözüm grubu
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Deneme sınavı grubu üyeliği
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Yazılı Kamplarına Giriş
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Rehberlik Hizmeti
                                    </li>
                                </ul>
                            </div>
                            <div class="p-6 mt-auto">
                                <button class="w-full py-3 bg-gray-100 text-gray-500 font-bold rounded-lg cursor-not-allowed">Mevcut Planınız</button>
                            </div>
                        </div>

                        <!-- 2. DERSE KOŞ PRO PLAN KARTI -->
                        <div class="bg-white rounded-2xl shadow-md border-2 border-primary flex flex-col hover:shadow-xl transition duration-300 relative">
                            <!-- Popüler Etiketi -->
                            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-primary text-white px-4 py-1 rounded-full text-xs font-bold uppercase shadow-sm">
                                Tavsiye Edilen
                            </div>
                            <div class="p-6 bg-blue-50 rounded-t-xl border-b border-blue-100 text-center mt-2">
                                <h4 class="text-xl font-bold text-primary mb-2">Derse Koş Pro</h4>
                                <p class="text-sm text-blue-600">Düzenli çalışma programı arayanlar</p>
                                <div class="mt-4 text-3xl font-black text-gray-800">₺1490<span class="text-sm font-medium text-gray-500"> / ay</span></div>
                            </div>
                            <div class="p-6 flex-1">
                                <ul class="space-y-4 text-sm font-medium">
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Haftada 6 Canlı Ders
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Ders kayıtlarını izleme
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> 15 Kişilik Sınıf (Kontenjanlı)
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Soru çözüm grubu
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Deneme sınavı grubu üyeliği
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Yazılı Kamplarına Giriş
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-400">
                                        <i class="fa-solid fa-xmark text-red-400 w-4"></i> Rehberlik Hizmeti
                                    </li>
                                </ul>
                            </div>
                            <div class="p-6 mt-auto">
                                <button class="w-full py-3 bg-primary hover:bg-blue-800 text-white font-bold rounded-lg shadow transition">Plana Geç</button>
                            </div>
                        </div>

                        <!-- 3. DERSE KOŞ VIP PLAN KARTI -->
                        <div class="bg-white rounded-2xl shadow-xl border-2 border-vip flex flex-col hover:shadow-2xl transition duration-300 transform md:-translate-y-2 relative">
                            <div class="absolute top-0 right-0 bg-yellow-400 text-yellow-900 w-12 h-12 flex items-center justify-center rounded-bl-2xl rounded-tr-xl font-bold">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            <div class="p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-t-xl border-b border-purple-200 text-center">
                                <h4 class="text-xl font-bold text-vip mb-2">Derse Koş VIP</h4>
                                <p class="text-sm text-purple-600">Tüm ayrıcalıklardan faydalanın</p>
                                <div class="mt-4 text-3xl font-black text-gray-800">₺2990<span class="text-sm font-medium text-gray-500"> / ay</span></div>
                            </div>
                            <div class="p-6 flex-1">
                                <ul class="space-y-4 text-sm font-medium">
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Haftada 10 Canlı Ders
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Ders kayıtlarını izleme
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> 15 Kişilik Sınıf (Kontenjanlı)
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Soru çözüm grubu
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Deneme sınavı grubu üyeliği
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Yazılı Kamplarına Giriş
                                    </li>
                                    <li class="flex items-center gap-3 text-gray-700">
                                        <i class="fa-solid fa-check text-green-500 w-4"></i> Rehberlik Hizmeti
                                    </li>
                                </ul>
                            </div>
                            <div class="p-6 mt-auto">
                                <button class="w-full py-3 bg-gradient-to-r from-vip to-purple-800 hover:from-purple-800 hover:to-purple-900 text-white font-bold rounded-lg shadow-lg transition">VIP Ol</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ================= ÖDEVLERİM (HOMEWORK) GÖRÜNÜMÜ ================= -->
            <div id="tab-homework" class="tab-content hidden p-8">
                <h2 class="text-2xl font-bold mb-4">Ödevlerim</h2>
                <p class="text-gray-600">Atanan güncel ödevleriniz burada listelenir.</p>
            </div>

        </div> <!-- /Overflow Alanı Bitişi -->
    </main>

    <!-- JAVASCRIPT KODLARI -->
    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function closeMenuOnMobile() {
            if (window.innerWidth < 768) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        function switchTab(tabId, element) {
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.getElementById('tab-' + tabId).classList.remove('hidden');
            
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-blue-800', 'text-white');
                btn.classList.add('text-gray-300', 'hover:bg-blue-800', 'hover:text-white');
            });
            
            element.classList.add('bg-blue-800', 'text-white');
            element.classList.remove('text-gray-300', 'hover:bg-blue-800', 'hover:text-white');
        }
    </script>
</body>
</html>