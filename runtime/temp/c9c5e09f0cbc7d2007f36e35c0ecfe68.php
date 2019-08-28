<?php /*a:2:{s:90:"/Users/mac/Documents/workspace/Rabbit/PHPAdmin/application/wechat/view/config/options.html";i:1566958781;s:79:"/Users/mac/Documents/workspace/Rabbit/PHPAdmin/application/admin/view/main.html";i:1566958002;}*/ ?>
<div class="layui-card layui-bg-gray"><form onsubmit="return false;" data-auto="true" method="post" action="<?php echo url('updateSVN'); ?>" class='layui-form layui-card'
      autocomplete="off" lay-filter="index"><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span
        class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span>项目构建
    <div class="pull-right"><!-- <button data-action="/wechat/fans/setblack.html" data-rule="openid#{key}" data-csrf="5d5e4b52e9c34"
                class="layui-btn layui-btn-sm layui-btn-primary">迭代更新
        </button>  --><div class="layui-form-item text-center"><button class="layui-btn" type="submit">迭代更新</button></div></button></div></div></form><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><form onsubmit="return false;" data-auto="true" method="post" action="<?php echo url('save'); ?>" class='layui-form layui-card'
      autocomplete="off" lay-filter="index"><div class="layui-card-body"><div class="layui-form-item layui-inline"><label class="layui-form-label">项目名称<span style="color: red;"> * </span></label><div class="layui-input-inline" style="width: auto"><select class="layui-select" name="p_name"><!--                    {foreach ['0'=>'bdcf','1'=>'500out','2'=>'v8','3'=>'v9'] as $k=>$v}--><?php foreach(['0'=>'bdcf','1'=>'500out'] as $k=>$v): if(app('request')->get('status') == $k.""): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select><p>打包人员选择项目名称，作为打包项目。</p></div><div class="layui-form-item"><label class="layui-form-label">后台服务器<br><span class="nowrap color-desc"></span></label><div class="layui-input-block"><input name="bundle_id" required placeholder="请输入1或2（必填）" value="<?php echo sysconf('bundle_id'); ?>" class="layui-input"><p class="help-block">注意: 1是正式服 , 2是测试服</p></div></div></div><div class="hr-line-dashed"></div><div class="layui-form-item text-center"><button class="layui-btn" type="submit">开始打包</button></div></div></form></div><script>
    (function () {

        form.render();
        this.type = "<?php echo sysconf('wechat_mch_ssl_type'); ?>" || 'p12';
        form.val('build', {wechat_mch_ssl_type: this.type});
        form.on('radio(data-mch-type)', function (data) {
            apply(data.value);
        });
        apply.call(this, this.type);

        function apply(type) {
            $('[data-mch-type="' + type + '"]').show().siblings('[data-mch-type]').hide();
        };
        // 证书文件上传控制
        this.types = ['wechat_mch_ssl_p12', 'wechat_mch_ssl_key', 'wechat_mch_ssl_cer'];
        for (var i in this.types) $('input[name="' + this.types[i] + '"]').on('change', function () {
            var input = this, $button = $(this).next('button');
            setTimeout(function () {
                if (typeof input.value === 'string' && input.value.length > 5) {
                    $button.find('i').addClass('color-green layui-icon-vercode').removeClass('layui-icon-upload-drag');
                } else {
                    $button.find('i').removeClass('color-green layui-icon-vercode').addClass('layui-icon-upload-drag');
                }
            }, 300);
        }).trigger('change');

    })({});
</script></div>