{{-- 
  Enhanced Exam View for Laravel
  This Blade template creates an interactive exam interface with JavaScript.
  - It displays one question at a time.
  - Allows navigation with "Previous" and "Next" buttons.
  - Tracks progress with a clickable question navigator.
  - Highlights selected answers.
  - A "Submit Exam" button appears on the final question to send answers to the server via a fetch request.
--}}
<x-layout :sectionHeader="$questionSection->name">
    @if ($questions->isEmpty())
        <div class="h-50 w-full flex items-center justify-center text-gray-500">
            <p class="text-center max-w-lg">
                There are no questions yet. Please
                <a href="/login" class="text-gray-800 underline font-semibold">Login</a> as an administrator to add questions, or contact an admin for assistance.
            </p>
        </div>
    @else
        <div class="bg-gray-50 min-h-screen font-sans antialiased">
            <div class="container mx-auto p-4 sm:p-6 lg:p-8 max-w-4xl">

                <!-- Exam Container -->
                <div id="exam-container" class="bg-white rounded-2xl shadow-xl border border-gray-200">
                    
                    <!-- Header with Progress -->
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-gray-500 mt-1">Select the best answer for each question.</p>
                        
                        <!-- Progress Bar / Question Navigator -->
                        <div class="mt-6">
                            <h3 class="text-sm font-semibold text-gray-600 mb-2">Progress</h3>
                            <div id="progress-navigator" class="flex flex-wrap gap-2">
                                @foreach ($questions as $index => $question)
                                    <div class="progress-dot w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center cursor-pointer text-sm font-bold text-gray-500 transition-all duration-300" 
                                         data-question-index="{{ $index }}">
                                        {{ $index + 1 }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <!-- Questions Wrapper -->
                        <form id="exam-form">
                            @csrf
                            <input type="hidden" name="question_section_id" value="{{ $questionSection->id }}">

                            @foreach ($questions as $index => $question)
                                <div class="question-slide hidden" id="question-{{ $index }}" data-question-id="{{ $question->id }}">
                                    <div class="flex justify-between items-start mb-4">
                                        <h2 class="text-xl font-semibold text-gray-800">
                                            Question <span class="question-current-number">{{ $index + 1 }}</span><span class="text-gray-400 font-normal">/{{ $questions->count() }}</span>
                                        </h2>
                                    </div>
                                    <p class="text-gray-700 text-lg leading-relaxed mb-8">
                                        {{ $question->question_text }}
                                    </p>

                                    <ul class="space-y-4">
                                        @foreach ($question->answers as $answer)
                                            <li class="answer-option w-full text-left p-4 rounded-lg border border-gray-200 cursor-pointer transition-all duration-200 hover:bg-indigo-50 hover:border-indigo-400"
                                                data-answer-id="{{ $answer->id }}">
                                                <span class="font-medium text-gray-700">{{ $answer->answer_text }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </form>
                    </div>

                    <!-- Navigation Footer -->
                    <div class="px-6 py-4 bg-gray-50 rounded-b-2xl border-t border-gray-200 flex justify-between items-center">
                        <button id="prev-btn" class="px-6 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed">
                            Previous
                        </button>
                        <button id="next-btn" class="px-6 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 disabled:opacity-50">
                            Next
                        </button>
                        <button id="submit-btn" class="hidden px-6 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700">
                            Submit Exam
                        </button>
                    </div>
                </div>
                 <!-- Submission Status Message -->
                <div id="submission-status" class="hidden mt-4 p-4 rounded-lg text-center"></div>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirmation-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Incomplete Exam</h3>
                <p id="modal-message" class="text-gray-600 mb-6">You have unanswered questions. Are you sure you want to submit?</p>
                <div class="flex justify-end gap-4">
                    <button id="modal-cancel-btn" class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                    <button id="modal-confirm-btn" class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700">Confirm Submit</button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const questions = document.querySelectorAll('.question-slide');
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');
                const submitBtn = document.getElementById('submit-btn');
                const progressDots = document.querySelectorAll('.progress-dot');
                const submissionStatus = document.getElementById('submission-status');
                const confirmationModal = document.getElementById('confirmation-modal');
                const modalMessage = document.getElementById('modal-message');
                const modalCancelBtn = document.getElementById('modal-cancel-btn');
                const modalConfirmBtn = document.getElementById('modal-confirm-btn');

                let currentQuestionIndex = 0;
                const userAnswers = {}; // To store { questionId: answerId }

                function showQuestion(index) {
                    questions.forEach((q, i) => {
                        q.classList.toggle('hidden', i !== index);
                    });
                    
                    updateProgressDots(index);
                    updateNavigationButtons(index);
                    currentQuestionIndex = index;
                }
                
                function updateNavigationButtons(index) {
                    prevBtn.disabled = index === 0;
                    
                    if (index === questions.length - 1) {
                        nextBtn.classList.add('hidden');
                        submitBtn.classList.remove('hidden');
                    } else {
                        nextBtn.classList.remove('hidden');
                        submitBtn.classList.add('hidden');
                    }
                }

                function updateProgressDots(currentIndex) {
                    progressDots.forEach((dot, index) => {
                        const questionId = questions[index].dataset.questionId;
                        
                        dot.classList.remove('bg-indigo-600', 'text-white', 'bg-green-500');
                        dot.classList.add('bg-gray-200', 'text-gray-500');

                        if (userAnswers[questionId]) {
                            dot.classList.add('bg-green-500', 'text-white');
                        }

                        if (index === currentIndex) {
                           dot.classList.remove('bg-green-500', 'bg-gray-200');
                           dot.classList.add('bg-indigo-600', 'text-white');
                        }
                    });
                }
                
                questions.forEach((question, index) => {
                    const options = question.querySelectorAll('.answer-option');
                    options.forEach(option => {
                        option.addEventListener('click', () => {
                            const questionId = question.dataset.questionId;
                            const answerId = option.dataset.answerId;
                            
                            userAnswers[questionId] = answerId;
                            
                            options.forEach(opt => opt.classList.remove('bg-indigo-100', 'border-indigo-500', 'ring-2', 'ring-indigo-300'));
                            option.classList.add('bg-indigo-100', 'border-indigo-500', 'ring-2', 'ring-indigo-300');
                            
                            updateProgressDots(index);
                            setTimeout(() => {
                                if (currentQuestionIndex < questions.length - 1) {
                                    showQuestion(currentQuestionIndex + 1);
                                }
                            }, 300);
                        });
                    });
                });

                nextBtn.addEventListener('click', () => {
                    if (currentQuestionIndex < questions.length - 1) {
                        showQuestion(currentQuestionIndex + 1);
                    }
                });

                prevBtn.addEventListener('click', () => {
                    if (currentQuestionIndex > 0) {
                        showQuestion(currentQuestionIndex - 1);
                    }
                });
                
                progressDots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        const index = parseInt(dot.dataset.questionIndex, 10);
                        showQuestion(index);
                    });
                });

                // --- MODAL AND SUBMISSION LOGIC ---
                const handleSubmit = async () => {
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';
                    confirmationModal.classList.add('hidden'); // Hide modal if it was open

                    try {
                        const response = await fetch('/user-answers', { // <-- UPDATED URL
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: JSON.stringify({
                                answers: userAnswers,
                                question_section_id: document.querySelector('input[name="question_section_id"]').value
                            })
                        });

                        if (!response.ok) {
                           throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        
                        const result = await response.json();
                        
                        document.getElementById('exam-container').classList.add('hidden');
                        submissionStatus.classList.remove('hidden', 'bg-red-100', 'text-red-700');
                        submissionStatus.classList.add('bg-green-100', 'text-green-700');
                        submissionStatus.textContent = result.message || 'Exam submitted successfully! Redirecting...';

                        if(result.redirect_url) {
                            setTimeout(() => window.location.href = result.redirect_url, 2000);
                        }

                    } catch (error) {
                        console.error('Submission failed:', error);
                        submissionStatus.classList.remove('hidden', 'bg-green-100', 'text-green-700');
                        submissionStatus.classList.add('bg-red-100', 'text-red-700');
                        submissionStatus.textContent = 'An error occurred during submission. Please try again.';
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Submit Exam';
                    }
                }

                submitBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const totalQuestions = questions.length;
                    const answeredQuestions = Object.keys(userAnswers).length;

                    if (answeredQuestions < totalQuestions) {
                        modalMessage.textContent = `You have only answered ${answeredQuestions} out of ${totalQuestions} questions. Are you sure you want to submit?`;
                        confirmationModal.classList.remove('hidden');
                    } else {
                        handleSubmit();
                    }
                });

                modalCancelBtn.addEventListener('click', () => {
                    confirmationModal.classList.add('hidden');
                });
                
                modalConfirmBtn.addEventListener('click', () => {
                    handleSubmit();
                });

                // Initial setup
                showQuestion(0);
            });
        </script>
    @endif
</x-layout>

