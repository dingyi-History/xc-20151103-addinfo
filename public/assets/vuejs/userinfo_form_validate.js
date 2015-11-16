Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue({
    el: '#app',
    data: {
        myform: {},
        model: {
            name: '',
            phone: '',
            identity: '',
            onephone: false,
            oneidentity: false
        }
    },
    methods: {
        onephone: function () {
            this.$http.get('/api/onephone/' + this.model.phone.trim(), function (data, status, request) {
                if (data == 0) {
                    this.model.onephone = false;
                }
                if (data == 1) {
                    console.log(data);
                    this.model.onephone = true;
                }
            }).error(function (data, status, request) {
            });
        },
        oneidentity: function () {
            this.$http.get('/api/oneidentity/' + this.model.identity.trim(), function (data, status, request) {

                if (data == 0) {
                    this.model.oneidentity = false;
                }
                if (data == 1) {
                    this.model.oneidentity = true;
                }
            }).error(function (data, status, request) {
            });
        },
        onSubmit: function () {
            if (this.myform.$valid == true) {
                $('#myform').submit();
            } else {
                swal('No', '有一些没输入', 'error');
            }

        },

    }
});

