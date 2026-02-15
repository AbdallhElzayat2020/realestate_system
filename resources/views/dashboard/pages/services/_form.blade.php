@csrf
<div class="row g-4">
    <div class="col-12">
        <label class="form-label">Status / الحالة</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" style="max-width: 200px;">
            <option value="active" {{ old('status', isset($service) ? $service->status : 'active') === 'active' ? 'selected' : '' }}>Active / نشط</option>
            <option value="inactive" {{ old('status', isset($service) ? $service->status : '') === 'inactive' ? 'selected' : '' }}>Inactive / غير نشط</option>
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
                    value="{{ old('name.en', isset($service) ? $service->getTranslation('name', 'en') : '') }}"
                    placeholder="Service name in English" />
                @error('name.en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_ar">Name (Arabic)</label>
                <input type="text" id="name_ar" name="name[ar]" dir="rtl"
                    class="form-control @error('name.ar') is-invalid @enderror"
                    value="{{ old('name.ar', isset($service) ? $service->getTranslation('name', 'ar') : '') }}"
                    placeholder="اسم الخدمة بالعربية" />
                @error('name.ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label" for="slug">Slug (optional)</label>
        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', $service->slug ?? '') }}"
            placeholder="service-slug" />
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description_en">Description (English)</label>
        <textarea id="description_en" name="description[en]" rows="6"
            class="form-control @error('description.en') is-invalid @enderror"
            placeholder="Service description in English...">{{ old('description.en', isset($service) ? $service->getTranslation('description', 'en') : '') }}</textarea>
        @error('description.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description_ar">Description (Arabic)</label>
        <textarea id="description_ar" name="description[ar]" rows="6" dir="rtl"
            class="form-control @error('description.ar') is-invalid @enderror"
            placeholder="وصف الخدمة بالعربية...">{{ old('description.ar', isset($service) ? $service->getTranslation('description', 'ar') : '') }}</textarea>
        @error('description.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="row g-3 align-items-start">
            <div class="col-md-6">
                <label class="form-label" for="thumbnail">Thumbnail / الصورة المصغرة</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*" />
                @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @isset($service)
                    @if($service->thumbnail)
                        <div class="mt-2">
                            <img src="{{ asset($service->thumbnail) }}" alt="" class="img-fluid rounded border" style="max-height: 120px; object-fit: cover;" />
                        </div>
                    @endif
                @endisset
            </div>
            <div class="col-md-6">
                <label class="form-label" for="banner">Banner / صورة البانر</label>
                <input type="file" id="banner" name="banner" class="form-control @error('banner') is-invalid @enderror" accept="image/*" />
                @error('banner')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @isset($service)
                    @if($service->banner)
                        <div class="mt-2">
                            <img src="{{ asset($service->banner) }}" alt="" class="img-fluid rounded border" style="max-height: 120px; object-fit: cover;" />
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-check me-1"></i>
        Save
    </button>
    <a href="{{ route('dashboard.services.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>

@push('css')
<style>
    .card-body .row { overflow: visible !important; }
    .note-editor { overflow: visible !important; }
    .note-toolbar { z-index: 2; }
</style>
@endpush

@push('scripts')
<script src="{{ asset('vendor/summernote/lang/summernote-ar-AR.min.js') }}"></script>
<script>
$(document).ready(function() {
    var summernoteFullToolbar = [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color', 'backcolor']],
        ['para', ['ul', 'ol', 'paragraph', 'height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video', 'hr']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ];
    var summernoteCommon = {
        height: 280,
        minHeight: 180,
        maxHeight: 500,
        dialogsInBody: true,
        tabsize: 2,
        toolbar: summernoteFullToolbar,
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            link: [['link', ['linkDialogShow', 'unlink']]],
            table: [
                ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                ['delete', ['deleteRow', 'deleteCol', 'deleteTable']]
            ]
        },
        callbacks: { onInit: function() { $('.note-dropdown-menu').css('z-index', 99999); } }
    };
    $('#description_en').summernote($.extend({}, summernoteCommon, { placeholder: 'Service description in English...' }));
    $('#description_ar').summernote($.extend({}, summernoteCommon, { lang: 'ar-AR', placeholder: 'وصف الخدمة بالعربية...' }));
});
</script>
@endpush
