<div class="create-title">
    <div class="container">
        <div class="pull-left">
            <h1>{{$header_title}}</h1>
        </div>
        <div class="pull-right">
            <a href="{{$header_btn_url}}" class="btn btn-info">{{ $header_btn }}</a>

            <div class="dropdown" style="display: inline-block">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()['email']}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-top: -30px;">
                    <li class="dropdown-header"> {{Auth::user()['realname']}}</li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/userinfo">查看用户信息</a>
                    @can('see-all')
                    <a class="dropdown-item" href="/users">员工管理</a>
                    @endcan
                    @can('see-dep')
                    <a class="dropdown-item" href="/users">部门管理</a>
                    @endcan
                    <a class="dropdown-item" href="/users/resetpwd">修改个人密码</a>
                    <a class="dropdown-item bg-danger" href="/auth/logout">退出</a>
                </div>
            </div>
        </div>
    </div>
</div>