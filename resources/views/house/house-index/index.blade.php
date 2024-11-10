<x-layout>
    <div class="container my-5">
        <!-- Card untuk Judul -->
        <div class="card bg-light shadow-sm border-0 mb-5" style="border-radius: 15px;">
            <div class="card-body text-center py-5">
                <h1 class="fw-bold text-primary mb-0" style="font-size: 2.5rem;">Temukan Rumah Impian Anda</h1>
                <p class="text-muted mt-3" style="font-size: 1.2rem;">Jelajahi berbagai pilihan properti dan temukan rumah
                    yang sesuai dengan kebutuhan Anda</p>
            </div>
        </div>

        <!-- Tombol Tambah Rumah -->
        <div class="text-center mb-4">
            <a href="{{ route('houses.create') }}" class="btn btn-primary px-4 py-2">Tambah Rumah</a>
        </div>

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Grid Katalog Rumah -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($houses as $house)
                <div class="col">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="position-relative">
                            <!-- Gambar Rumah -->
                            <img src="{{ asset('storage/' . $house->image) }}" class="card-img-top"
                                alt="{{ $house->name }}"
                                style="max-height: 220px; object-fit: cover; border-radius: 0.5rem 0.5rem 0 0;">
                            <!-- Label Harga -->
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-2"
                                style="border-radius: 0 0.5rem 0 0.5rem;">
                                Rp {{ number_format($house->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Judul Rumah -->
                            <h5 class="card-title fw-bold text-primary">{{ $house->name }}</h5>
                            <!-- Alamat -->
                            <p class="card-text text-muted small"><i class="bi bi-geo-alt-fill"></i>
                                {{ $house->address }}</p>
                            <!-- Deskripsi Singkat -->
                            <p class="card-text">{{ Str::limit($house->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Tombol Lihat Detail -->
                                <a href="{{ route('houses.show', $house->id) }}"
                                    class="btn btn-outline-secondary btn-sm">Lihat Detail</a>
                                <div>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('houses.edit', $house->id) }}"
                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('houses.destroy', $house->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus rumah ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info text-center">Belum ada rumah yang ditambahkan dalam katalog.</div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
