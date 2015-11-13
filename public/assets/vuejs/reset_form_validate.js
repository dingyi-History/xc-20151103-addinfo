new Vue({
    el: '#reset_form',
    data: {
        pwd: {
            old: '',
            new: '',
            confirm: ''
        },
        error: {
            old: '',
            new: '',
            confirm: ''
        },
        is_error: {
            old: false,
            new: false,
            confirm: false
        },
        is_ok: {
            old: false,
            new: false,
            confirm: false
        },
        backend: {
            old: '* 请正确输入原密码',
            new: '* 请正确输入新密码',
            confirm: '* 两次密码不一致'
        }
    },
    methods: {
        oldvalidate: function () {
            var realname = this.users.realname.trim();
            this.backend.realname = '';
            if (realname == '') {
                this.error.realname = '* 请输入姓名';
                this.is_error.realname = true;
            } else {
                this.error.realname = '';
                this.is_error.realname = false;
                this.is_ok.realname = true;
            }
        },
        newvalidate: function () {
            var email = this.users.email.trim();
            this.backend.email = '';
            if (email) {
                this.error.email = '* 请输入邮箱,例:example@xici.net';
                this.is_error.email = true;
            } else {
                this.error.email = '';
                this.is_error.email = false;
                this.is_ok.email = true;
            }
        },
        confirmvalidate: function () {
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
        submit: function () {
            this.oldvalidate();
            this.newvalidate();
            this.confirmvalidate();
        }

    }
});
