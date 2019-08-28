<?php /*a:3:{s:67:"/Users/sundebiao/PHPAdmin/application/service/view/index/index.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;s:74:"/Users/sundebiao/PHPAdmin/application/service/view/index/index_search.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("service/index/syncall")): ?><button data-load="<?php echo url('syncall'); ?>" class='layui-btn layui-btn-sm layui-btn-primary'>同步授权信息</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">微信标识</label><div class="layui-input-inline"><input name="authorizer_appid" value="<?php echo htmlentities((app('request')->get('authorizer_appid') ?: '')); ?>" placeholder="请输入微信APPID" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">微信名称</label><div class="layui-input-inline"><input name="nick_name" value="<?php echo htmlentities((app('request')->get('nick_name') ?: '')); ?>" placeholder="请输入微信名称" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">类型过滤</label><div class="layui-input-inline"><select name="service_type" class="layui-select"><option value="">- 全部 -</option><?php foreach(['0'=>'显示订阅号类型','2'=>'显示服务号类型','3'=>'显示小程序类型'] as $k=>$v): ?><!--<?php if($k.'' == app('request')->get('service_type')): ?>--><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php else: ?>--><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php endif; ?>--><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">使用状态</label><div class="layui-input-inline"><select class="layui-select" name="status"><?php foreach([''=>'- 全部 -','0'=>'已禁用的账号','1'=>'使用中的账号'] as $k=>$v): if(app('request')->get('status') == $k.""): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">注册公司</label><div class="layui-input-inline"><input name="principal_name" value="<?php echo htmlentities((app('request')->get('principal_name') ?: '')); ?>" placeholder="请输入注册公司" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">授权时间</label><div class="layui-input-inline"><input id="create_at" name="create_at" value="<?php echo htmlentities((app('request')->get('create_at') ?: '')); ?>" placeholder="请选择授权时间" class="layui-input"></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>
    window.form.render();
    window.laydate.render({range: true, elem: '#create_at'});
</script><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='text-left nowrap' style="width:390px">接口信息</th><th class='text-left nowrap' style="width:120px">服务号信息</th><th class='text-left nowrap'></th><th class='text-left nowrap'></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><div class="inline-block text-top margin-right-5"><img onerror="this.src='/static/theme/img/404_icon.png'" style="width:60px;height:60px" data-tips-text="微信头像" data-tips-image src="<?php echo htmlentities((isset($vo['head_img']) && ($vo['head_img'] !== '')?$vo['head_img']:'')); ?>"></div><div class="inline-block">
                    公众号APPID：<?php echo htmlentities($vo['authorizer_appid']); ?>&nbsp;&nbsp;&nbsp;&nbsp;调用次数：<?php echo htmlentities($vo['total']); ?><br>
                    接口授权密钥：<?php echo (isset($vo['appkey']) && ($vo['appkey'] !== '')?$vo['appkey']:'<span class="color-desc">未生成接口服务密码, 请稍候授权绑定</span>'); ?><br>
                    消息推送接口：<?php echo (isset($vo['appuri']) && ($vo['appuri'] !== '')?$vo['appuri']:'<span class="color-desc">未配置消息推送接口</span>'); ?></div></td><td class='text-left nowrap'><div class="inline-block text-top margin-right-5"><img onerror="this.src='/static/theme/img/404_icon.png'" style="width:60px;height:60px" data-tips-text="微信二维码" data-tips-image src="<?php echo htmlentities(local_image($vo['qrcode_url'])); ?>"></div><div class="inline-block">
                    昵称：<?php echo (isset($vo['nick_name']) && ($vo['nick_name'] !== '')?$vo['nick_name']:'<span class="color-desc">未获取到公众号昵称</span>'); ?><br>
                    公司：<?php echo (isset($vo['principal_name']) && ($vo['principal_name'] !== '')?$vo['principal_name']:'<span class="color-desc">未获取到公司名字</span>'); ?><br>
                    状态：<?php if($vo['service_type'] == 2): ?>服务号<?php elseif($vo['service_type'] == 3): ?>小程序<?php else: ?>订阅号<?php endif; ?> /
                    <?php echo $vo['verify_type']==-1 ? '<span class="color-red">未认证</span>'  :  '<span class="color-green">已认证</span>'; ?> /
                    <?php if($vo['status'] == 0): ?><span class="color-red">已禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">使用中</span><?php endif; ?></div></td><td class="text-left nowrap">
                账号：<?php echo htmlentities((isset($vo['user_name']) && ($vo['user_name'] !== '')?$vo['user_name']:'--')); ?><br>
                日期：<?php echo str_replace(' ','<br>时间：',format_datetime($vo['create_at'])); ?></td><td class='text-left nowrap'><?php if($vo['status'] == 1 and auth("servce/index/forbid")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('forbid'); ?>" data-csrf="<?php echo systoken('service/index/forbid'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#0">禁 用</a><?php elseif(auth("servce/index/resume")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('resume'); ?>" data-csrf="<?php echo systoken('service/index/resume'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#1">启 用</a><?php endif; if(auth("service/index/sync")): ?><a class="layui-btn layui-btn-sm" data-load='<?php echo url("service/index/sync"); ?>?appid=<?php echo htmlentities($vo['authorizer_appid']); ?>'>同 步</a><?php endif; if(auth("service/index/remove")): ?><a class="layui-btn layui-btn-sm layui-btn-danger" data-confirm="确定要删除该公众号吗？" data-action="<?php echo url('remove'); ?>" data-csrf="<?php echo systoken('service/index/remove'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>">删 除</a><?php endif; if(auth("service/index/clearquota")): ?><a class="layui-btn layui-btn-sm layui-btn-primary" data-confirm="每个公众号每个月有10次清零机会，请谨慎使用！" data-load='<?php echo url("service/index/clearquota"); ?>?appid=<?php echo htmlentities($vo['authorizer_appid']); ?>'>清 零</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div>