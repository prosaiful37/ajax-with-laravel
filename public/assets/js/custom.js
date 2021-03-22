(function($) {
    $(document).ready(function() {

        /**
         * image upload ready
         */
        $('input#student_photo').change(function(e) {
            let file_url = URL.createObjectURL(e.target.files[0]);
            $('img#student_photo_load').attr('src', file_url);
        });

        /**
         * dataTabel add
         */
        $('table#table_student').dataTable();


        /**
         * data show
        //  */
        // function allStudent(){
        //     $.ajax({
        //         url : 'student-all',
        //         success : function(data){
        //          $('tbody#student_tbody').html(data);

        //         }
        //     });
        // }

        // allStudent();


        /**
         * add new student
         */
        $(document).on('submit', 'form#add_student_form', function(e) {
            e.preventDefault();

            let name = $('form#add_student_form input[name="name"]').val();
            let roll = $('form#add_student_form input[name="roll"]').val();
            let email = $('form#add_student_form input[name="email"]').val();
            let cell = $('form#add_student_form input[name="cell"]').val();



            if (name == '' || roll == '' || email == '' || cell == '') {
                $('.mess').html('<p class="alert alert-danger"> All Filds Are required! <button class="close" data-dismiss="alert">&times;</button></p>');
            } else if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email) == false) {
                $('.mess').html('<p class="alert alert-danger">Invalid Email Address!<button class="close" data-dismiss="alert">&times;</button></p>');
            } else {

                $.ajax({
                    url : 'student-create',
                    method : "POST",
                    contentType : false,
                    processData : false,
                    data : new FormData(this),
                    success : function(data) {

                        $('.mess').html('<p class="alert alert-success"> student added successful! <button class="close" data-dismiss="alert">&times;</button></p>');
                        $('form#add_student_form')[0].reset();
                        $('img#student_photo_load').attr('src', '');
                        // allStudent();

                    }

                });
            }

        });

        /**
         * edit student
         */

        $(document).on('click', 'a#edit_student', function(e){
            e.preventDefault();
            let id = $(this).attr('student_id');

            $.ajax({
                url: 'student-edit/' + id,
                dataType: "json",
                success: function(data){
                    $('#student_modal_edit input[name="name"]').val(data.name);
                    $('#student_modal_edit input[name="roll"]').val(data.roll);
                    $('#student_modal_edit input[name="email"]').val(data.email);
                    $('#student_modal_edit input[name="cell"]').val(data.cell);
                    $('#student_modal_edit img').attr('src', 'media/students/' + data.photo);
                }
            });


        });






    });
})(jQuery)
