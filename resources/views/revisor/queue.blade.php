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
            <div class="col-10 d-flex justify-content-center">
                <table class="table form-custom rounded-5">
                    <thead>
                        <tr>
                            <th scope="col">#userid</th>
                            <th scope="col">{{ __('ui.adAuthor') }}</th>
                            <th scope="col">{{ __('ui.tableRevisorTitle') }}</th>
                            <th scope="col">{{ __('ui.tableRevisorCategory') }}</th>
                            <th scope="col">{{ __('ui.tableRevisorStatus') }}</th>
                            <th scope="col">{{ __('ui.updatedRevisor') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row">{{ $article->user->id }}</th>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->title }}</td>
                                <td class="fst-italic">{{ __('ui.' . $article->category->name) }}</td>
                                <td>
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
                                <td><span class="text-muted">{{ $article->updated_at->format('d/m/Y H:i') }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
