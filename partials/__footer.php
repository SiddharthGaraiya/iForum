<div class=" container-fluid bg-dark text-light text-center p-3">
<p class="m-0">Copyright iForum Coding Forum | All rights Reserved 2024</p>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        <script>
        let password = document.getElementById('password');
        let cpassword = document.getElementById('cpassword');
        let passwordcheck = document.getElementById('passwordCheck');
        let btn = document.getElementById('signUp');

        cpassword.addEventListener('keyup', () => {
            if (cpassword.value === password.value) {
                cpassword.style.borderColor = '#dee2e6';
                passwordcheck.style.color = 'green';
                passwordcheck.innerText = "Password Matches";
                btn.classList.remove('disabled');
            }
            else {
                cpassword.style.borderColor = 'red';
                passwordcheck.style.color = 'red';
                document.getElementById('passwordCheck').innerText = "Password not same, please check."
                btn.classList.add('disabled');
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            $("#username").keyup(function () {
                var username = $(this).val().trim();
                if (username != '') {
                    $.ajax({
                        url: 'partials/__username_availability_checker.php',
                        type: 'post',
                        data: { username: username },
                        success: function (response) {
                            $('#username_availability_response').html(response);
                        }
                    });
                } else {
                    $("#username_availability_response").html("");
                }
            });
        });
    </script>

</body>

</html>