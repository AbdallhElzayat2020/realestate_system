@if (!empty($contactButtonsEnabled))
    <div class="floating-buttons">

        @if (!empty($whatsappUrl))
            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                class="btn floating-btn whatsapp-btn rounded-circle mb-2" title="واتساب">
                <i class="fab fa-whatsapp"></i>
            </a>
        @endif

        @if (!empty($phoneButtonEnabled))
            <a href="tel:{{ config('site.phone_tel') }}" class="btn floating-btn phone-btn rounded-circle" title="اتصال">
                <i class="fas fa-phone"></i>
            </a>
        @endif

    </div>
@endif

<div class="floating-buttons-right">
    <button type="button" class="btn floating-btn scroll-top-btn rounded-circle" title="إلى الأعلى">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>
