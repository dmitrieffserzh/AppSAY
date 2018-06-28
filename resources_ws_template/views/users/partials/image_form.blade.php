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