<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2019 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://demo.thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\wechat\controller;
use library\Controller;
use think\Db;

class config extends Controller
{
    /**
     * 微信数据统计
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function payment()
    {
        $this->totalJson = ['xs' => [], 'ys' => []];
        for ($i = 5; $i >= 0; $i--) {
            $time = strtotime("-{$i} months");
            $where = [['subscribe_at', '<', date('Y-m-32 00:00:00', $time)]];
            $this->totalJson['xs'][] = date('Y年m月', $time);
            $item = ['_0' => 0, '_1' => 0];
            $list = Db::name('WechatFans')->field('count(1) count,is_black black')->where($where)->group('is_black')->select();
            foreach ($list as $vo) $item["_{$vo['black']}"] = $vo['count'];
            $this->totalJson['ys']['_0'][] = $item['_0'];
            $this->totalJson['ys']['_1'][] = $item['_1'];
        }
        $this->totalFans = Db::name('WechatFans')->where(['is_black' => '0'])->count();
        $this->totalBlack = Db::name('WechatFans')->where(['is_black' => '1'])->count();
        $this->totalNews = Db::name('WechatNews')->where(['is_deleted' => '0'])->count();
        $this->totalRule = Db::name('WechatKeys')->count();
        $this->fetch();
    }

    public function options()
    {
        $this->totalJson = ['xs' => [], 'ys' => []];
        for ($i = 5; $i >= 0; $i--) {
            $time = strtotime("-{$i} months");
            $where = [['subscribe_at', '<', date('Y-m-32 00:00:00', $time)]];
            $this->totalJson['xs'][] = date('Y年m月', $time);
            $item = ['_0' => 0, '_1' => 0];
            $list = Db::name('WechatFans')->field('count(1) count,is_black black')->where($where)->group('is_black')->select();
            foreach ($list as $vo) $item["_{$vo['black']}"] = $vo['count'];
            $this->totalJson['ys']['_0'][] = $item['_0'];
            $this->totalJson['ys']['_1'][] = $item['_1'];
        }
        $this->totalFans = Db::name('WechatFans')->where(['is_black' => '0'])->count();
        $this->totalBlack = Db::name('WechatFans')->where(['is_black' => '1'])->count();
        $this->totalNews = Db::name('WechatNews')->where(['is_deleted' => '0'])->count();
        $this->totalRule = Db::name('WechatKeys')->count();

        $this->fetch();
    }

    public function updateSVN()
    {

        if ($this->request->isPost()) {
            $this->applyCsrfToken('updateSVN');
            exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/svn/run.sh');
            exec('/Users/mac/Documents/workspace/Essence/svn_sh/run.sh>>/Users/mac/Documents/temporary/log/svn/error.log 2>&1');
            exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/svnupdate/run.sh');
            $this->success('更新成功！');
        }else{
            $this->success('更新失败！');
        }
    }


    public function save()
    {

        $p_name  = $this->request->post("p_name");
        $s_name  = $this->request->post("s_name");
        switch ($p_name) {
            case 0:
               if ($s_name == 0){
                   if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      $this->success('暂未开放');
                      }
                }else{
                    if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/bdcfapp/skycash/dis/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dis！');
                      }else{
                      $this->success('打包失败dis！');
                     }
                }
                break;
            case 1:
                if ($s_name == 0){
                   if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500out/dev/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dev！');
                      }else{
                      $this->success('打包失败dev！');
                     }
                }else{
                   if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500out/dis/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dis！');
                      }else{
                      $this->success('打包失败dis！');
                     }
                }
                break;
            case 2:
                  if ($s_name == 0){
                    if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500cai/dev/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dev！');
                      }else{
                      $this->success('打包失败dev！');
                     }
                }else{
                     if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500cai/dis/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dis！');
                      }else{
                      $this->success('打包失败dis！');
                     }
                }
                break;
            case 3:
                if ($s_name == 0){
                      if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500outtlgpc/dev/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dev');
                      }
                }else{
                      if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500outtlgpc/dis/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dev');
                      }
                }
                break;
            case 4:
                if ($s_name == 0){
                    if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500outgpc/dev/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dev！');
                      }else{
                      $this->success('打包失败dev！');
                     }

                }else{
                      if ($this->request->isPost()) {
                      $this->applyCsrfToken('save');
                      exec('/Users/mac/Documents/workspace/Essence/backupLog_sh/xcode/run.sh');
                      exec('/Users/mac/Documents/workspace/Essence/baleios_sh/500out/500outgpc/dis/run.sh>>/Users/mac/Documents/temporary/log/xcode/error.log 2>&1');
                      exec('/Users/mac/Documents/workspace/Essence/sendemail_sh/balesuccess/run.sh');
                      $this->success('打包成功dis！');
                      }else{
                      $this->success('打包失败dis！');
                     }
                }
                break;

            default:
               break;
        }

    }

}
