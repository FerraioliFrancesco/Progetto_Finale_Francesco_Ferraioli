<form class="d-inline" action="{{route('locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendore/blade-flags/language-' .$lang. '.svg')}}" width="32" height="32" alt="">
    </button>
</form>