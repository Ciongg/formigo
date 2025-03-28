<x-layout>
    
@section('content')
<div class="container mx-auto px-6 py-12">
    <!-- Hero Section -->
    <div class="flex flex-col lg:flex-row items-center justify-between">
        <div class="max-w-lg">
            <h1 class="text-4xl font-bold leading-tight">
                Powering Research <br> Rewarding Participants
            </h1>
            <a href="{{ route('register') }}" class="mt-4 inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded shadow hover:bg-blue-600">
                Register
            </a>
            <div class="flex items-center mt-4 space-x-2">
                <div class="flex -space-x-2">
                    <img src="https://via.placeholder.com/40" class="w-8 h-8 rounded-full border border-white" alt="User1">
                    <img src="https://via.placeholder.com/40" class="w-8 h-8 rounded-full border border-white" alt="User2">
                    <img src="https://via.placeholder.com/40" class="w-8 h-8 rounded-full border border-white" alt="User3">
                </div>
                <div class="text-yellow-500 flex items-center">
                    ★★★★★
                </div>
                <span class="text-gray-600">3000+ reviews</span>
            </div>
        </div>
        <div class="mt-6 lg:mt-0">
            <img src="https://via.placeholder.com/500x300" class="rounded-lg shadow-lg" alt="Dashboard Preview">
        </div>
    </div>

    <!-- Getting Started Section -->
    <div class="mt-16 text-center">
        <h2 class="text-2xl font-bold bg-gray-100 inline-block px-6 py-2 rounded">
            Getting Started is Easy
        </h2>
    </div>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div>
            <div class="text-blue-500 text-5xl">🚶</div>
            <h3 class="mt-4 font-semibold">Login</h3>
            <p class="text-gray-600">If you do not have an account create one. Use school email for educational access.</p>
            <a href="{{ route('register') }}" class="text-blue-500 font-semibold mt-2 block">CREATE ACCOUNT</a>
        </div>

        <div>
            <div class="text-blue-500 text-5xl">📝</div>
            <h3 class="mt-4 font-semibold">Answer Applicable Survey</h3>
            <p class="text-gray-600">Choose a survey that matches your profile and eligibility requirements.</p>
        </div>

        <div>
            <div class="text-blue-500 text-5xl">🎁</div>
            <h3 class="mt-4 font-semibold">Earn points</h3>
            <p class="text-gray-600">Rack up points by answering surveys, and indulging in limited-time offers. Redeem for gift cards, coupons, or donations.</p>
            <a href="#" class="text-blue-500 font-semibold mt-2 block">VIEW REWARDS</a>
        </div>
    </div>
</div>
@endsection

</x-layout>