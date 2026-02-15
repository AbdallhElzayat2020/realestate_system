@csrf
<div class="row g-4">
    <div class="col-md-4">
        <label class="form-label">Status / الحالة</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="active" {{ old('status', $testimonial->status ?? 'active') === 'active' ? 'selected' : '' }}>Active / نشط</option>
            <option value="inactive" {{ old('status', $testimonial->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive / غير نشط</option>
        </select>
        @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="order">Order / ترتيب</label>
        <input type="number" id="order" name="order" class="form-control @error('order') is-invalid @enderror"
            value="{{ old('order', $testimonial->order ?? 0) }}" min="0">
        @error('order')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="image">Image / صورة (اختياري)</label>
        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @if(isset($testimonial) && $testimonial->image)
            <div class="mt-2">
                <img src="{{ asset($testimonial->image) }}" alt="" class="rounded-circle" style="width: 56px; height: 56px; object-fit: cover;">
            </div>
        @endif
        @error('image')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="name_en">Name (English)</label>
        <input type="text" id="name_en" name="name[en]" class="form-control @error('name.en') is-invalid @enderror"
            value="{{ old('name.en', $testimonial->getTranslation('name', 'en') ?? '') }}" required>
        @error('name.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="name_ar">Name (Arabic)</label>
        <input type="text" id="name_ar" name="name[ar]" dir="rtl" class="form-control @error('name.ar') is-invalid @enderror"
            value="{{ old('name.ar', $testimonial->getTranslation('name', 'ar') ?? '') }}" required>
        @error('name.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="role_en">Role / الصفة (English, optional)</label>
        <input type="text" id="role_en" name="role[en]" class="form-control @error('role.en') is-invalid @enderror"
            value="{{ old('role.en', $testimonial->getTranslation('role', 'en') ?? '') }}" placeholder="e.g. Residential Client">
        @error('role.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="role_ar">Role / الصفة (Arabic, optional)</label>
        <input type="text" id="role_ar" name="role[ar]" dir="rtl" class="form-control @error('role.ar') is-invalid @enderror"
            value="{{ old('role.ar', $testimonial->getTranslation('role', 'ar') ?? '') }}" placeholder="مثل: عميل سكني">
        @error('role.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="content_en">Content (English)</label>
        <textarea id="content_en" name="content[en]" rows="4" class="form-control @error('content.en') is-invalid @enderror" required
            placeholder="Client quote in English...">{{ old('content.en', $testimonial->getTranslation('content', 'en') ?? '') }}</textarea>
        @error('content.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="content_ar">Content (Arabic)</label>
        <textarea id="content_ar" name="content[ar]" rows="4" dir="rtl" class="form-control @error('content.ar') is-invalid @enderror" required
            placeholder="نص الرأي بالعربية...">{{ old('content.ar', $testimonial->getTranslation('content', 'ar') ?? '') }}</textarea>
        @error('content.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary"><i class="ti ti-check me-1"></i> Save</button>
    <a href="{{ route('dashboard.testimonials.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>
