new Vue({
    el: '#userinfo_form',
    data: {
        userinfo: {
            name: '',
            phone: '',
            identity: ''
        },
        error: {
            name: '',
            phone: '',
            identity: ''
        },
        is_error: {
            name: '',
            phone: '',
            identity: ''
        },
        is_ok: {
            name: '',
            phone: '',
            identity: ''
        },
    },
    methods: {
        namevalidate: function () {
            var name = this.userinfo.name.trim();
            if (name == '') {
                this.error.name = '* 请输入姓名';
                this.is_error.name = true;
            } else {
                this.error.name = '';
                this.is_error.name = false;
                this.is_ok.name = true;
            }
        },
        phonevalidate: function () {
            var phone = this.userinfo.phone.trim();
            if (phone == '') {
                this.error.phone = '* 请输入手机号';
                this.is_error.phone = true;
            } else {
                this.error.phone = '';
                this.is_error.phone = false;
                this.is_ok.phone = true;
            }
        },
        identityvalidate: function () {
            var identity = this.userinfo.identity.trim();
            if (identity == '') {
                this.error.identity = '* 请输入身份证号';
                this.is_error.identity = true;
            } else {
                this.error.identity = '';
                this.is_error.identity = false;
                this.is_ok.identity = true;
            }
        },
        submit: function (){
            this.namevalidate();
            this.phonevalidate();
            this.identityvalidate();

        }

    }
});
