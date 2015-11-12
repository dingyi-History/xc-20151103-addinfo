new Vue({
    el: '#login_form',
    data: {
        email: '',
        password: '',
        error_email: '',
        error_password: '',
        is_error_email: false,
        is_error_password: false
    },
    methods: {
        emailvalid: function () {
            var email = this.email.trim();
            if (email == '') {
                this.error_email = '* 请填入邮箱';
                this.is_error_email = true;
            }
            if (email) {
                this.error_email = '';
                this.is_error_email = false;
            }
        },
        passwordvalid: function () {
            var password = this.password.trim();
            if (password == '') {
                this.error_password = '* 请填入密码';
                this.is_error_password = true;
            }
            if (password) {
                this.error_password = '';
                this.is_error_password = false;
            }
        },
        loginvalid: function () {
            this.emailvalid();
            this.passwordvalid();
            if (this.email && this.password) {
                alert('已经填入邮箱和密码');
            }
        }
    }
})