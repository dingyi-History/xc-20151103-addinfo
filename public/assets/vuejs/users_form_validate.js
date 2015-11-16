new Vue({
    el: '#users_form',
    data: {
        users: {
            realname: '',
            dep: '',
            authority: '',
            email: '',
            password: ''
        },
        error: {
            realname: '',
            dep: '',
            authority: '',
            email: '',
            password: ''
        },
        is_error: {
            realname: false,
            dep: false,
            authority: false,
            email: false,
            password: false,
        },
        is_ok: {
            realname: false,
            dep: false,
            authority: false,
            email: false,
            password: false,
        },
        backend: {
            realname: '* 请正确输入姓名',
            dep: '* 请正确选择部门',
            authority: '* 请正确选择权限',
            email: '* 请正确输入邮箱',
            password: '* 请正确输入密码'
        }
    },
    methods: {
        realnamevalidate: function () {
            var realname = this.users.realname.trim();
            this.backend.realname = '';
            if (realname == '') {
                this.error.realname = '* 请输入姓名';
                this.is_error.realname = true;
                return false;
            } else {
                this.error.realname = '';
                this.is_error.realname = false;
                this.is_ok.realname = true;
                return true;
            }
        },
        emailvalidate: function () {
            var email = this.users.email.trim();
            this.backend.email = '';
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {
                this.error.email = '* 请输入邮箱,例:example@xici.net';
                this.is_error.email = true;
                return false;
            } else {
                this.error.email = '';
                this.is_error.email = false;
                this.is_ok.email = true;
                return false;
            }
        },
        passwordvalidate: function () {
            var password = this.users.password.trim();
            this.backend.realname = '';
            if (password.length < 6 || password.length > 16) {
                this.error.password = '* 请输入密码,6到16位数字或字母';
                this.is_error.password = true;
            } else {
                this.error.password = '';
                this.is_error.password = false;
                this.is_ok.password = true;
            }
        },
        onSubmit: function () {
            var bool1 = this.realnamevalidate();
            var bool2 = this.emailvalidate();
            if (bool1 == true && bool2 == true) {
                $('myform').submit();
            }
        }

    }
});
