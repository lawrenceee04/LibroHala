@extends('layouts.base-sidebar')

@section('body')
<div class="mb-4 text-xl font-bold">Dashboard</div>

<div class="grid grid-col-4">
    <!-- 4 Cards -->
    <div class="col-span-4 grid grid-cols-2 lg:grid-cols-4 gap-4 text-white mb-4">
        <div class="container p-3 h-28 bg-sky-600 rounded-md">
            <div class="text-lg font-semibold">Patrons</div>
            <div class="text-4xl font-bold">{{ $patrons }}</div>
        </div>
        <div class="container p-3 h-28 bg-emerald-600 rounded-md">
            <div class="text-lg font-semibold">Books</div>
            <div class="text-4xl font-bold">{{ $books }}</div>
        </div>
        <div class="container p-3 h-28 bg-yellow-400 rounded-md">
            <div class="text-lg font-semibold">Thesis</div>
            <div class="text-4xl font-bold">{{ $thesis }}</div>
        </div>
        <div class="container p-3 h-28 bg-rose-600 rounded-md">
            <div class="text-lg font-semibold">Issued</div>
            <div class="text-4xl font-bold">{{ $issued }}</div>
        </div>
    </div>

    <div class="col-span-4 grid grid-cols-1 lg:grid-cols-4 gap-4 place-items-center lg:place-items-stretch">
        <div class="container lg:col-span-3 rounded-lg shadow bg-blue-600 p-4 md:p-6">
            <div>
                {!! $chart->container() !!}
                <script src="{{ $chart->cdn() }}"></script>
                {{ $chart->script() }}
            </div>
        </div>
        <div class="container lg:col-span-1 flex flex-col gap-4">
            <div class="container w-full p-6 bg-blue-600 text-white flex flex-1 flex-col rounded-md overflow-auto">
                <div class="mb-6 text-2xl font-bold text-start">Today</div>
                <div class="container w-full text-white flex flex-1 flex-col gap-8">
                    <div class="flex flex-col w-full md:items-start">
                        <div class="flex flex-row items-end gap-3">
                            <div class="mb-2 text-6xl font-extrabold text-center"> {{ $visits }} </div>
                            <div class="flex flex-row justify-center items-center gap-2">
                                @if ($visitsPercentComparedYesterday < 0) <i class="fa-solid fa-caret-down text-xl"
                                    style="color: #ef4444"></i>
                                    <div class="text-lg font-semibold text-red-400"> {{ $visitsPercentComparedYesterday
                                        }}%
                                    </div>
                                    @elseif ($visitsPercentComparedYesterday > 0)
                                    <i class="fa-solid fa-caret-up text-xl" style="color: #22c55e"></i>
                                    <div class="text-lg font-semibold text-green-400"> {{
                                        $visitsPercentComparedYesterday }}%
                                    </div>
                                    @else
                                    <div class="text-lg font-semibold text-neutral-200"> --%
                                    </div>
                                    @endif
                            </div>
                        </div>
                        <div class="mb-2 text-lg">Visits</div>
                    </div>
                    <div class="flex flex-col w-full md:items-start">
                        <div class="flex flex-row items-end gap-3">
                            <div class="mb-2 text-6xl font-extrabold text-center"> {{ $issuedBooks }} </div>
                            <div class="flex flex-row justify-center items-center gap-2">
                                @if ($issuedBooksPercentComparedYesterday < 0) <i class="fa-solid fa-caret-down text-xl"
                                    style="color: #ef4444"></i>
                                    <div class="text-lg font-semibold text-red-400"> {{
                                        $issuedBooksPercentComparedYesterday
                                        }}%
                                    </div>
                                    @elseif ($issuedBooksPercentComparedYesterday > 0)
                                    <i class="fa-solid fa-caret-up text-xl" style="color: #22c55e"></i>
                                    <div class="text-lg font-semibold text-green-400"> {{
                                        $issuedBooksPercentComparedYesterday
                                        }}%
                                    </div>
                                    @else
                                    <div class="text-lg font-semibold text-neutral-200"> --%
                                    </div>
                                    @endif
                            </div>
                        </div>
                        <div class="mb-2 text-lg">Issued Books</div>
                    </div>
                    <div class="flex flex-col w-full md:items-start">
                        <div class="flex flex-row items-end gap-3">
                            <div class="mb-2 text-6xl font-extrabold text-center"> {{ $returnedBooks }} </div>
                            <div class="flex flex-row justify-center items-center gap-2">
                                @if ($returnedBooksPercentComparedYesterday < 0) <i
                                    class="fa-solid fa-caret-down text-xl" style="color: #ef4444"></i>
                                    <div class="text-lg font-semibold text-red-400"> {{
                                        $returnedBooksPercentComparedYesterday
                                        }}%
                                    </div>
                                    @elseif ($returnedBooksPercentComparedYesterday > 0)
                                    <i class="fa-solid fa-caret-up text-xl" style="color: #22c55e"></i>
                                    <div class="text-lg font-semibold text-green-400"> {{
                                        $returnedBooksPercentComparedYesterday
                                        }}%
                                    </div>
                                    @else
                                    <div class="text-lg font-semibold text-neutral-200"> --%
                                    </div>
                                    @endif
                            </div>
                        </div>
                        <div class="mb-2 text-lg">Returned Books</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection