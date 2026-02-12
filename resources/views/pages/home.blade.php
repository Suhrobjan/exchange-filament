<x-app title="Главная — УЗЕКС">
    {{-- Hero Section --}}
    @include('pages.home.hero')

    {{-- Commodities Carousel --}}
    @include('pages.home.commodities')

    {{-- News & Announcements --}}
    @include('pages.home.news')

    {{-- Trading Banner (Ready to Start CTA) --}}
    @include('pages.home.trading-banner')

    {{-- Our Advantages --}}
    @include('pages.home.advantages')

    {{-- Partners Section --}}
    @include('pages.home.partners')

    {{-- TOP 5 Brokers & Trading Calendar --}}
    @include('pages.home.trading-calendar')

    {{-- Helpline & Quick Info --}}
    @include('pages.home.helpline')
</x-app>