@csrf
<div class="row g-4">
    {{-- صف واحد: الحالة، حالة المشروع، الخدمة --}}
    <div class="col-md-4">
        <label class="form-label">Status / الحالة</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="active" {{ old('status', $project->status ?? 'active') === 'active' ? 'selected' : '' }}>Active / نشط</option>
            <option value="inactive" {{ old('status', $project->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive / غير نشط</option>
        </select>
        @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Project State / حالة المشروع</label>
        <select name="project_state" class="form-select @error('project_state') is-invalid @enderror">
            <option value="">— اختر —</option>
            @foreach(\App\Models\Project::PROJECT_STATES as $value => $label)
                <option value="{{ $value }}" {{ old('project_state', $project->project_state ?? '') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <small class="text-muted d-block mt-1">قيد التنفيذ / منتهي / مخطط له</small>
        @error('project_state')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Service / الخدمة</label>
        <select name="service_id" class="form-select @error('service_id') is-invalid @enderror">
            <option value="">— لا خدمة —</option>
            @foreach($services as $svc)
                <option value="{{ $svc->id }}" {{ old('service_id', $project->service_id ?? '') == $svc->id ? 'selected' : '' }}>{{ $svc->getTranslation('name', 'en') }}</option>
            @endforeach
        </select>
        <small class="text-muted d-block mt-1">المشروع يتبع خدمة (اختياري)</small>
        @error('service_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    {{-- عنوان EN / AR --}}
    <div class="col-md-6">
        <label class="form-label" for="name_en">Title (English)</label>
        <input type="text" id="name_en" name="name[en]" class="form-control @error('name.en') is-invalid @enderror"
            value="{{ old('name.en', $project->getTranslation('name', 'en') ?? '') }}" placeholder="Project title in English" />
        @error('name.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="name_ar">Title (Arabic)</label>
        <input type="text" id="name_ar" name="name[ar]" dir="rtl" class="form-control @error('name.ar') is-invalid @enderror"
            value="{{ old('name.ar', $project->getTranslation('name', 'ar') ?? '') }}" placeholder="عنوان المشروع بالعربية" />
        @error('name.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label" for="slug">Slug (optional)</label>
        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', $project->slug ?? '') }}" placeholder="project-slug" style="max-width: 400px;" />
        @error('slug')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    {{-- الوصف (Summernote) --}}
    <div class="col-12">
        <label class="form-label" for="description_en">Description (English)</label>
        <textarea id="description_en" name="description[en]" rows="5" class="form-control @error('description.en') is-invalid @enderror"
            placeholder="Project description in English...">{{ old('description.en', $project->getTranslation('description', 'en') ?? '') }}</textarea>
        @error('description.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description_ar">Description (Arabic)</label>
        <textarea id="description_ar" name="description[ar]" rows="5" dir="rtl" class="form-control @error('description.ar') is-invalid @enderror"
            placeholder="وصف المشروع بالعربية...">{{ old('description.ar', $project->getTranslation('description', 'ar') ?? '') }}</textarea>
        @error('description.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- الخريطة --}}
    <div class="col-12">
        <label class="form-label" for="map">Map / الخريطة</label>
        <textarea id="map" name="map" rows="3" class="form-control @error('map') is-invalid @enderror"
            placeholder="https://maps.app.goo.gl/... أو iframe من Google Maps">{{ old('map', $project->map ?? '') }}</textarea>
        <small class="text-muted d-block mt-1">رابط الخريطة (مثل maps.app.goo.gl) أو كود iframe للتضمين</small>
        @error('map')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    {{-- صورة المشروع الأساسية: واجهة البوكس + داخل صفحة المشروع --}}
    <div class="col-12">
        <label class="form-label" for="thumbnail">صورة المشروع الأساسية / Main project image</label>
        <input type="file" id="thumbnail" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*" />
        <small class="text-muted d-block mt-1">تظهر في بطاقة المشروع (واجهة البوكس) وفي أعلى صفحة تفاصيل المشروع.</small>
        @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if($project->thumbnail ?? $project->banner ?? $project->main_image ?? null)
            @php $mainImg = $project->thumbnail ?? $project->banner ?? $project->main_image; @endphp
            <div class="mt-2"><img src="{{ asset($mainImg) }}" alt="" class="img-fluid rounded border" style="max-height: 140px; object-fit: cover;" /></div>
        @endif
    </div>

    <div class="col-12">
        <label class="form-label" for="images">معرض الصور / Gallery Images</label>
        <input type="file" id="images" name="images[]" class="form-control @error('images') is-invalid @enderror" accept="image/*" multiple />
        <small class="text-muted d-block mt-1">صور إضافية تظهر داخل صفحة تفاصيل المشروع. يمكن اختيار أكثر من صورة.</small>
        @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
        @if(isset($project->images) && is_array($project->images) && count($project->images) > 0)
            <div class="row g-2 mt-2">
                @foreach($project->images as $img)
                    <div class="col-auto">
                        <img src="{{ asset($img) }}" alt="" class="rounded border" style="width:80px;height:60px;object-fit:cover;" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary"><i class="ti ti-check me-1"></i> Save</button>
    <a href="{{ route('dashboard.projects.index') }}" class="btn btn-label-secondary">Cancel</a>
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
    if ($('#description_en').length) {
        $('#description_en').summernote($.extend({}, summernoteCommon, { placeholder: 'Project description in English...' }));
    }
    if ($('#description_ar').length) {
        $('#description_ar').summernote($.extend({}, summernoteCommon, { lang: 'ar-AR', placeholder: 'وصف المشروع بالعربية...' }));
    }
});
</script>
@endpush
