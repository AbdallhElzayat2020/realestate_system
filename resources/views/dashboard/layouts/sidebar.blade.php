<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="javascript:void(0);" class="app-brand-link">
            {{-- <img src="{{ asset('assets/website/images/logo.png') }}" alt="Logo" width="160"> --}}
            Bazigha
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
            <a href="{{ route('dashboard.home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Home">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.contacts.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.contacts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Contacts">Contacts</div>
            </a>
        </li>

        {{-- Hidden: Quotes / FAQs / Job Applications --}}
        {{--
        <li class="menu-item {{ request()->routeIs('dashboard.quotes.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.quotes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                <div data-i18n="Quotes">Quotes</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('dashboard.faqs.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.faqs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-help"></i>
                <div data-i18n="FAQs">FAQs</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('dashboard.job-applications.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.job-applications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Job Applications">Job Applications</div>
            </a>
        </li>
        --}}

        {{-- <li class="menu-item {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-category"></i>
                <div data-i18n="Categories">Categories</div>
            </a>
        </li> --}}

        <li class="menu-item {{ request()->routeIs('dashboard.services.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.services.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Services">Services</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.projects.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.projects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building"></i>
                <div data-i18n="Projects">Projects</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Products">Products</div>
            </a>
        </li> --}}

        <li class="menu-item {{ request()->routeIs('dashboard.blogs.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.blogs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-article"></i>
                <div data-i18n="Blogs">Blogs</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.partners.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.partners.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Partners">Partners</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.testimonials.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.testimonials.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-message-circle"></i>
                <div data-i18n="Testimonials">Testimonials</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.settings.edit') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
        </li>

    </ul>
</aside>
