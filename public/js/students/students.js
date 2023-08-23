$(document).ready(function () {
    $(".send-mail").click(function (e) {
        e.preventDefault();

        var studentId = $(this).val();
        var newAction = "{{ route('students.notification', ':id')  }}";
        var action = newAction.replace(':id', studentId);
        $("#send-form").attr("action", action);
        $("#send-form").submit();
    });
});

$(".delete-student").click(function (e) {
    e.preventDefault();

    var studentId = $(this).val();
    var newAction = "{{ route('students.destroy', ':id') }}";
    var action = newAction.replace(':id', studentId);
    $("#delete-form").attr("action", action);
    var confirmDelete = confirm('Are you sure?');

    if (confirmDelete) {
        $("#delete-form").submit();
    }
});

$(document).ready(function () {
    $('#btn-submit').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#ajax-form')[0]);
        $.ajax({
            type: "post",
            url: "{{ route('students.store') }}",
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function() {
                $(document).find('span.error-text').html('');
            },
            success: function (data) {
                $.toast({
                    heading: 'Add student',
                    text: '<h6>data.success</h6>',
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'top-right',
                })
                setTimeout(function () {
                    window.location.href = "{{ route('students.index') }}";
                }, 500);
            },
            error: function (data) {
                console.log(data.responseJSON.errors);
                $.each(data.responseJSON.errors, function (prefix, val) {
                    $('span.' + prefix + '_error').html(val[0]);
                });
            }
        });
    });
});

$(document).ready(function () {
    var successStudent = "{{ Session::has('add_student') }}"
    var updateStudent = "{{ Session::has('update_student') }}"
    var deleteStudent = "{{ Session::has('delete_student') }}"
    var sendMailSuccess = "{{ Session::has('send_mail_success') }}"
    var sendMailFalse = "{{ Session::has('send_mail_false') }}"
    var importSuccess = "{{ Session::has('import_success') }}"
    var importFalse = "{{ Session::has('import_false') }}"

    console.log(successStudent);
    if (successStudent) {
        $.toast({
            heading: 'Add student',
            text: '<h6>{{ Session::get("add_student") }}</h6>',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-right',
        })
    }

    if (updateStudent) {
        $.toast({
            heading: 'Update student',
            text: '<h6>{{ __(Session::get("update_student")) }}</h6>',
            showHideTransition: 'slide',
            icon: 'info',
            position: 'top-right',
        })
    }

    if (deleteStudent) {
        $.toast({
            heading: 'Delete student',
            text: '<h6>{{ Session::get("delete_student") }}</h6>',
            showHideTransition: 'slide',
            icon: 'error',
            position: 'top-right',
        })
    }

    if (sendMailSuccess) {
        $.toast({
            heading: 'Send success',
            text: '<h6>{{ Session::get("send_mail_success") }}</h6>',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-right',
        })
    }

    if (sendMailFalse) {
        $.toast({
            heading: 'Send false',
            text: '<h6>{{ Session::get("send_mail_false") }}</h6>',
            showHideTransition: 'slide',
            icon: 'warring',
            position: 'top-right',
        })
    }

    if (importSuccess) {
        $.toast({
            heading: 'Import success',
            text: '<h6>{{ Session::get("import_success") }}</h6>',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-right',
        })
    }

    if (importFalse) {
        $.toast({
            heading: 'Import false',
            text: '<h6>{{ Session::get("import_false") }}</h6>',
            showHideTransition: 'slide',
            icon: 'warring',
            position: 'top-right',
        })
    }
});
