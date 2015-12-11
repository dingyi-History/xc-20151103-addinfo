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

    function addtag() {
        var oTag = $('.addtag');
        var tag = oTag.val().trim();
        var token = $('.token').val().trim();
        if (tag.length > 0) {
            $.post("/api/addtag",
                    {
                        _token: token,
                        tagname: tag
                    },
                    function (data, status) {
                        oTag.val('');
                        if (data == 1) {
                            swal("OK!", "标签添加成功,请选择后使用!", "success");
                        } else if (data == 0) {
                            swal("Sorry!", "标签已经存在,请选择.", "error");
                        } else {
                            swal("Sorry!", "标签添加失败!", "error");
                        }
                    });
        } else {
            alert("请填入标签名")
        }
    }
</script>