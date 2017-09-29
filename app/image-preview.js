function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var parent = $(input).next();
            var img = parent.find('.img-preview');
            if ($('.current_photo')) {
                $('.current_photo').addClass('hidden');
            }
            img.addClass('img-responsive');
            img.attr('src', e.target.result);
            parent.removeClass('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(".photo-upload-preview").change(function () {
    readURL(this);
});

// To remove image when image is clicked
$('.photo-container').click(function () {
    var file = $(this).prev();
    file.val(null);
    $(this).addClass('hidden');
    $(this).find('.img-preview').attr('src', null);
});
