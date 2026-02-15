@csrf
<div class="row g-4">
    <div class="col-12">
        <label class="form-label">Status / الحالة</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" style="max-width: 200px;">
            <option value="active" {{ old('status', $category->status ?? 'active') === 'active' ? 'selected' : '' }}>Active / نشط</option>
            <option value="inactive" {{ old('status', $category->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive / غير نشط</option>
        </select>
        @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="name_en">Name (English)</label>
                <input type="text" id="name_en" name="name[en]" class="form-control @error('name.en') is-invalid @enderror"
                    value="{{ old('name.en', isset($category) ? $category->getTranslation('name', 'en') : '') }}"
                    placeholder="Category name in English" />
                @error('name.en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_ar">Name (Arabic)</label>
                <input type="text" id="name_ar" name="name[ar]" dir="rtl"
                    class="form-control @error('name.ar') is-invalid @enderror"
                    value="{{ old('name.ar', isset($category) ? $category->getTranslation('name', 'ar') : '') }}"
                    placeholder="اسم التصنيف بالعربية" />
                @error('name.ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label" for="slug">Slug (optional)</label>
        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', $category->slug ?? '') }}"
            placeholder="category-slug" />
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-check me-1"></i>
        Save
    </button>
    <a href="{{ route('dashboard.categories.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>
