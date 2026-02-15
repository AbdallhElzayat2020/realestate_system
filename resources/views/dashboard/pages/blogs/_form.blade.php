@csrf
<div class="row g-4">
    <div class="col-12">
        <label class="form-label">Status / الحالة</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" style="max-width: 200px;">
            <option value="active" {{ old('status', isset($blog) ? $blog->status : 'active') === 'active' ? 'selected' : '' }}>Active / نشط</option>
            <option value="inactive" {{ old('status', isset($blog) ? $blog->status : '') === 'inactive' ? 'selected' : '' }}>Inactive / غير نشط</option>
        </select>
        @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="show_on_home" value="1" id="show_on_home"
                {{ old('show_on_home', isset($blog) ? $blog->show_on_home : false) ? 'checked' : '' }}>
            <label class="form-check-label" for="show_on_home">Show on Home / يظهر في الصفحة الرئيسية</label>
        </div>
    </div>
    <div class="col-12">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="title_en">Title (English)</label>
                <input type="text" id="title_en" name="title[en]" class="form-control @error('title.en') is-invalid @enderror"
                    value="{{ old('title.en', isset($blog) ? $blog->getTranslation('title', 'en') : '') }}"
                    placeholder="Blog title in English" />
                @error('title.en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="title_ar">Title (Arabic)</label>
                <input type="text" id="title_ar" name="title[ar]" dir="rtl"
                    class="form-control @error('title.ar') is-invalid @enderror"
                    value="{{ old('title.ar', isset($blog) ? $blog->getTranslation('title', 'ar') : '') }}"
                    placeholder="عنوان المدونة بالعربية" />
                @error('title.ar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label" for="slug">Slug (optional)</label>
        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', $blog->slug ?? '') }}"
            placeholder="blog-post-slug" />
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="content_en">Content (English)</label>
        <textarea id="content_en" name="content[en]" rows="6"
            class="form-control summernote-editor @error('content.en') is-invalid @enderror"
            placeholder="Blog content in English...">{{ old('content.en', isset($blog) ? $blog->getTranslation('content', 'en') : '') }}</textarea>
        @error('content.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="content_ar">Content (Arabic)</label>
        <textarea id="content_ar" name="content[ar]" rows="6" dir="rtl"
            class="form-control summernote-editor @error('content.ar') is-invalid @enderror"
            placeholder="محتوى المدونة بالعربية...">{{ old('content.ar', isset($blog) ? $blog->getTranslation('content', 'ar') : '') }}</textarea>
        @error('content.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" />
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @isset($blog)
            @if($blog->image)
                <div class="mt-2">
                    <img src="{{ asset($blog->image) }}" alt="" class="img-fluid rounded border" style="max-height: 180px; object-fit: cover;" />
                </div>
            @endif
        @endisset
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-check me-1"></i>
        Save
    </button>
    <a href="{{ route('dashboard.blogs.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>

@push('css')
<style>
    .blog-form-card .card-body,
    .card-body .note-editor.note-frame { overflow: visible !important; }
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
        height: 320,
        minHeight: 200,
        maxHeight: 600,
        dialogsInBody: true,
        tabsize: 2,
        toolbar: summernoteFullToolbar,
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ],
            table: [
                ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                ['delete', ['deleteRow', 'deleteCol', 'deleteTable']]
            ]
        },
        callbacks: {
            onInit: function() {
                $('.note-dropdown-menu').css('z-index', 99999);
            }
        }
    };
    if ($('#content_en').length) {
        $('#content_en').summernote($.extend({}, summernoteCommon, { placeholder: 'Blog content in English...' }));
    }
    if ($('#content_ar').length) {
        $('#content_ar').summernote($.extend({}, summernoteCommon, { lang: 'ar-AR', placeholder: 'محتوى المدونة بالعربية...' }));
    }
});
</script>
@endpush
