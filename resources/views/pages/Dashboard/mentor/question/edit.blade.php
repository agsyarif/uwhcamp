@extends('layouts.app')

@section('title', 'Create My Course')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">

                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Add Question To
                    </h2>

                    <p class="text-sm text-gray-400">
                        Upload the question you provide
                    </p>

                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">

                <li class="flex items-center">
                    <a href="{{ route('mentor.course.index') }}" class="text-gray-400">Exam</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>

                <li class="flex items-center">
                    <a href="#" class="font-medium">Add Question</a>
                </li>

            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('mentor.question.update', [$question->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">

                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 sm:col-span-3">

                                            <div class="flex space-x-2">
                                                <select id="Exam" name="Exam_id" autocomplete="Exam"
                                                    class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    required>

                                                    @foreach ($exam as $exam)
                                                        @if ($question->exam_id == $exam->id)
                                                            <option value={{ $exam->id }} selected>{{ $exam->title }}
                                                            </option>
                                                        @else
                                                            <option value={{ $exam->id }}>{{ $exam->title }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('exam_id'))
                                                    <p class="text-red-500 mb-3 text-sm">
                                                        {{ $errors->first('exam_id') }}</p>
                                                @endif

                                            </div>

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">

                                            <div class="flex space-x-2">
                                                <select id="type" name="type_id" autocomplete="type"
                                                    class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    required>

                                                    <option selected disabled value="">Type Exam</option>

                                                    @foreach ($type as $type)
                                                        @if ($question->type_id == $type->id)
                                                            <option value={{ $type->id }} selected>{{ $type->name }}
                                                            </option>
                                                        @else
                                                            <option value={{ $type->id }}>{{ $type->name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('type_id'))
                                                    <p class="text-red-500 mb-3 text-sm">
                                                        {{ $errors->first('type_id') }}</p>
                                                @endif

                                                <a href="{{ route('mentor.type.create') }}"
                                                    class="rounded-lg mt-1 p-2 flex items-center"
                                                    style="background-color: rgb(185, 185, 185)">
                                                    <svg width="20" height="20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>

                                        {{-- Soal --}}
                                        <div class="col-span-6 -mb-6">

                                            <label for="title"
                                                class="block mb-3 font-medium text-gray-700 text-md">Soal</label>

                                        </div>
                                        <div class="col-span-6">
                                            <input placeholder="Soal" type="text" name="soal" id="soal" autocomplete="soal"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $question->title }}" required>

                                            @if ($errors->has('soal'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('soal') }}</p>
                                            @endif

                                        </div>

                                        {{-- Label Opsi A & B --}}
                                        <div class="col-span-6  sm:col-span-3 -mb-6">

                                            <label for="opsiA" class="block mb-3 font-medium text-gray-700 text-md">Option
                                                A</label>

                                        </div>
                                        <div class="col-span-6  sm:col-span-3 -mb-6">
                                            <label for="opsiB" class="block mb-3 font-medium text-gray-700 text-md">Option
                                                B</label>
                                        </div>

                                        {{-- Opsi A & B --}}
                                        <div class="col-span-6  sm:col-span-3">
                                            <input placeholder="Opsi A" type="text" name="opsiA" id="opsiA"
                                                autocomplete="opsiA"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $question->option1 }}" required>

                                            @if ($errors->has('opsiA'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('opsiA') }}</p>
                                            @endif

                                        </div>
                                        <div class="col-span-6  sm:col-span-3">
                                            <input placeholder="Opsi B" type="text" name="opsiB" id="opsiB"
                                                autocomplete="opsiB"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $question->option2 }}" required>

                                            @if ($errors->has('opsiB'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('opsiB') }}</p>
                                            @endif

                                        </div>

                                        {{-- Label Opsi C & D --}}
                                        <div class="col-span-6  sm:col-span-3 -mb-6">

                                            <label for="opsiC" class="block mb-3 font-medium text-gray-700 text-md">Option
                                                C</label>

                                        </div>
                                        <div class="col-span-6  sm:col-span-3 -mb-6">
                                            <label for="opsiD" class="block mb-3 font-medium text-gray-700 text-md">Option
                                                D</label>
                                        </div>

                                        {{-- Opsi A & B --}}
                                        <div class="col-span-6  sm:col-span-3">
                                            <input placeholder="Opsi C" type="text" name="opsiC" id="opsiC"
                                                autocomplete="opsiC"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $question->option3 }}" required>

                                            @if ($errors->has('opsiC'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('opsiC') }}</p>
                                            @endif

                                        </div>
                                        <div class="col-span-6  sm:col-span-3">
                                            <input placeholder="Opsi D" type="text" name="opsiD" id="opsiD"
                                                autocomplete="opsiD"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $question->option4 }}" required>

                                            @if ($errors->has('opsiD'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('opsiD') }}</p>
                                            @endif

                                        </div>

                                        {{-- Jwaban & pennjelasan --}}
                                        <div class="col-span-6  sm:col-span-3 -mb-6">

                                            <label for="answer"
                                                class="block mb-3 font-medium text-gray-700 text-md">Answer</label>

                                        </div>
                                        <div class="col-span-6  sm:col-span-3 -mb-6">
                                            <label for="explanation"
                                                class="block mb-3 font-medium text-gray-700 text-md">Explanation</label>
                                        </div>

                                        {{-- Jawaban & Penjelasan --}}
                                        <div class="col-span-6  sm:col-span-3">
                                            <input placeholder="Jawaban" type="text" name="answer" id="answer"
                                                autocomplete="answer"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                value="{{ $question->answer }}" required>

                                            @if ($errors->has('answer'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('answer') }}</p>
                                            @endif

                                        </div>
                                        <div class="col-span-6  sm:col-span-3">
                                            <textarea placeholder="Penejelasan" type="text" name="explanation" id="explanation" autocomplete="explanation"
                                                class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                                required>{{ $question->explanations }}
                                            </textarea>

                                            @if ($errors->has('explanation'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('explanation') }}
                                                </p>
                                            @endif

                                        </div>


                                        <div class="col-span-6">

                                            <div class="py-6 text-right">

                                                <a href="{{ route('mentor.exam.show', [$question->exam_id]) }}"
                                                    type="button"
                                                    class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"
                                                    onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                    Cancel
                                                </a>

                                                <button type="submit"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    onclick="return confirm('Are you sure want to submit this data ?')">
                                                    Update Question
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection

@push('after-script')
    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
@endpush
