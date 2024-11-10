<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card Utama untuk Detail Rumah -->
                <div class="card shadow-lg border-0">
                    <!-- Gambar Rumah -->
                    <img src="{{ asset('storage/' . $house->image) }}" class="card-img-top" alt="{{ $house->name }}"
                        style="max-height: 400px; object-fit: cover; border-radius: 0.5rem 0.5rem 0 0;">

                    <div class="card-body">
                        <!-- Judul Rumah dan Lokasi -->
                        <h2 class="card-title text-primary">{{ $house->name }}</h2>
                        <p class="text-muted"><i class="bi bi-geo-alt-fill"></i> {{ $house->address }}</p>

                        <!-- Harga -->
                        <p class="text-muted fs-5"><strong>Harga: </strong>Rp
                            {{ number_format($house->price, 0, ',', '.') }}</p>

                        <!-- Deskripsi Rumah -->
                        <div class="mt-4">
                            <h5>Deskripsi</h5>
                            <p>{{ $house->description }}</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-4">
                            <a href="{{ route('houses.index') }}" class="btn btn-outline-secondary me-2">Kembali ke
                                Katalog</a>
                            <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-primary">Edit Rumah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
