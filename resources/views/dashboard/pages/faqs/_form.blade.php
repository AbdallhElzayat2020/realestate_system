@csrf
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="question_en">Question (English)</label>
        <input type="text" id="question_en" name="question[en]"
            value="{{ old('question.en', data_get($faq?->question, 'en', '')) }}"
            class="form-control @error('question.en') is-invalid @enderror">
        @error('question.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="question_ar">Question (Arabic)</label>
        <input type="text" id="question_ar" name="question[ar]"
            value="{{ old('question.ar', data_get($faq?->question, 'ar', '')) }}"
            class="form-control @error('question.ar') is-invalid @enderror">
        @error('question.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="answer_en">Answer (English)</label>
        <textarea id="answer_en" name="answer[en]" rows="4"
            class="form-control @error('answer.en') is-invalid @enderror">{{ old('answer.en', data_get($faq?->answer, 'en', '')) }}</textarea>
        @error('answer.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="answer_ar">Answer (Arabic)</label>
        <textarea id="answer_ar" name="answer[ar]" rows="4"
            class="form-control @error('answer.ar') is-invalid @enderror">{{ old('answer.ar', data_get($faq?->answer, 'ar', '')) }}</textarea>
        @error('answer.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="status">Status</label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach ($statuses as $status)
                <option value="{{ $status }}" {{ old('status', $faq->status ?? \App\Models\Faq::STATUS_ACTIVE) === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mt-4 d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-device-floppy me-1"></i>
        Save
    </button>
    <a href="{{ route('dashboard.faqs.index') }}" class="btn btn-light">Cancel</a>
</div>
