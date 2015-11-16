new Vue({
    el: '#app',
    data: {
        myform: {},
        model: {}
    },
    methods: {
        onSubmit: function () {
            console.log(this.myform.$valid);
            if (this.myform.$valid == true) {
                $('#myform').submit();
            } else {
                swal('No','有一些没输入','error');
            }

        }
    }
});

