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

    $('#tagbtn').click(function () {
        var oTag = $('#addtag');
        var tag = oTag.val().trim();

        if (tag.length > 0) {
            $.post("/api/addtag",
                    {
                        _token: $('#token').val(),
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
            swal("Sorry!", "请输入标签名!", "error");
        }
    });
</script>