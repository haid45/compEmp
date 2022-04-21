@if (Session::has('message'))
    <div class="alert alert-info mb-4 alert-dismissible fade show d-flex" role="alert">
        <div class="alert-icon me-2"><i class="oi oi-info"></i></div>
        <div class="message" style="white-space: pre-line;">{!! Session::get('message') !!}</div>
        <a href="#" class="alert-button close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
    </div>
@endif
@if (Session::has('success_message'))
        <div class="alert alert-success mb-4 alert-dismissible fade show d-flex" role="alert">
            <div class="alert-icon me-2"><i class="oi oi-check"></i></div>
            <div class="message">{!! Session::get('success_message') !!}</div>
            <a href="#" class="alert-button close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
        </div>
@endif
@if (isset($errors) && $errors->count() > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-warning mb-4 alert-dismissible fade show d-flex" role="alert">
            <div class="alert-icon me-2">
                <i class="text-warning oi oi-circle-x"></i>
            </div>
            <div class="message">{{ $error }}</div>
            <a href="#" class="alert-button close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
        </div>
    @endforeach
@endif
