<script src="{{asset('assets/select/select2.full.min.js')}}"></script>
<script>
    $(function () {
        $(".tag").select2({
            multiple: true,
            ajax: {
                url: "/api/taglist",
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    });
</script>