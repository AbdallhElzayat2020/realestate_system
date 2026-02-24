@csrf
<div class="row g-4">
    <div class="col-md-6">
        <label class="form-label">Status / الحالة</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="active" {{ old('status', $partner->status ?? 'active') === 'active' ? 'selected' : '' }}>Active / نشط</option>
            <option value="inactive" {{ old('status', $partner->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive / غير نشط</option>
        </select>
        @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="order">Display Order</label>
        <input type="number" id="order" name="order" class="form-control @error('order') is-invalid @enderror"
            value="{{ old('order', $partner->order ?? 0) }}" min="0" placeholder="0">
        <small class="text-muted">الأصغر يظهر أولاً</small>
        @error('order')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="name">Name / الاسم</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $partner->name ?? '') }}" placeholder="Partner name" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="logo">Logo / الشعار</label>
        <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
        @if(isset($partner) && $partner->logo)
            <div class="mt-2 d-flex align-items-center gap-3">
                <img src="{{ asset($partner->logo) }}" alt="" class="img-fluid rounded border" style="max-height: 80px; object-fit: contain;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="remove_logo" name="remove_logo">
                    <label class="form-check-label" for="remove_logo">
                        حذف الشعار الحالي
                    </label>
                </div>
            </div>
        @endif
        <small class="text-muted d-block mt-1">Logo image (optional)</small>
        @error('logo')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="link">Link (optional)</label>
        <input type="url" id="link" name="link" class="form-control @error('link') is-invalid @enderror"
            value="{{ old('link', $partner->link ?? '') }}" placeholder="https://...">
        @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary"><i class="ti ti-check me-1"></i> Save</button>
    <a href="{{ route('dashboard.partners.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>
