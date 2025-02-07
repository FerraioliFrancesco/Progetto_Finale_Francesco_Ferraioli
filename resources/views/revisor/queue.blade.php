<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ __('ui.tableRevisor') }}</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center text-center mt-3">
            <div class="col-12">
                <a href="{{route('revisor.index')}}" class="button-card px-4 py-2 rounded-pill">{{__('ui.revisorZone')}}</a>
            </div>
        </div>
        <div class="row justify-content-center text-center mt-4">
            @if (session('message'))
                <div class="col-12 alert alert-success text-center m-0">{{session('message')}}</div>            
            @endif
            <div class="col-2 col-md-9 d-flex justify-content-center">
                <table class="table form-custom rounded-5 w-sm-50">
                    <thead>
                        <tr>
                            <th scope="col" class="px-2 px-md-0">#userid</th>
                            <th scope="col" class="px-2 px-md-0">{{ __('ui.adAuthor') }}</th>
                            <th scope="col">{{ __('ui.tableRevisorTitle') }}</th>
                            <th scope="col" class="px-2 px-md-0 d-phone">{{ __('ui.tableRevisorCategory') }}</th>
                            <th scope="col" class="px-2 px-md-0">{{ __('ui.tableRevisorStatus') }}</th>
                            <th scope="col" class="px-2 px-md-0 d-phone">{{ __('ui.updatedRevisor') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($articles)
                            @foreach ($articles as $article)
                                <tr>
                                    <th scope="row" class="px-2 px-md-0">{{ $article->user->id }}</th>
                                    <td class="px-2 px-md-0">{{ $article->user->name }}</td>
                                    <td class="px-2 px-md-0 text-truncate"><a href="{{ route('revisor.show',$article) }}" class="nav-link fw-bold me-1 text-capitalize ">{{$article->title}}</a></td>
                                    <td class="fst-italic px-2 px-md-0 d-phone">{{ __('ui.' . $article->category->name) }}</td>
                                    <td class="px-2 px-md-0">
                                        @if ($article->is_accepted === null)
                                            <p class="fst-italic text-muted">{{ __('ui.inReview') }}</p>
                                        @else
                                            @if ($article->is_accepted == true)
                                                <p class="fst-italic text-success">{{ __('ui.published') }}</p>
                                            @else
                                                <p class=" fst-italic text-danger">{{ __('ui.refused') }} </p>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="px-2 px-md-0"><span class="text-muted d-phone">{{ $article->updated_at->format('d/m/Y H:i') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="vh-custom"></div>
            @if ($articles->isEmpty())
                <div class="col-6">
                    <h3 class="fw-bold text-center mt-5">{{ __('ui.tableRevisorEmpty') }}</h3>
                </div>
            @endif
        </div>
    </div>
</x-layout>
