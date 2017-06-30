# jquery.validate验证表单案例

这个案例用了jquery.validate结合ajax，php验证表单

用户名用ajax验证是否已注册（用户名admin已被注册）

验证码php生成，保存在SESSION中，用ajax验证

## 填坑之路  
**原因：**使用 success: "right" 添加成功样式，验证成功后再更改表单到失败时，class不会被去除

**解决：**  
在jquery.validate源码第991行添加代码
```
if ( message && this.settings.success ) {
    if ( typeof this.settings.success === "string" ) {
        error.removeClass( this.settings.success );
    }
}
```
