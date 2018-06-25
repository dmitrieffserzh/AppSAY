@push('custom-scripts')
    <script src="{{ asset('js/components/image_uploader.js') }}" defer></script>
@endpush
<form class="profile-image__form">
    {{ csrf_field() }}
    <div class="btn-file">
        <input type="file" name="image" class="profile-image__form-input" data-upload-type="upload_avatar"
               onchange="uplodImage(this)">
    </div>
</form>

<span id="spinner" class="profile-image__spinner">
    <svg version="1.1" viewBox="0 0 30 30" width="60">
        <circle cy="15" cx="15" r="14"/>
    </svg>
</span>
<script>
    // onchange="uploadImage();"
    // function uploadImage() {
    //     var form = new FormData();
    //     var image = form.files;
    //     form.append('image', image);
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url: '/image_upload',
    //         data: form,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         type: 'POST',
    //         complete: function (msg) {
    //             $('.print-error-msg').find("ul").html('');
    //             $('.print-error-msg').css('display', 'block');
    //             $.each(msg, function (key, value) {
    //                 $('.print-error-msg').find("ul").append('<li>' + value + '</li>');
    //             });
    //
    //         }
    //     })
    // };
</script>


{{--<style>--}}

{{--.modal-body img,--}}
{{--.jcrop-active{--}}
{{--width: 100% !important;--}}
{{--height: auto !important;--}}
{{--}--}}

{{--</style>--}}

{{--<!-- Button trigger modal -->--}}
{{--<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">--}}
{{--Launch modal--}}
{{--</button>--}}


{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}


{{--<div>--}}

{{--<img id="target" src="{{ getImage('original', $user->profile->avatar) }}" alt="{{$user->nickname}}">--}}


{{--<div id="preview" style="width: 100px; height: 100px;"></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--<button type="button" class="btn btn-primary">Save changes</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}