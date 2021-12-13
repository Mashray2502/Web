  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $(document).ready(function () {
      $("#frmLogin").validate({
        errorClass: 'errors',
        rules: {
          Password: {
            required: true,
            minlength: 6,
            maxlength: 15,
            passwordFormatCheck: true

          }
        },
      });

      //Custom validation rule to check password check
      $.validator.addMethod("passwordFormatCheck", function (value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
      }, 'Password must contain one capital letter,one numerical and one special character');
    });
  </script>