<x-layout :header="false" :paddings="false">
    <div class="bg-gray-50 text-gray-800">
        <!-- Hero Section -->
        <main>
            <div class="relative">
                <div class="absolute inset-0">
                    <!-- Background Image with Overlay -->
                    <img src="https://images.unsplash.com/photo-1524129462592-39c523675a63?q=80&w=2070&auto=format&fit=crop"
                        alt="Airplane cockpit view" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-60"></div>
                </div>
                <div class="relative flex justify-center min-h-screen px-4 py-24 sm:px-6 lg:px-8">
                    <div class="max-w-2xl mx-auto text-center mt-32">
                        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
                            Welcome to Airline Prep
                        </h1>
                        <p class="mt-6 text-lg leading-8 text-gray-200">
                            Prepare for your aviation exams with confidence. Access a vast question bank, take practice
                            tests, and track your progress to ensure you're ready for success.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="/exams"
                                class="rounded-md bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors duration-200">
                                Explore Exams
                            </a>
                            @guest
                                <a href="/login"
                                    class="text-base font-semibold leading-6 text-white hover:text-gray-300 transition-colors duration-200">
                                    Login <span aria-hidden="true">&rarr;</span>
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section class="py-20 sm:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Why Choose Airline Prep?
                    </h2>
                    <p class="mt-4 text-lg text-gray-600">Everything you need to pass your exams, all in one place.</p>
                </div>
                <div class="mt-16 grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v11.494m-9-5.747h18"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v11.494m-9-5.747h18"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.253 12H4.747"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19.253V4.747"></path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-medium text-gray-900">Comprehensive Question Bank</h3>
                        <p class="mt-2 text-base text-gray-600">Access thousands of up-to-date questions covering all
                            exam topics and subtopics, curated by industry experts.</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-medium text-gray-900">Realistic Exam Simulations</h3>
                        <p class="mt-2 text-base text-gray-600">Experience the pressure of the real exam with timed
                            practice tests that mimic the format and difficulty of the actual certification.</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-medium text-gray-900">Performance Analytics</h3>
                        <p class="mt-2 text-base text-gray-600">Track your progress with detailed reports. Identify your
                            strengths and weaknesses to focus your study efforts effectively.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="bg-gray-50 py-20 sm:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto lg:max-w-none">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Trusted by Aspiring
                            Aviators</h2>
                        <p class="mt-4 text-lg text-gray-600">Our platform has helped countless students achieve their
                            dreams.</p>
                    </div>
                    <div class="mt-16 grid grid-cols-1 gap-10 lg:grid-cols-2">
                        <div class="p-8 bg-white rounded-lg shadow-md">
                            <blockquote class="text-gray-900">
                                <p>"The question bank is incredibly detailed. I walked into my exam feeling prepared and
                                    confident. Airline Prep was a game-changer for me!"</p>
                            </blockquote>
                            <figcaption class="mt-6 flex items-center gap-x-4">
                                <img class="h-10 w-10 rounded-full bg-gray-50"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop"
                                    alt="User testimonial photo">
                                <div>
                                    <div class="font-semibold">Jane Doe</div>
                                    <div class="text-gray-600">Student Pilot</div>
                                </div>
                            </figcaption>
                        </div>
                        <div class="p-8 bg-white rounded-lg shadow-md">
                            <blockquote class="text-gray-900">
                                <p>"The simulated exams are spot on. The analytics helped me pinpoint exactly where I
                                    needed to improve. I couldn't have passed without it."</p>
                            </blockquote>
                            <figcaption class="mt-6 flex items-center gap-x-4">
                                <img class="h-10 w-10 rounded-full bg-gray-50"
                                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1887&auto=format&fit=crop"
                                    alt="User testimonial photo">
                                <div>
                                    <div class="font-semibold">John Smith</div>
                                    <div class="text-gray-600">Commercial Pilot License Trainee</div>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-indigo-700">
            <div class="max-w-4xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Ready to Ace Your Exams?</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-indigo-200">
                    Join now and take the next step in your aviation career.
                </p>
                <a href="/register"
                    class="mt-8 w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                    Get Started for Free
                </a>
            </div>
        </section>


        <!-- Footer -->
        <footer class="bg-gray-800" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
                    <div class="flex space-x-6 md:order-2">
                        <!-- Social media links here if you have them -->
                    </div>
                    <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                        &copy; {{ date('Y') }} Airline Prep. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</x-layout>
