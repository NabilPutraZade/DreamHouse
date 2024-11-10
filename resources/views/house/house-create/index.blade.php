<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light shadow-sm border-0 mb-5 w-auto" style="border-radius: 15px;">
                    <div class="card-body text-center py-5">
                        <h1 class="fw-bold text-primary mb-0" style="font-size: 2.5rem;">Tambahkan Rumah Baru</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <form action="{{ route('houses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Rumah -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Rumah</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga (Rp)</label>
                            <input type="number" id="price" name="price"
                                class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Rumah</label>
                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-end">
                            <a href="{{ route('houses.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Rumah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
