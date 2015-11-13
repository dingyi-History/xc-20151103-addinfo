new Vue({
    el: '#login_form',
    data: {
        email: '',
        password: '',
        error_email: '',
        error_password: '',
        is_error_email: false,
        is_error_password: false,
        is_ok_email: false,
        is_ok_password: false
    },
    methods: {
        emailvalid: function () {
            var email = this.email.trim();
            if (email == '') {
                this.error_email = '* 请填入邮箱';
                this.is_error_email = true;
            } else {
                this.error_email = '';
                this.is_error_email = false;
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(email)) {
                    this.error_email = '* 请正确输入邮箱,如example@xici.net'
                    this.is_error_email = true;
                } else {
                    this.is_ok_email = true;
                    return true;
                }
            }
        },
        passwordvalid: function () {
            var password = this.password.trim();
            if (password == '') {
                this.error_password = '* 请填入密码';
                this.is_error_password = true;
            } else {
                this.error_password = '';
                this.is_error_password = false;
                if (password.length > 16 || password.length < 6) {
                    this.error_password = '* 请输入6到16位数字或字母'
                    this.is_error_password = true;
                } else {
                    this.is_ok_password = true;
                    return true;
                }
            }
        },
        submit: function () {
            $res_email = this.emailvalid();
            $res_pwd = this.passwordvalid();
            if ($res_email && $res_pwd) return true;
            return false;
        }
    }
});

